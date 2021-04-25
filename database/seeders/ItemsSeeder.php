<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use \App\Models\Item;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
        $now = Carbon ::now ();
        DB ::table ( 'restaurants' ) -> insert ( [
            'name' => Str ::random ( 10 ),
            'phone' => rand ( 1, 1000 ) . rand ( 1, 1000 ),
            'address' => Str ::random ( 10 ),
            'created_at' => $now,
            'updated_at' => $now
        ] );

        DB ::table ( 'categories' ) -> insert ( [
            [ 'name' => 'Arabic', 'created_at' => $now, 'updated_at' => $now ],
            [ 'name' => 'Asian', 'created_at' => $now, 'updated_at' => $now ],
            [ 'name' => 'Beverages', 'created_at' => $now, 'updated_at' => $now ],
            [ 'name' => 'Breakfast', 'created_at' => $now, 'updated_at' => $now ],
            [ 'name' => 'Burgers', 'created_at' => $now, 'updated_at' => $now ],
            [ 'name' => 'Cafe', 'created_at' => $now, 'updated_at' => $now ],
            [ 'name' => 'Chinese', 'created_at' => $now, 'updated_at' => $now ],
            [ 'name' => 'Chocolate', 'created_at' => $now, 'updated_at' => $now ],
            [ 'name' => 'Desserts', 'created_at' => $now, 'updated_at' => $now ],
            [ 'name' => 'Egyptian', 'created_at' => $now, 'updated_at' => $now ],
            [ 'name' => 'French', 'created_at' => $now, 'updated_at' => $now ],
            [ 'name' => 'Grills', 'created_at' => $now, 'updated_at' => $now ],
            [ 'name' => 'Healthy', 'created_at' => $now, 'updated_at' => $now ],
            [ 'name' => 'Thai', 'created_at' => $now, 'updated_at' => $now ],
            [ 'name' => 'Tunisian', 'created_at' => $now, 'updated_at' => $now ],
            [ 'name' => 'Turkish', 'created_at' => $now, 'updated_at' => $now ],
            [ 'name' => 'Vegetarian', 'ccreated_at' => $now, 'updated_at' => $now ]
        ] );

        Item ::factory ( 5 ) -> create ();

        DB ::table ( 'items' ) -> insert ( [
            [ 'name' => 'Burgers', 'price' => 20, 'category' => 5, 'created_at' => $now, 'updated_at' => $now ],
            [ 'name' => 'Steak', 'price' => 30, 'category' => 12, 'created_at' => $now, 'updated_at' => $now ],
            [ 'name' => 'Chowmien', 'price' => 40, 'category' => 7, 'created_at' => $now, 'updated_at' => $now ],
            [ 'name' => 'Pizza', 'price' => 70, 'category' => 2, 'created_at' => $now, 'updated_at' => $now ],

        ] );
    }
}
