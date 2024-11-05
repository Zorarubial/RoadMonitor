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
            // Rename 'category' to 'description' and change its type to 'text'
            $table->renameColumn('category', 'description');
            $table->text('description')->change();
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
