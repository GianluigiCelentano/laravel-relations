<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\Author;
use Faker\Generator as Faker;
class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // for ($i=0; $i < 50; $i++) { 

        //     $postDetail=new PostDetail();
        //     $postDetail->thematic = $faker->words(1, true);
        //     $postDetail->type = $faker->words(1, true);
        //     $postDetail->save();

        //     $postObject = new Post();
        //     $postObject->title = $faker -> sentence(3);
        //     $postObject->postText = $faker -> paragraph(2);
        //     $postObject->author = $faker -> name();
        //     $postObject->cover = $faker -> imageUrl(640, 480, 'animals', true);

        //     $randFacingKey=array_rand($listFacingID, 1);
        //     $facingID=$listFacingID[$randFacingKey];
        //     $postObject->facing_id = $facingID;

        //     $postObject->post_detail_id = $postDetail->id;

        //     $postObject-> save();
        // }
        for($fakes=0; $fakes < 50; $fakes++) {

            $author=new Author();
            $author->name = $faker->name();
            $author->surname = $faker->name();
            $author->email = $faker->email();
            $author->save();

            $article=new Article();
            $article->title = $faker->sentence(3);
            $article->text = $faker->paragraph(4);
            $article->author_id = $author->id;
            $article->cover = $faker->imageUrl(640, 480, 'animals', true, 'cats');
            $article->save();
        }
    }
}
