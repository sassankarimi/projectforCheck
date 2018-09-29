<?php

namespace App\Providers;


use App\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use DB;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        \App\Note::class => \App\Policies\Notepolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {

//        $this->registerPolicies($gate);
//
//        foreach ($this->getPermission() as $permission) {
//            $gate->define($permission->name, function ($user) use($permission) {
//              return  $user->hasRole($permission->roles);
//            });
//        }
    }
    protected function getPermission()
    {
        return Permission::with('roles')->get();
    }
//    public function boot(GateContract $gate)
//    {
//
//       // $this->registerPolicies($gate);
////        $gate->define('edit_note',function($user,$note){
////            return $user->owns ($note);
//           // return $user->id==$note->user_id;
//        });
//        $gate->define('edit_note',function($user,$card){
//            return $user->owns($card);
//            // return $user->id==$note->user_id;
//        });

        //
   // }
}
