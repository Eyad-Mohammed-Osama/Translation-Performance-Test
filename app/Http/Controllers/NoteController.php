<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function __invoke(Request $request)
    {
        $language = $request->language;
        $note = Note::first();

        $title = "";
        $content = "";

        $iterations = 10;
        $time = 0;

        for ($i = 0; $i < $iterations; $i++) {
            $start = microtime(true);

            $title = $note->translate($language)->title;
            $content = $note->translate($language)->content;

            $end = microtime(true);

            $time += ($end - $start);
        }

        $time = $time / $iterations;

        return view("notes", [
            "title" => $title,
            "content" => $content,
            "time" => $time
        ]);
    }
}
