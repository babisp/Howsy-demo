<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('properties', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('address_1')->nullable();
      $table->string('address_2')->nullable();
      $table->string('city')->nullable();
      $table->string('postcode')->nullable();
      $table->double('latitude', 12, 9)->nullable();
      $table->double('longitude', 12, 9)->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('properties');
  }
}
