<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Settings\GeneralSettings;
use App\Settings\PageSettings;
use App\Traits\HasID;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    use HasID;

    public function index(GeneralSettings $generalSettings, PageSettings $pageSettings)
    {
        // Settings
        $general = $generalSettings->toArray();
        $pageSettings->originalValues->transform(function($value, $key) use ($pageSettings){
            // Transform ar_cappuccino_banner_title to breakline
            if ($key == 'ar_cappuccino_banner_title') {
                $pageSettings->ar_cappuccino_banner_title = nl2br($value);
            }
            // Transform ar_black_banner_title to breakline
            if ($key == 'ar_black_banner_title') {
                $pageSettings->ar_black_banner_title = nl2br($value);
            }

            return $pageSettings;
        });
        $pages = $pageSettings->toArray();

        // Article Resource
        if(request('search')) {
            $article = Article::where('title', 'like', '%' . request('search') . '%')->where('published', true)->with('featured_image')->paginate(6)->withQueryString();
        } else {
            $article = Article::where('published', true)->with('featured_image')->latest()->paginate(6);
        }

        $article->transform(function ($art) {
            $art->image = $art->featured_image->url ?? null;
            return $art;
        });

        return view('pages.article', compact('general', 'pages', 'article'));
    }

    public function detail(GeneralSettings $generalSettings, $slug)
    {
        // Settings
        $general = $generalSettings->toArray();

        // Article Detail
        (Article::where('slug', $slug)->doesntExist()) && abort(404);
        $article = Article::where('slug', $slug)->with('featured_image')->first();
        $article['content'] = collect($article['content'])->map(function ($arc) {
            if (array_key_exists('type', $arc) && $arc['type'] == 'video') {
                $arc['data']['content'] = $this->getID($arc['data']['content']);
            } else if (!array_key_exists('type', $arc)) {
                return null;
            }

            return $arc;
        })->filter()->toArray();

        // Other Articles
        $other = Article::where('published', true)->where('slug', '!=', $slug)->with('featured_image')->latest()->take(4)->get();
        $other->transform(function ($o) {
            $o->image = $o->featured_image->url ?? null;
            return $o;
        });

        return view('pages.article-detail', compact('general', 'article', 'other'));
    }
}
