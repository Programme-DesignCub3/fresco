<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Settings\GeneralSettings;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(GeneralSettings $generalSettings, Product $product)
    {
        // General Settings
        $general = $generalSettings->toArray();

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

        return view('pages.product', compact('general', 'black', 'cappuccino'));
    }
}
