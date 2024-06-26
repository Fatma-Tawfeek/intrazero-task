<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Models\Diploma;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Policies\CoursePolicy;
use App\Models\SubjectCategory;
use App\Policies\DiplomaPolicy;
use App\Policies\SubjectPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\StudyPlanPolicy;
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

        // courses policies
        Gate::define('view-courses', [CoursePolicy::class, 'viewAny']);
        Gate::define('create-courses', [CoursePolicy::class, 'create']);
        Gate::define('edit-courses', [CoursePolicy::class, 'update']);
        Gate::define('delete-courses', [CoursePolicy::class, 'delete']);

        // study plans policies
        Gate::define('view-study-plans', [StudyPlanPolicy::class, 'viewAny']);
        Gate::define('create-study-plans', [StudyPlanPolicy::class, 'create']);
        Gate::define('edit-study-plans', [StudyPlanPolicy::class, 'update']);
        Gate::define('delete-study-plans', [StudyPlanPolicy::class, 'delete']);

        // role policies
        Gate::define('view-roles', [RolePolicy::class, 'viewAny']);
        Gate::define('create-roles', [RolePolicy::class, 'create']);
        Gate::define('edit-roles', [RolePolicy::class, 'update']);
        Gate::define('delete-roles', [RolePolicy::class, 'delete']);

        // user policies
        Gate::define('view-users', [UserPolicy::class, 'viewAny']);
        Gate::define('edit-users', [UserPolicy::class, 'update']);
    }
}
