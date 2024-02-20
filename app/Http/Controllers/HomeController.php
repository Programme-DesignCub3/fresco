<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Settings\GeneralSettings;
use App\Settings\HomeSettings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(GeneralSettings $generalSettings, HomeSettings $homeSettings, Product $product)
    {
        /**
         * @return array[]
         * Convert to array
         */
        $home = $homeSettings->toArray();
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
