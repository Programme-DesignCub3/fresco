<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Article;
use App\Models\Product;
use App\Settings\GeneralSettings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(GeneralSettings $generalSettings, Product $product)
    {
        /**
         * Settings Resource
         */
        $general = $generalSettings->toArray();

        /**
         * Product Resource
         */
        $list_product = Product::orderBy('type')
                            ->orderBy('sort')
                            ->with('featured_image')
                            ->get();

        for($i = 0; $i < $list_product->count(); $i++) {
            $list_product[$i]['image'] = 'storage/' . $list_product[$i]->featured_image->path;
        }

        $black = collect($list_product)
                ->values()
                ->toArray();
        $cappuccino = collect($list_product)
                ->sortByDesc('type')
                ->values()
                ->toArray();

        /**
         * Activity Resource
         */
        $activity = Activity::orderBy('sort')
                            ->with('featured_image')
                            ->with('featured_image_portrait')
                            ->limit(3)
                            ->get();

        for($i = 0; $i < $activity->count(); $i++) {
            $activity[$i]['image'] = 'storage/' . $activity[$i]->featured_image->path;
            if($activity[$i]['image_portrait'] != null) {
                $activity[$i]['image_portrait'] = 'storage/' . $activity[$i]->featured_image_portrait->path;
            }
        }

        /**
         * Article Resource
         */

        if(Article::where('pin', true)->exists()) {
            $pinned = Article::where('pin', true)
                    ->with('featured_image')
                    ->first();
            $pinned['image'] = 'storage/' . $pinned->featured_image->path;

            $article = Article::where('published', true)
                            ->orderBy('pin', 'desc')
                            ->with('featured_image')
                            ->latest()
                            ->limit(3)
                            ->get();
        } else {
            $pinned = null;

            $article = Article::where('published', true)
                            ->with('featured_image')
                            ->latest()
                            ->limit(3)
                            ->get();
        }

        for($i = 0; $i < $article->count(); $i++) {
            $article[$i]['image'] = 'storage/' . $article[$i]->featured_image->path;
        }

        return view('home', compact('general', 'black', 'cappuccino', 'activity', 'article', 'pinned'));
    }
}
