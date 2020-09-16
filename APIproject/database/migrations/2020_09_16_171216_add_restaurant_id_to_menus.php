<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRestaurantIdToMenus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->unsignedBigInteger('restaurant_id')->after('name')->nullable();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')
                ->onUpdate('cascade')->onDelete('set null');
            $table->string('image')->after('price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->dropForeign('menus_restaurant_id_foreign');
            $table->dropColumn('restaurant_id');
            $table->dropColumn('image');
        });
    }
}
