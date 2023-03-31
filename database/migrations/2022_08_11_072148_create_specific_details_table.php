<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecificDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specific_details', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('type_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('sub_type_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('sector_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('sub_sector_id')->nullable()->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('specific_details');
    }
}