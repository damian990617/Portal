<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('offer_categories')) {
            Schema::create('offer_categories', function (Blueprint $table) {
                $table->id();
                $table->json('name')->nullable();
                $table->json('slug')->nullable();

                $table->json('short_content')->nullable();
                $table->json('content')->nullable();
                $table->boolean('active')->default(1);

                $table->timestamps();
                $table->softDeletes();
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
        Schema::dropIfExists('offer_categories');
    }
}
