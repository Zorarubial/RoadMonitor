<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roads', function (Blueprint $table) {
            $table->decimal('latitude', 10, 8)->nullable()->after('description'); // Adjust precision as needed
            $table->decimal('longitude', 11, 8)->nullable()->after('latitude'); // Adjust precision as needed
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roads', function (Blueprint $table) {
            $table->dropColumn(['latitude', 'longitude']);
        });
    }
};
