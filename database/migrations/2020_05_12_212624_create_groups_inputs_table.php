<?php

use App\Settings\SettingsCommonsDatabase;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsInputsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('groups_inputs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('inputs_id')->nullable(false);
            $table->unsignedInteger('groups_id')->nullable(false);
            SettingsCommonsDatabase::addAuditFields($table);
            $table->timestamps();
        });

        Schema::table('groups_inputs', function (Blueprint $table) {
            $table->foreign('inputs_id')->references('id')->on('inputs')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('groups_id')->references('id')->on('groups')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('groups_inputs');
    }
}
