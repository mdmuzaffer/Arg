<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use App\Models\Permission;

class permissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        try{
            permission::get()->map(function($permission){
                Gate::define($permission->permission_slug,function($user) use($permission){
                    return $user->hasPermissionTo($permission);
                });
            });
        }catch(\Exception $e){
            report($e);
            echo $e->getMessage();
            //return false;
        }

        //create blade directory
        Blade::directive('role',function($role){
            return "<?php if(auth()->check() && auth()->user()->hasRole({$role})){?>";
        });

        Blade::directive('endrole',function($role){
            return "<?php } ?>";
        });
    }
}
