<?php

namespace App\Providers;

use App\Models\Role;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('add-user', function ($user) {
            $arr_roles = Role::where('user_id', $user->id)->get();
//            dd($arr_roles[0]); die;
            if (count($arr_roles) == 0 || $arr_roles == null) {
                return false;
            } elseif (count($arr_roles) >= 1) {
                foreach ($arr_roles as $role) {
                    if ($role->type == 0) {
                        return true;
                    } else {
                        return false;
                    }
                }
            } else {
                return false;
            }
        });

        Gate::define('reset-password', function ($user) {
            $arr_roles = Role::where('user_id', $user->id)->get();
//            dd($arr_roles[0]); die;
            if (count($arr_roles) == 0 || $arr_roles == null) {
                return false;
            } elseif (count($arr_roles) >= 1) {
                foreach ($arr_roles as $role) {
                    if ($role->type == 0) {
                        return true;
                    } else {
                        return false;
                    }
                }
            } else {
                return false;
            }
        });

        Gate::define('employee-management', function ($user) {
            $arr_roles = Role::where('user_id', $user->id)->get();
            if (count($arr_roles) == 0 || $arr_roles == null) {
                return false;
            } elseif (count($arr_roles) >= 1) {
                foreach ($arr_roles as $role) {
                    if ($role->type == 0) {
                        return true;
                    } else {
                        return false;
                    }
                }
            } else {
                return false;
            }
        });
    }
}
