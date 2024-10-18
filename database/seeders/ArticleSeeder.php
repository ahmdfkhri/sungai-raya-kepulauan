<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleContent;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run() {
        // Generate 150 article with randomly 3 to 5 content length
        $articles = Article::factory(150)->create();

        foreach ($articles as $a) {
            $contentCount = random_int(3, 5);

            for ($order = 0; $order < $contentCount; $order++) {
                // First content must be a text
                if ($order == 0) {
                    ArticleContent::factory()->text()->create([
                        'article_id' => $a->id,
                        'order' => $order,
                    ]);
                } else {
                    ArticleContent::factory()->create([
                        'article_id' => $a->id,
                        'order' => $order,
                    ]);
                }
            }
        }

    }
};
