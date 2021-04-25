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
        DB ::table ( 'restaurants' ) -> insert ( [
            'name' => Str ::random ( 10 ),
            'phone' => rand ( 1, 1000 ) . rand ( 1, 1000 ),
            'address' => Str ::random ( 10 ),
            'created_at' => Carbon ::now (),
            'updated_at' => Carbon ::now ()
        ] );

        DB ::table ( 'categories' ) -> insert ( [
            [ 'name' => 'Arabic', 'created_at' => Carbon ::now (), 'updated_at' => Carbon ::now () ],
            [ 'name' => 'Asian', 'created_at' => Carbon ::now (), 'updated_at' => Carbon ::now () ],
            [ 'name' => 'Beverages', 'created_at' => Carbon ::now (), 'updated_at' => Carbon ::now () ],
            [ 'name' => 'Breakfast', 'created_at' => Carbon ::now (), 'updated_at' => Carbon ::now () ],
            [ 'name' => 'Burgers', 'created_at' => Carbon ::now (), 'updated_at' => Carbon ::now () ],
            [ 'name' => 'Cafe', 'created_at' => Carbon ::now (), 'updated_at' => Carbon ::now () ],
            [ 'name' => 'Chinese', 'created_at' => Carbon ::now (), 'updated_at' => Carbon ::now () ],
            [ 'name' => 'Chocolate', 'created_at' => Carbon ::now (), 'updated_at' => Carbon ::now () ],
            [ 'name' => 'Desserts', 'created_at' => Carbon ::now (), 'updated_at' => Carbon ::now () ],
            [ 'name' => 'Egyptian', 'created_at' => Carbon ::now (), 'updated_at' => Carbon ::now () ],
            [ 'name' => 'French', 'created_at' => Carbon ::now (), 'updated_at' => Carbon ::now () ],
            [ 'name' => 'Grills', 'created_at' => Carbon ::now (), 'updated_at' => Carbon ::now () ],
            [ 'name' => 'Healthy', 'created_at' => Carbon ::now (), 'updated_at' => Carbon ::now () ],
            [ 'name' => 'Thai', 'created_at' => Carbon ::now (), 'updated_at' => Carbon ::now () ],
            [ 'name' => 'Tunisian', 'created_at' => Carbon ::now (), 'updated_at' => Carbon ::now () ],
            [ 'name' => 'Turkish', 'created_at' => Carbon ::now (), 'updated_at' => Carbon ::now () ],
            [ 'name' => 'Vegetarian', 'ccreated_at' => Carbon ::now (), 'updated_at' => Carbon ::now () ]
        ] );

        Item ::factory ( 5 ) -> create ();
    }
}
