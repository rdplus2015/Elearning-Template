<?php

use App\category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new category();
        $category -> icon = ' <i class="fas fa-code"> </i> ';
        $category -> name = 'developpement web';
        $category -> save();

        $category = new category();
        $category -> icon = ' <i class="fas fa-terminal"> </i> ';
        $category -> name = 'developpement logiciel';
        $category -> save();
      
        $category = new category();
        $category -> icon = ' <i class="fas fa-address-card"> </i> ';
        $category -> name = 'design graphique';
        $category -> save();

    }
}
