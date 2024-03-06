<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Settings\GeneralSettings;
use Illuminate\Http\Request;

class ProductController extends Controller
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

        // === Black Coffee ===
        $list_product_black = Product::where('type', 'black')->orderBy('sort')->with('featured_image')->get();

        for($i = 0; $i < $list_product_black->count(); $i++) {
            $list_product_black[$i]['image'] = 'storage/' . $list_product_black[$i]->featured_image->path;
        }

        $black = collect($list_product_black)->values()->toArray();

        // === Cappuccino ===
        $list_product_cappuccino = Product::where('type', 'cappuccino')->orderBy('sort')->with('featured_image')->get();

        for($i = 0; $i < $list_product_cappuccino->count(); $i++) {
            $list_product_cappuccino[$i]['image'] = 'storage/' . $list_product_cappuccino[$i]->featured_image->path;
        }

        $cappuccino = collect($list_product_cappuccino)->values()->toArray();

        return view('pages.product', compact('general', 'black', 'cappuccino'));
    }
}
