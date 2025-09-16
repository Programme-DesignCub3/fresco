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
        $activity = Activity::where('start_date', '<=', Carbon::now()->toDateString())->where('end_date', '>=', Carbon::now()->toDateString())->with('featured_image')->latest()->get();
        $activity->transform(function ($act) {
            $act->image = $act->featured_image->url ?? null;
            return $act;
        });

        // Meta Data
        $metaData = [
            'title' => 'Aktivitas',
            'url' => url('/aktivitas'),
            'description' => 'Kopi Kapal Api Fresco, perpaduan sempurna 100% biji kopi Arabika dan Robusta berkualitas tinggi yang diolah langsung setelah dipetik.',
            'image' => asset('assets/images/meta-image.png'),
        ];

        return view('pages.activity', [
            'general' => $general,
            'pages' => $pages,
            'activity' => $activity,
            'metaData' => $metaData
        ]);
    }
}
