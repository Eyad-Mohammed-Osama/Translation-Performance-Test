<?php

namespace Database\Seeders;

use App\Models\NoteTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoteTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            "ar", "en", "ru", "uk", "bg", "pl", "de", "be", "sr", "hr",
            "sk", "cs", "fr", "el", "es", "it", "pt", "ro", "la", "fa",
            "ur", "ga", "sv", "da", "nl", "no", "is"
        ];

        DB::beginTransaction();
        for ($i = 0; $i < count($languages); $i++) {
            $language = $languages[$i];
            $title = fake()->sentence(20, FALSE);
            $content = fake()->paragraph(10000, FALSE);
            DB::table('note_translations')->insert([
                "locale" => $language,
                "title" => $title,
                "content" => $content,
                "note_id" => 1
            ]);
        }
        DB::commit();
    }
}
