<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Post();
        $data->organization_id = 1;
        $data->user_id = 1;
        $data->name = "Config Domain Name Server";
        $data->description = "Check eLearning STIKOM";
        $data->deadline = "2021-04-20 19:00:00";
        $data->uuid = "fsaa8du1he1n2dawkldas";
        $data->save();

        $data = new Post();
        $data->organization_id = 1;
        $data->user_id = 1;
        $data->name = "UI Ulun Danu Batur";
        $data->description = "Check content in slack";
        $data->deadline = "2021-04-10 09:00:00";
        $data->uuid = "21saa8du1he1n2dawkldas";
        $data->save();
    }
}
