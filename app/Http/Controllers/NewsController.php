<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __invoke(Request $request)
    {
        $language = $request->language;
        $news = News::first();
        $title = "";
        $content = "";

        $iterations = 10;
        $time = 0;

        for ($i = 0; $i < $iterations; $i++) {
            $start = microtime(true);

            $title = $news->translate("title", $language);
            $content = $news->translate("content", $language);

            $end = microtime(true);

            $time += ($end - $start);
        }

        $time = $time / $iterations;

        return view("news", [
            "title" => $title,
            "content" => $content,
            "time" => $time
        ]);
    }
}
