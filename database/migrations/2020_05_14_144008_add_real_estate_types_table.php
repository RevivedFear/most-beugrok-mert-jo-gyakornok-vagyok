<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRealEstateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_types', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description', 500);
        });
        DB::statement("
        insert into real_estate_types (name,description) values ('Családi ház', 'Nagy házikó sok szobával családoknak.');
        ");
        DB::statement("
        insert into real_estate_types (name,description) values ('Lakás', 'Önálló lakóhely, amely egy személy, család vagy összeköltözött pár otthonául szolgál.');
        ");
        DB::statement("
        insert into real_estate_types (name,description) values ('Garázs', 'Költséghatákony megoldás.');
        ");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('real_estate_types');

    }
}
