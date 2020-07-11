<?php

use App\Settings\SettingsCommonsDatabase;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsGroupsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('forms_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('forms_id')->nullable(false);
            $table->unsignedInteger('groups_id')->nullable(false);
            SettingsCommonsDatabase::addAuditFields($table);
            $table->timestamps();
        });
        Schema::table('forms_groups', function (Blueprint $table) {
            $table->foreign('forms_id')->references('id')->on('forms')
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
        Schema::dropIfExists('forms_groups');
    }
}
