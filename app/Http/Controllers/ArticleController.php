<?php

namespace App\Http\Controllers;

use App\Settings\GeneralSettings;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(GeneralSettings $generalSettings)
    {
        $general = $generalSettings->toArray();

        return view('pages.article', compact('general'));
    }
}
