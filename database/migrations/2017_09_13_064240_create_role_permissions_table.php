<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permissions', function (Blueprint $table) {
            $table->unsignedInteger('roles_id');
            $table->unsignedInteger('permissions_id');
            $table->index("roles_id");
            $table->index("permissions_id");
            $table->unique(["roles_id","permissions_id","deleted_at"]);
            $table->foreign("roles_id")->references("id")->on("roles");
            $table->foreign("permissions_id")->references("id")->on("permissions");
            $table->softDeletes();
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
        Schema::dropIfExists('role_permissions');
    }
}
