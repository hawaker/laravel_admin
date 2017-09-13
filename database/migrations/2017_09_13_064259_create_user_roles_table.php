<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRolesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->integer('users_id');
            $table->integer('roles_id');
            $table->index("roles_id");
            $table->index("users_id");
            $table->unique(["users_id", "roles_id", "deleted_at"]);
            $table->foreign("roles_id")->references("id")->on("roles");
            $table->foreign("users_id")->references("id")->on("users");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('user_roles');
    }

}
