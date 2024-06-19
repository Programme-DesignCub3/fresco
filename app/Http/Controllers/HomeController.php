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

        // Product Resource (For Menu)
        $black = Product::where('type', 'black')->orderBy('sort')->with('featured_image')->get();
        $black->transform(function ($bk) {
            $bk->image = $bk->featured_image->url ?? null;
            return $bk;
        });

        // Article Resource
        $article = Article::where('published', true)->with('featured_image')->latest()->limit(6)->get();
        $article->transform(function ($art) {
            $art->image = $art->featured_image->url ?? null;
            $art->timestamp = $art->created_at->translatedFormat('M d, Y');
            return $art;
        });

        return view('home', compact('general', 'pages', 'promotion', 'black', 'article'));
    }
}
