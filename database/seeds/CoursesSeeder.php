<?php

use App\category;
use App\course;
use App\User;
use Cocur\Slugify\Slugify;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slugify = new Slugify();

        $course = new course();
        $course -> title = 'les bases de symfony 5';
        $course -> subtitle = 'aprennez a utiliser le framwork symphony';
        $course -> slug = $slugify ->slugify($course -> title);
        $course -> description = 'loren ipsum do collor ';
        $course -> price = 78.99;
        $course -> category_id = category::all()-> random(1)-> first()-> id;
        $course -> user_id = User::all()-> random(1)-> first()-> id;
        $course -> save();

        $course = new course();
        $course -> title = 'les bases de laravel 5';
        $course -> subtitle = 'aprennez a utiliser le framwork laravel';
        $course -> slug = $slugify ->slugify($course -> title);
        $course -> description = 'loren ipsum do collor ';
        $course -> price = 78.99;
        $course -> category_id = category::all()-> random(1)-> first()-> id;
        $course -> user_id = User::all()-> random(1)-> first()-> id;
        $course -> save();

        $course = new course();
        $course -> title = 'maitriser html et css ';
        $course -> subtitle = 'aprennez a creer un site';
        $course -> slug = $slugify ->slugify($course -> title);
        $course -> description = 'loren ipsum do collor ';
        $course -> price = 78.99;
        $course -> category_id = category::all()-> random(1)-> first()-> id;
        $course -> user_id = User::all()-> random(1)-> first()-> id;
        $course -> save();

        $course = new course();
        $course -> title = 'maitrisez git et github';
        $course -> subtitle = 'comprendre git';
        $course -> slug = $slugify ->slugify($course -> title);
        $course -> description = 'loren ipsum do collor ';
        $course -> price = 78.99;
        $course -> category_id = category::all()-> random(1)-> first()-> id;
        $course -> user_id = User::all()-> random(1)-> first()-> id;
        $course -> save();

        $course = new course();
        $course -> title = 'maitrisez le javascript';
        $course -> subtitle = 'javascript pour tous';
        $course -> slug = $slugify ->slugify($course -> title);
        $course -> description = 'loren ipsum do collor ';
        $course -> price = 78.99;
        $course -> category_id = category::all()-> random(1)-> first()-> id;
        $course -> user_id = User::all()-> random(1)-> first()-> id;
        $course -> save();
    }
}
