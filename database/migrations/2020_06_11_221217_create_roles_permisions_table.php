<?php

use App\Settings\SettingsCommonsDatabase;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesPermisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_permissions', function (Blueprint $table) {
            SettingsCommonsDatabase::addId($table);
            $table->unsignedInteger('roles_id')->nullable(false);
            $table->unsignedInteger('permissions_id')->nullable(false);
            SettingsCommonsDatabase::addAuditFields($table);
            $table->timestamps();
        });
        Schema::table('roles_permissions', function (Blueprint $table) {
            $table->foreign('roles_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('permissions_id')->references('id')->on('permissions')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_permissions');
    }
}
