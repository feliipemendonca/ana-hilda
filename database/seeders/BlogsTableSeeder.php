<?php

namespace Database\Seeders;

use App\Models\Blogs;
use App\Models\Files;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = new Files;
        $file->id = Str::uuid();
        $file->name = "blog.png";
        $file->filename ="images/blog.png";
        $file->path = "images";
        $file->save();

        $item = [
            [
                'files_id' => $file->id,
                'title' => 'Lorem Ipsum',
                'description' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, deleniti asperiores. Doloremque harum explicabo dolorem quisquam dignissimos. Ipsam, laboriosam officiis quisquam accusamus doloremque iste odio deserunt, nostrum id voluptate dolorum.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, deleniti asperiores. Doloremque harum explicabo dolorem quisquam dignissimos. Ipsam, laboriosam officiis quisquam accusamus doloremque iste odio deserunt, nostrum id voluptate dolorum.</p>'
            ]
        ];

        for ($i=0; $i < 20; $i++) { 
            foreach ($item as $key => $value) {
                Blogs::create($value);
            }
        }    
    }
}
