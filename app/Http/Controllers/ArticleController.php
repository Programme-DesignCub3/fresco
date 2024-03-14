<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Settings\GeneralSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ArticleController extends Controller
{
    public function index(GeneralSettings $generalSettings)
    {
        /**
         * Settings Resource
         */
        $general = $generalSettings->toArray();

        /**
         * Article Resource
         */
        if(request('search')) {
            $article = Article::where('title', 'like', '%' . request('search') . '%')
                            ->where('published', true)
                            ->with('featured_image')
                            ->paginate(6)
                            ->withQueryString();
        } else {
            $article = Article::where('published', true)
                            ->with('featured_image')
                            ->latest()
                            ->paginate(6);
        }

        for($i = 0; $i < $article->count(); $i++) {
            $article[$i]['image'] = URL::to('/') . '/storage/' . $article[$i]->featured_image->path;
        }

        return view('pages.article', compact('general', 'article'));
    }

    public function detail(GeneralSettings $generalSettings, $slug)
    {
        /**
         * Settings Resource
         */
        $general = $generalSettings->toArray();

        /**
         * Article Detail Resource
         */
        if(Article::where('slug', $slug)->doesntExist()) {
            abort(404);
        }

        $article = Article::where('slug', $slug)
                        ->with('featured_image')
                        ->first();
        $article['image'] = URL::to('/') . '/storage/' . $article->featured_image->path;

        /**
         * Other Articles
         */
        $other = Article::where('published', true)
                        ->where('slug', '!=', $slug)
                        ->with('featured_image')
                        ->latest()
                        ->take(4)
                        ->get();

        for($i = 0; $i < $other->count(); $i++) {
            $other[$i]['image'] = URL::to('/') . '/storage/' . $other[$i]->featured_image->path;
        }

        return view('pages.article-detail', compact('general', 'article', 'other'));
    }
}
