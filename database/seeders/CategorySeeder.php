<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Category();
        $data->organization_id = 1;
        $data->name = "School";
        $data->status = 1;
        $data->save();

        $data = new Category();
        $data->organization_id = 1;
        $data->name = "Work";
        $data->status = 1;
        $data->save();

        $data = new Category();
        $data->organization_id = 1;
        $data->name = "Pray";
        $data->status = 1;
        $data->save();
    }
}
