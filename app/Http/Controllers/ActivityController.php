<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Settings\GeneralSettings;
use App\Settings\PageSettings;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(GeneralSettings $generalSettings, PageSettings $pageSettings)
    {
        // Settings
        $general = $generalSettings->toArray();
        $pages = $pageSettings->toArray();

        // Activity Resource
        $activity = Activity::where('start_date', '<=', Carbon::now()->toDateString())->where('end_date', '>=', Carbon::now()->toDateString())->orderBy('sort')->with('featured_image')->with('featured_image_portrait')->latest()->get();
        $activity->transform(function ($act) {
            $act->image = $act->featured_image->url ?? null;
            $act->image_portrait = $act->featured_image_portrait->url ?? null;
            return $act;
        });

        return view('pages.activity', compact('general', 'pages', 'activity'));
    }
}
