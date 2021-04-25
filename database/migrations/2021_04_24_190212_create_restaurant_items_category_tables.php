<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantItemsCategoryTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up ()
    {
        if ( ! Schema ::hasTable ( 'restaurants' ) ) {
            Schema ::create ( 'restaurants', function ( Blueprint $table ) {
                $table -> id ();
                $table -> string ( 'name' );
                $table -> string ( 'phone' );
                $table -> string ( 'address' );
                $table -> timestamps ();
            } );
        }

        if ( ! Schema ::hasTable ( 'categories' ) ) {
            Schema ::create ( 'categories', function ( Blueprint $table ) {
                $table -> id ();
                $table -> string ( 'name' );
                $table -> timestamps ();
            } );
        }

        if ( ! Schema ::hasTable ( 'items' ) ) {
            Schema ::create ( 'items', function ( Blueprint $table ) {
                $table -> id ();
                $table -> string ( 'name' );
                $table -> string ( 'price' );
                $table -> integer ( 'category' ) -> nullable ();
                $table -> timestamps ();
            } );
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down ()
    {
        Schema ::dropIfExists ( 'restaurants' );
        Schema ::dropIfExists ( 'items' );
        Schema ::dropIfExists ( 'categories' );
    }
}
