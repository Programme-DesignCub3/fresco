<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Settings\GeneralSettings;
use App\Settings\HomeSettings;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(GeneralSettings $generalSettings, HomeSettings $homeSettings, Product $product)
    {
        $home = $homeSettings->toArray();
        $general = $generalSettings->toArray();

        $list_product = Product::orderBy('type')->orderBy('sort')->get()->toArray();
        $black = collect($list_product)->toArray();
        $cappuccino = collect($list_product)->sortByDesc('type')->toArray();

        return view('pages.product', compact('general', 'home', 'black', 'cappuccino'));
    }
}
