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
            // Check if 'description' column does not exist before adding it
            if (!Schema::hasColumn('roads', 'description')) {
                $table->text('description')->nullable(); // Optional, can adjust as needed
            }
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
            // Revert 'description' back to 'category' and change it back to 'integer'
            $table->renameColumn('description', 'category');
            $table->integer('category')->change();
        });
    }
};
