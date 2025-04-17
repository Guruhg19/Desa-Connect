<?php

namespace App\Providers;

use app\Http\Resources\FamilyMemberRepository;
use App\Interfaces\HeadOfFamilyRepositoryInterface;
use App\Interfaces\HeadOfRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\HeadOfFamilyRepository;
use app\Repositories\UserRepository;
use FamilyMemberRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(HeadOfFamilyRepositoryInterface::class, HeadOfFamilyRepository::class);
        $this->app->bind(FamilyMemberRepositoryInterface::class, FamilyMemberRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
