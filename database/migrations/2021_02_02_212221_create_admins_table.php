<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->boolean('brand')->default(false);
            $table->boolean('category')->default(false);
            $table->boolean('product')->default(false);
            $table->boolean('slider')->default(false);
            $table->boolean('coupons')->default(false);
            $table->boolean('shipping')->default(false);
            $table->boolean('blog')->default(false);
            $table->boolean('setting')->default(false);
            $table->boolean('returnorder')->default(false);
            $table->boolean('review')->default(false);
            $table->boolean('orders')->default(false);
            $table->boolean('stock')->default(false);
            $table->boolean('reports')->default(false);
            $table->boolean('alluser')->default(false);
            $table->boolean('adminuserrole')->default(false);
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
        Schema::dropIfExists('admins');
    }
}
