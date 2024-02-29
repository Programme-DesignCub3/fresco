<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Settings\GeneralSettings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(GeneralSettings $generalSettings, Product $product)
    {
        /**
         * @return array[]
         * Convert to array
         */
        $home = $generalSettings->toArray();
        $general = $generalSettings->toArray();

        /**
         * @product
         * Products
         */
        $list_product = Product::orderBy('type')->orderBy('sort')->get()->toArray();

        $black = collect($list_product)->toArray();
        $cappuccino = collect($list_product)->sortByDesc('type')->toArray();

        return view('home', compact('home', 'general', 'black', 'cappuccino'));
    }
}
