<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Kodeine\Acl\Models\Eloquent\Role;
use Kodeine\Acl\Models\Eloquent\Permission;
use App\User;
use Kodeine\Acl\Traits\HasRole;
class NewRole extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Create Role

        $role = new Role();
        $roleAdmin = $role->create([
            'name' => 'Administrator',
            'slug' => 'administrator',
            'description' => 'manage administration privileges'
        ]);

        $role = new Role();
        $roleCenterCommander = $role->create([
            'name' => 'CenterCommander',
            'slug' => 'centerCommander',
            'description' => '中央指揮官'
        ]);

        $role = new Role();
        $roleLocalCommander = $role->create([
            'name' => 'LocalCommander',
            'slug' => 'localCommander',
            'description' => '地方指揮官'
        ]);

        $role = new Role();
        $roleReliever = $role->create([
            'name' => 'Reliever',
            'slug' => 'reliever',
            'description' => '脫困組'
        ]);

        $role = new Role();
        $roleEMT = $role->create([
            'name' => 'emt',
            'slug' => 'emt',
            'description' => '醫療組'
        ]);

        $role = new Role();
        $roleResource = $role->create([
            'name' => 'Resource',
            'slug' => 'resource',
            'description' => '資源監控組'
        ]);

        $role = new Role();
        $roleMasses = $role->create([
            'name' => 'Masses',
            'slug' => 'masses',
            'description' => '一般民眾'
        ]);

         //Create Permissions

        $permission = new Permission();
        $permAdmin = $permission->create([
            'name'        => 'Administrator',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage Admin permissions'
        ]);

        $permission = new Permission();
        $permCenterCommander = $permission->create([
            'name'        => 'CenterCommander',
            'slug'        => [          // pass an array of permissions.
                'create'     =>  true,
                'view'       => true,
                'update'     =>  true,
                'delete'     =>  true,
                'view.phone' =>  true
            ],
            'description' => 'manage CenterCommander  permissions'
        ]);

        $permission = new Permission();
        $permLocalCommander = $permission->create([
            'name'        => 'LocalCommander',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage LocalCommander  permissions'
        ]);

        $permission = new Permission();
        $permReliever = $permission->create([
            'name'        => 'Reliever',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage Reliever  permissions'
        ]);

        $permission = new Permission();
        $permEMT = $permission->create([
            'name'        => 'emt',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage EMT  permissions'
        ]);

        $permission = new Permission();
        $permResource = $permission->create([
            'name'        => 'Resource',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage Resource  permissions'
        ]);

        $permission = new Permission();
        $permMasses = $permission->create([
            'name'        => 'Masses',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage Masses  permissions'
        ]);

        //Assign Permission(s) to Role

        $roleAdmin->assignPermission($permAdmin);
        $roleCenterCommander->assignPermission($permCenterCommander);
        $roleLocalCommander->assignPermission($permLocalCommander);
        $roleReliever->assignPermission($permReliever);
        $roleEMT->assignPermission($permEMT);
        $roleResource->assignPermission($permResource);
        $roleMasses->assignPermission($permMasses);

        //Assign Role(s) To User

//        $user  = User::where('name', '=', '王小明');
//        $user->assignRole($roleAdmin);
//
//        $user  = User::where('name', '=', '陳小華');
//        $user->assignRole($roleModerator);
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {


//        //Revoke All User Roles
//        $user->revokeAllRoles();
//
//        //Revoke Permission(s) from Role
//        $roleAdmin->revokeAllPermissions();
//        $roleModerator->revokeAllPermissions();

        // delete Role
        Role::where('name', '=', 'Administrator')->delete();
        Role::where('name', '=', 'CenterCommander')->delete();
        Role::where('name', '=', 'LocalCommander')->delete();
        Role::where('name', '=', 'Reliever')->delete();
        Role::where('name', '=', 'EMT')->delete();
        Role::where('name', '=', 'Resource')->delete();
        Role::where('name', '=', 'Masses')->delete();


    }

}
