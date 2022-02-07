<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PostCategory;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new PostCategory();
        $data->post_id = 1;
        $data->category_id = 1;
        $data->save();

        $data = new PostCategory();
        $data->post_id = 2;
        $data->category_id = 2;
        $data->save();
    }
}
