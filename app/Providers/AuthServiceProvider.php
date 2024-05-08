<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Models\Diploma;
use App\Models\SubjectCategory;
use App\Policies\DiplomaPolicy;
use App\Policies\SubjectPolicy;
use App\Policies\CategoryPolicy;
use Illuminate\Support\Facades\Gate;
use App\Policies\SubjectCategoryPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        // 'App\Models\User' => 'App\Policies\UserPolicy',
        // 'App\Models\SubjectCategory' => 'App\Policies\SubjectCategoryPolicy',
        'App\Models\Diploma' => 'App\Policies\DiplomaPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // categories policies
        Gate::define('view-categories', [CategoryPolicy::class, 'viewAny']);
        Gate::define('create-categories', [CategoryPolicy::class, 'create']);
        Gate::define('edit-categories', [CategoryPolicy::class, 'update']);
        Gate::define('delete-categories', [CategoryPolicy::class, 'delete']);

        // diplomas policies
        Gate::define('view-diplomas', [DiplomaPolicy::class, 'viewAny']);
        Gate::define('create-diplomas', [DiplomaPolicy::class, 'create']);
        Gate::define('edit-diplomas', [DiplomaPolicy::class, 'update']);
        Gate::define('delete-diplomas', [DiplomaPolicy::class, 'delete']);

        // subject policies
        Gate::define('view-subjects', [SubjectPolicy::class, 'viewAny']);
        Gate::define('create-subjects', [SubjectPolicy::class, 'create']);
        Gate::define('edit-subjects', [SubjectPolicy::class, 'update']);
        Gate::define('delete-subjects', [SubjectPolicy::class, 'delete']);
    }
}
