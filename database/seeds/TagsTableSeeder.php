<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(['name' => 'pixel art']);
        Tag::create(['name' => 'voxel art']);
        Tag::create(['name' => '3d model']);
        Tag::create(['name' => 'traditional']);
        Tag::create(['name' => 'web design']);
        Tag::create(['name' => 'logo design']);
        Tag::create(['name' => 'illustration']);
        Tag::create(['name' => 'fan art']);
        Tag::create(['name' => 'original art']);
    }
}
