<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('offers')) {
            Schema::create('offers', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id')->index();
                $table->unsignedBigInteger('category_id')->index();
                $table->json('name')->nullable();
                $table->json('slug')->nullable();
                $table->unsignedFloat('price')->default(0);
                $table->boolean('negotiate')->default(0);

                $table->json('short_content')->nullable();
                $table->json('content')->nullable();

                $table->boolean('active')->default(0);

                if (class_exists(Modules\Cms\Entities\User::class)) {
                    $table->foreign('user_id')->references('id')->on('cms_users');
                }

                $table->unsignedBigInteger('accepted_by')->nullable();
                $table->timestamp('accepted_at')->nullable();
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
        if (class_exists(Modules\Cms\Entities\User::class)) {
            if (Schema::hasTable('offers')) {
                Schema::table('offers', function (Blueprint $table) {
                    $table->dropForeign(['user_id']);
                    $table->dropIndex(['user_id']);
                });
            }
        }
        Schema::dropIfExists('offers');
    }
}
