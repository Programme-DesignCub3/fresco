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
            $article = Article::where('title', 'like', '%' . request('search') . '%')->where('published', true)->with('featured_image')->with('featured_image_square')->paginate(6)->withQueryString();
        } else {
            $article = Article::where('published', true)->with('featured_image')->with('featured_image_square')->latest()->paginate(6);
        }

        $article->transform(function ($art) {
            $art->image = $art->featured_image->url ?? null;
            $art->timestamp = $art->created_at->translatedFormat('M d, Y');
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
        $article['content'] = collect($article['content'])->map(function ($art) {
            if (array_key_exists('type', $art) && $art['type'] == 'video') {
                $art['data']['content'] = $this->getID($art['data']['content']);
            } else if (!array_key_exists('type', $art)) {
                return null;
            }

            return $art;
        })->filter()->toArray();
        $article['timestamp'] = $article->created_at->translatedFormat('M d, Y');

        // Other Articles
        $other = Article::where('published', true)->where('slug', '!=', $slug)->with('featured_image')->latest()->take(6)->get();
        $other->transform(function ($o) {
            $o->image = $o->featured_image->url ?? null;
            $o->timestamp = $o->created_at->translatedFormat('M d, Y');
            return $o;
        });

        return view('pages.article-detail', compact('general', 'article', 'other'));
    }
}
