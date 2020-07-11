<?php

use App\Settings\SettingsCommonsDatabase;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', SettingsCommonsDatabase::getDefaultLength());
            $table->string('code', SettingsCommonsDatabase::getCodeLength());
            SettingsCommonsDatabase::addAuditFields($table);
            $table->unsignedInteger('types_forms_id')->nullable(false);
            $table->timestamps();
        });

        Schema::table('forms', function (Blueprint $table) {
            $table->foreign('types_forms_id')->references('id')->on('types_forms')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
