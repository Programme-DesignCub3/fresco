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

        return view('pages.product', compact('general', 'pages', 'black', 'cappuccino'));
    }
}
