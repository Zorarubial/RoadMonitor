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
        if (Schema::hasColumn('roads', 'category')) {
            // Rename 'category' to 'description'
            $table->renameColumn('category', 'description');
        }

        if (!Schema::hasColumn('roads', 'description')) {
            // Only add 'description' column if it doesn't already exist
            $table->text('description')->nullable(); // Nullable or adjust as necessary
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
