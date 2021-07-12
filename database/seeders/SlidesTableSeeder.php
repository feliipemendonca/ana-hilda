<?php

namespace Database\Seeders;

use App\Models\Slides;
use App\Models\Files;
use Illuminate\Database\Seeder;

class SlidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = new Files;
        $file->name = 'slide.jpg';
        $file->filename = 'slide.jpg';
        $file->path = 'images/slide.jpg';
        $file->save();

        $slide = new Slides;
        $slide->files_id = $file->id;
        $slide->title = "Primeiro Slide";
        $slide->position = 0;
        $slide->active = true;
        $slide->start_at = now();
        $slide->finish_at = date('Y-m-d', strtotime('2021-12-30'));
        $slide->save();
    
    }
}
