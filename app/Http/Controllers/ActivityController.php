<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Settings\GeneralSettings;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(GeneralSettings $generalSettings)
    {
        /**
         * Settings Resource
         */
        $general = $generalSettings->toArray();

        /**
         * Activity Resource
         */
        $activity = Activity::with('featured_image')
                        ->with('featured_image_portrait')
                        ->latest()
                        ->get();

        for($i = 0; $i < $activity->count(); $i++) {
            $activity[$i]['image'] = 'storage/' . $activity[$i]->featured_image->path;
            if($activity[$i]['image_portrait'] != null) {
                $activity[$i]['image_portrait'] = 'storage/' . $activity[$i]->featured_image_portrait->path;
            }
        }

        return view('pages.activity', compact('general', 'activity'));
    }
}
