<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('offer_stats')) {
            Schema::create('offer_stats', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('offer_id')->index();
                $table->unsignedBigInteger('visitor_count')->default(0);

                $table->timestamps();
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
        Schema::dropIfExists('offer_stats');
    }
}
