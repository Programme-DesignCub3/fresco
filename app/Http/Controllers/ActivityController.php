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
        $pageSettings->originalValues->transform(function($value, $key) use ($pageSettings){
            // Transform ac_cappuccino_banner_title to breakline
            if ($key == 'ac_cappuccino_banner_title') {
                $pageSettings->ac_cappuccino_banner_title = nl2br($value);
            }
            // Transform ac_black_banner_title to breakline
            if ($key == 'ac_black_banner_title') {
                $pageSettings->ac_black_banner_title = nl2br($value);
            }

            return $pageSettings;
        });
        $pages = $pageSettings->toArray();

        // Activity Resource
        $activity = Activity::where('start_date', '<=', Carbon::now()->toDateString())->where('end_date', '>=', Carbon::now()->toDateString())->with('featured_image')->with('featured_image_portrait')->latest()->get();
        $activity->transform(function ($act) {
            $act->image = $act->featured_image->url ?? null;
            $act->image_portrait = $act->featured_image_portrait->url ?? null;
            return $act;
        });

        return view('pages.activity', compact('general', 'pages', 'activity'));
    }
}
