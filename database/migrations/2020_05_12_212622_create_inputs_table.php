<?php

use App\Settings\SettingsCommonsDatabase;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('inputs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', SettingsCommonsDatabase::getDefaultLength());
            $table->text('description');
            $table->string('code', SettingsCommonsDatabase::getCodeLength());
            $table->string('label', SettingsCommonsDatabase::getDefaultLength());
            $table->string('required')->default('');
            $table->string('is_table')->default('no');
            $table->unsignedInteger('formats_id')->nullable(true);
            $table->unsignedInteger('types_inputs_id')->nullable(false);
            SettingsCommonsDatabase::addAuditFields($table);
            $table->timestamps();
        });
        Schema::table('inputs', function (Blueprint $table) {
            $table->foreign('formats_id')->references('id')->on('formats')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('types_inputs_id')->references('id')->on('types_inputs')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('inputs');
    }
}
