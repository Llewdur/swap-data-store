<?php

namespace App\Providers;

//use App\Repository\Csv\UserRepository;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\UserRepository;

use App\Repository\EloquentRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
