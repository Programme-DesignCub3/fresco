<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Settings\GeneralSettings;
use App\Traits\HasID;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    use HasID;

    public function index(GeneralSettings $generalSettings)
    {
        // General Settings
        $general = $generalSettings->toArray();

        // Article Resource
        if(request('search')) {
            $article = Article::where('title', 'like', '%' . request('search') . '%')->where('published', true)->with('featured_image')->paginate(6)->withQueryString();
        } else {
            if(Article::where('pin', true)->exists()) {
                $article = Article::where('published', true)->orderBy('pin', 'desc')->with('featured_image')->latest()->paginate(6);
            } else {
                $article = Article::where('published', true)->with('featured_image')->latest()->paginate(6);
            }
        }

        $article->transform(function ($art) {
            $art->image = $art->featured_image->url ?? null;
            return $art;
        });

        return view('pages.article', compact('general', 'article'));
    }

    public function detail(GeneralSettings $generalSettings, $slug)
    {
        // General Settings
        $general = $generalSettings->toArray();

        // Article Detail
        (Article::where('slug', $slug)->doesntExist()) && abort(404);
        $article = Article::where('slug', $slug)->with('featured_image')->first();
        $article['content'] = collect($article['content'])->map(function ($arc) {
            if ($arc['type'] == 'video') {
                $arc['data']['content'] = $this->getID($arc['data']['content']);
            }

            return $arc;
        })->toArray();

        // Other Articles
        $other = Article::where('published', true)->where('slug', '!=', $slug)->with('featured_image')->latest()->take(4)->get();
        $other->transform(function ($o) {
            $o->image = $o->featured_image->url ?? null;
            return $o;
        });

        return view('pages.article-detail', compact('general', 'article', 'other'));
    }
}
