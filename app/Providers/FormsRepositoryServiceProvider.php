<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FormsRepositoryServiceProvider extends ServiceProvider
{

    protected $namespace = 'App\Repositories';
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\ITypesInputsRepository', 'App\Repositories\Eloquent\TypesInputsRepository');
        $this->app->bind('App\Repositories\TypesFormsRepository', 'App\Repositories\Eloquent\EloquentTypesFormsRepository');
        $this->app->bind('App\Repositories\InputRepository', 'App\Repositories\Eloquent\EloquentInputRepository');
        $this->app->bind('App\Repositories\GroupsInputsRepository', 'App\Repositories\Eloquent\EloquentGroupsInputsRepository');
        $this->app->bind('App\Repositories\GroupsRepository', 'App\Repositories\Eloquent\EloquentGroupsRepository');
        $this->app->bind('App\Repositories\FormsGroupsRepository', 'App\Repositories\Eloquent\EloquentFormsGroupsRepository');
        $this->app->bind('App\Repositories\FormsRepository', 'App\Repositories\Eloquent\EloquentFormsRepository');
        $this->app->bind('App\Repositories\UsersRepository', 'App\Repositories\Eloquent\EloquentUsersRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
