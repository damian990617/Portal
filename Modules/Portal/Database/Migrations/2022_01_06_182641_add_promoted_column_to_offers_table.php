<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPromotedColumnToOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('offers', 'promoted')) {
            Schema::table('offers', function (Blueprint $table) {
                $table->boolean('promoted')->default(0)->after('negotiate');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('offers', 'promoted')) {
            Schema::table('offers', function (Blueprint $table) {
                $table->dropColumn('promoted');
            });
        }
    }
}
