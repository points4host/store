<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('display_name');
            $table->string('description')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->Integer('user_count')->default(0);
            $table->timestamps();
        });
        
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('display_name')->nullable();
            $table->unsignedBigInteger('role_id');

            //foreign key
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions');
    }
}
