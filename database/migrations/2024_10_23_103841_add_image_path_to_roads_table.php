<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagePathToRoadsTable extends Migration
{
    public function up()
    {
        Schema::table('roads', function (Blueprint $table) {
            $table->string('image_path')->nullable(); // Add the image_path column
        });
    }

    public function down()
    {
        Schema::table('roads', function (Blueprint $table) {
            $table->dropColumn('image_path'); // Drop the column if the migration is rolled back
        });
    }
}

