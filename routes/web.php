<?php
use Illuminate\Support\Facades\Route;


Route::get('/{slug}', function () {
    return view('welcome');
});



/* TYPES FROMS */
Route::get('app/types/forms/list', 'TypeFormController@list')->name('types.forms.list');
Route::get('app/types/forms/select', 'TypeFormController@select')->name('types.forms.select');
Route::get('app/types/forms/list/{id}', 'TypeFormController@show')->name('types.forms.show');
Route::post('app/types/forms/create', 'TypeFormController@store')->name('types.forms.create');
Route::put('app/types/forms/update', 'TypeFormController@update')->name('types.forms.update');
Route::delete('app/types/forms/delete', 'TypeFormController@destroy')->name('types.forms.delete');
/* TYPE INPUTS */
Route::get('types/inputs/list', 'TypeInputController@list')->name('type.input.list');
Route::get('types/inputs/list/{id}', 'TypeInputController@show')->name('type.input.show');
Route::post('types/inputs/create', 'TypeInputController@store')->name('type.input.create');
Route::put('types/inputs/update', 'TypeInputController@update')->name('type.input.update');
Route::delete('types/inputs/delete', 'TypeInputController@destroy')->name('type.input.delete');
/* INPUTS */
Route::get('app/inputs/list', 'InputController@list')->name('input.list');
Route::get('app/inputs/list/{id}', 'InputController@show')->name('input.show');
Route::post('app/inputs/create', 'InputController@store')->name('input.create');
Route::put('app/inputs/update', 'InputController@update')->name('input.update');
Route::delete('app/inputs/delete', 'InputController@destroy')->name('input.delete');
/* GROUPS INPUTS */
Route::get('app/groups/inputs/{id}', 'GroupInputController@byGroup')->name('groups.inputs.list');
Route::get('app/groups/inputs/add/{id}', 'GroupInputController@byNoGroup')->name('');
Route::get('groups/inputs/list/{id}', 'GroupInputController@show')->name('groups.inputs.show');
Route::post('groups/inputs/create', 'GroupInputController@store')->name('groups.inputs.create');
Route::put('groups/inputs/update', 'GroupInputController@update')->name('groups.inputs.update');
Route::delete('groups/inputs/delete', 'GroupInputController@destroy')->name('groups.inputs.delete');
/* GROUPS*/
Route::get('groups/list', 'GroupController@list')->name('groups.list');
Route::get('groups/list/{id}', 'GroupController@show')->name('groups.show');
Route::post('groups/create', 'GroupController@store')->name('groups.create');
Route::put('groups/update', 'GroupController@update')->name('groups.update');
Route::delete('groups/delete', 'GroupController@destroy')->name('groups.delete');
/* FROMS GROUP */
Route::get('app/forms/groups/form/{id}', 'FormGroupController@byForm')->name('forms.groups.form');
Route::get('forms/groups/list', 'FormGroupController@list')->name('forms.groups.list');
Route::get('forms/groups/list/{id}', 'FormGroupController@show')->name('forms.groups.show');
Route::post('app/forms/groups/create', 'FormGroupController@store')->name('forms.groups.create');
Route::put('forms/groups/update', 'FormGroupController@update')->name('forms.groups.update');
Route::delete('forms/groups/delete', 'FormGroupController@destroy')->name('forms.groups.delete');
/* FROMS */
Route::get('app/forms/', 'FormController@list')->name('forms.list');
Route::get('app/forms/edit/{id}', 'FormController@edit')->name('forms.edit');
Route::get('app/forms/list/{id}', 'FormController@show')->name('forms.show');
Route::post('app/forms/create', 'FormController@store')->name('forms.create');
Route::put('app/forms/update', 'FormController@update')->name('forms.update');
Route::delete('app/forms/delete', 'FormController@destroy')->name('forms.delete');

/* ASSIGN FORM */
Route::post('app/forms/share', 'FormController@share')->name('forms.share');

