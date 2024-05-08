<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Article;
use App\Models\Product;
use App\Settings\GeneralSettings;
use App\Traits\HasID;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use HasID;

    public function index(GeneralSettings $generalSettings, Product $product)
    {
        // General Settings
        $general = $generalSettings->toArray();
        $general['black_video_url'] = $this->getID($general['black_video_url']);
        $general['cappuccino_video_url'] = $this->getID($general['cappuccino_video_url']);

        // Product Resource
        $black = Product::where('type', 'black')->orderBy('sort')->with('featured_image')->get();
        $black->transform(function ($bk) {
            $bk->image = $bk->featured_image->url;
            return $bk;
        });

        $cappuccino = Product::where('type', 'cappuccino')->orderBy('sort')->with('featured_image')->get();
        $cappuccino->transform(function ($cp) {
            $cp->image = $cp->featured_image->url;
            return $cp;
        });

        // Activity Resource
        $activity = Activity::orderBy('sort')->with('featured_image')->with('featured_image_portrait')->limit(3)->get();
        $activity->transform(function ($act) {
            $act->image = $act->featured_image->url;
            $act->image_portrait = $act->featured_image_portrait->url ?? null;
            return $act;
        });

        // Article Resource
        if(Article::where('pin', true)->exists()) {
            $article = Article::where('published', true)->orderBy('pin', 'desc')->with('featured_image')->latest()->limit(3)->get();
        } else {
            $article = Article::where('published', true)->with('featured_image')->latest()->limit(3)->get();
        }

        $article->transform(function ($art) {
            $art->image = $art->featured_image->url;
            return $art;
        });

        return view('home', compact('general', 'black', 'cappuccino', 'activity', 'article'));
    }
}
