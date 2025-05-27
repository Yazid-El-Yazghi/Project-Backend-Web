<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::published()
                   ->with('author')
                   ->orderBy('publication_date', 'desc')
                   ->paginate(10);
        
        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        // Check if the news is published and publication date has passed
        if (!$news->is_published || $news->publication_date > now()) {
            abort(404, 'This article is not available.');
        }
        
        return view('news.show', compact('news'));
    }
}