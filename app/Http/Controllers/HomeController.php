<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Article;
use App\Models\Product;
use App\Models\Promo;
use App\Settings\GeneralSettings;
use App\Settings\PageSettings;
use App\Traits\HasID;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use HasID;

    public function index(GeneralSettings $generalSettings, PageSettings $pageSettings, Product $product)
    {
        // Settings
        $general = $generalSettings->toArray();
        $pages = $pageSettings->toArray();
        $pages['black_video_url'] = $this->getID($pages['black_video_url']);
        $pages['cappuccino_video_url'] = $this->getID($pages['cappuccino_video_url']);

        // Pinned Promotion
        $promotion = Promo::where('pin', true)->first();
        if($promotion) {
            $promotion['image'] = $promotion->featured_image->url ?? null;
        }

        // Product Resource
        $black = Product::where('type', 'black')->orderBy('sort')->with('featured_image')->get();
        $black->transform(function ($bk) {
            $bk->image = $bk->featured_image->url ?? null;
            return $bk;
        });

        $cappuccino = Product::where('type', 'cappuccino')->orderBy('sort')->with('featured_image')->get();
        $cappuccino->transform(function ($cp) {
            $cp->image = $cp->featured_image->url ?? null;
            return $cp;
        });

        // Activity Resource
        $activity = Activity::where('start_date', '<=', Carbon::now()->toDateString())->where('end_date', '>=', Carbon::now()->toDateString())->orderBy('sort')->with('featured_image')->with('featured_image_portrait')->latest()->limit(3)->get();
        $activity->transform(function ($act) {
            $act->image = $act->featured_image->url ?? null;
            $act->image_portrait = $act->featured_image_portrait->url ?? null;
            return $act;
        });

        // Article Resource
        $article = Article::where('published', true)->with('featured_image')->latest()->limit(3)->get();
        $article->transform(function ($art) {
            $art->image = $art->featured_image->url ?? null;
            return $art;
        });

        return view('home', compact('general', 'pages', 'promotion', 'black', 'cappuccino', 'activity', 'article'));
    }
}
