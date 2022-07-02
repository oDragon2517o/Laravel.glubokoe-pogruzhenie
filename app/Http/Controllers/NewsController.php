<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = $this->getNews();

        return view(
            'news.index',
            [
                'newsList' => $news
            ]
        );
    }

    public function show(int $id)
    {
        return view('news.show', [
            'news' => $this->getNews($id)
        ]);
    }

    public function categories()
    {
        $news = $this->getNewsICategories();

        return view(
            'news.categories',
            [
                'newsList' => $news
            ]
        );
    }

    public function ICategories(int $i)
    {
        $news = $this->getNewsICategories($i);

        return view('news.ICategories', [
            'newsList' => $news
        ]);
    }
}
