<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use App\Models\Promo;
use App\Settings\GeneralSettings;
use App\Settings\PageSettings;
use App\Traits\HasID;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use HasID;

    public function index(GeneralSettings $generalSettings, PageSettings $pageSettings)
    {
        // Settings
        $general = $generalSettings->toArray();
        $pages = $pageSettings->toArray();
        $pages['black_video_url'] = $this->getID($pages['black_video_url']);
        $pages['cappuccino_video_url'] = $this->getID($pages['cappuccino_video_url']);

        // Pinned Promotion
        $promotion = Promo::where('pin', true)->first();
        if($promotion) $promotion['image'] = $promotion->featured_image->url ?? null;

        // Product Resource (For Menu)
        // (Bisa ambil yang resource cappuccino juga, tapi disini ambil yang black, Karena kontennya sama)
        $black = Product::where('type', 'black')->orderBy('sort')->with('featured_image')->get();
        $black->transform(function ($bk) {
            $bk->image = $bk->featured_image->url ?? null;
            return $bk;
        });

        // Article Resource
        $article = Article::where('published', true)->with('featured_image')->with('featured_image_square')->latest()->limit(6)->get();
        $article->transform(function ($art) {
            $art->image = $art->featured_image->url ?? null;
            $art->image_square = $art->featured_image_square->url ?? null;
            $art->timestamp = $art->created_at->translatedFormat('M d, Y');
            return $art;
        });

        // Meta Data
        $metaData = [
            'title' => 'Beranda',
            'url' => url('/'),
            'description' => 'Kopi Kapal Api Fresco, perpaduan sempurna 100% biji kopi Arabika dan Robusta berkualitas tinggi yang diolah langsung setelah dipetik.',
            'image' => asset('assets/images/meta-image.png'),
        ];

    return view('home', [
            'general' => $general,
            'pages' => $pages,
            'promotion' => $promotion,
            'black' => $black,
            'article' => $article,
            'metaData' => $metaData
        ]);
    }
}
