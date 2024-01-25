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
        $black_coffee = Product::where('type', 'black')->orderBy('sort')->get()->toArray();
        $cappuccino_coffee = Product::where('type', 'cappuccino')->orderBy('sort')->get()->toArray();

        $list_product = [
            'black_coffee' => $black_coffee,
            'cappuccino_coffee' => $cappuccino_coffee
        ];

        return view('home', compact('general', 'home', 'list_product'));
    }
}
