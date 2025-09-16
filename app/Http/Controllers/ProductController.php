<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Settings\GeneralSettings;
use App\Settings\PageSettings;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(GeneralSettings $generalSettings, PageSettings $pageSettings, Product $product)
    {
        // Settings
        $general = $generalSettings->toArray();
        $pageSettings->originalValues->transform(function($value, $key) use ($pageSettings){
            // Transform pd_cappuccino_banner_title to breakline
            if ($key == 'pd_cappuccino_banner_title') {
                $pageSettings->pd_cappuccino_banner_title = nl2br($value);
            }
            // Transform pd_black_banner_title to breakline
            if ($key == 'pd_black_banner_title') {
                $pageSettings->pd_black_banner_title = nl2br($value);
            }

            return $pageSettings;
        });
        $pages = $pageSettings->toArray();

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

        // Meta Data
        $metaData = [
            'title' => 'Produk',
            'url' => url('/produk'),
            'description' => 'Kopi Kapal Api Fresco, perpaduan sempurna 100% biji kopi Arabika dan Robusta berkualitas tinggi yang diolah langsung setelah dipetik.',
            'image' => asset('assets/images/meta-image.png'),
        ];

        return view('pages.product', [
            'general' => $general,
            'pages' => $pages,
            'black' => $black,
            'cappuccino' => $cappuccino,
            'metaData' => $metaData
        ]);
    }
}
