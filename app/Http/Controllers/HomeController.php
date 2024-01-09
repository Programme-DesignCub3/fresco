<?php

namespace App\Http\Controllers;

use App\Settings\HomeSettings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(HomeSettings $homeSettings)
    {
        $settings = json_encode($homeSettings->originalValues->toArray());

        return view('home', compact('settings'));
    }
}
