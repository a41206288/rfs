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
        $roleModerator = $role->create([
            'name' => 'Moderator',
            'slug' => 'moderator',
            'description' => 'manage moderator privileges'
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
        $permModerator = $permission->create([
            'name'        => 'Moderator',
            'slug'        => [          // pass an array of permissions.
                'create'     => false,
                'view'       => true,
                'update'     => false,
                'delete'     => false,
                'view.phone' => false
            ],
            'description' => 'manage Moderator  permissions'
        ]);

        //Assign Permission(s) to Role

        $roleAdmin->assignPermission($permAdmin);
        $roleModerator->assignPermission($permModerator);

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
        Role::where('name', '=', 'Moderator')->delete();


    }

}
