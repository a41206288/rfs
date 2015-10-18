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
            'description' => '系統管理者'
        ]);

        $role = new Role();
        $roleCenter = $role->create([
            'name' => 'Center',
            'slug' => 'center',
            'description' => '中央指揮官'
        ]);

        $role = new Role();
        $roleLocal = $role->create([
            'name' => 'Local',
            'slug' => 'local',
            'description' => '地方指揮官'
        ]);

//        $role = new Role();
//        $roleAnalysis = $role->create([
//            'name' => 'Analysis',
//            'slug' => 'analysis',
//            'description' => '現場分析組'
//        ]);


        $role = new Role();
        $roleResource = $role->create([
            'name' => 'Resource',
            'slug' => 'resource',
            'description' => '後勤部門'
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

//        $role = new Role();
//        $roleResource = $role->create([
//            'name' => 'Resource',
//            'slug' => 'resource',
//            'description' => '資源監控組'
//        ]);

//        $role = new Role();
//        $roleMasses = $role->create([
//            'name' => 'Masses',
//            'slug' => 'masses',
//            'description' => '一般民眾'
//        ]);

        $role = new Role();
        $roleFire = $role->create([
            'name' => 'Fire',
            'slug' => 'fire',
            'description' => '救火組'
        ]);

        $role = new Role();
        $roleClean = $role->create([
            'name' => 'Clean',
            'slug' => 'clean',
            'description' => '清潔組'
        ]);

        $role = new Role();
        $roleRoad = $role->create([
            'name' => 'Road',
            'slug' => 'road',
            'description' => '道路修復組'
        ]);

        $role = new Role();
        $rolePipe = $role->create([
            'name' => 'Pipe',
            'slug' => 'pipe',
            'description' => '管線修復組'
        ]);

        $role = new Role();
        $rolePolice = $role->create([
            'name' => 'Police',
            'slug' => 'police',
            'description' => '警戒組'
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
        $permCenter = $permission->create([
            'name'        => 'Center',
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
        $permLocal = $permission->create([
            'name'        => 'Local',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage LocalCommander  permissions'
        ]);

//        $permission = new Permission();
//        $permAnalysis = $permission->create([
//            'name'        => 'Analysis',
//            'slug'        => [          // pass an array of permissions.
//                'create'     => true,
//                'view'       => true,
//                'update'     => true,
//                'delete'     => true,
//                'view.phone' => true
//            ],
//            'description' => 'analysis  permissions'
//        ]);

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





//        $permission = new Permission();
//        $permMasses = $permission->create([
//            'name'        => 'Masses',
//            'slug'        => [          // pass an array of permissions.
//                'create'     => true,
//                'view'       => true,
//                'update'     => true,
//                'delete'     => true,
//                'view.phone' => true
//            ],
//            'description' => 'manage Masses  permissions'
//        ]);


        $permission = new Permission();
        $permFire = $permission->create([
            'name'        => 'Fire',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage Fire  permissions'
        ]);

        $permission = new Permission();
        $permClean = $permission->create([
            'name'        => 'Clean',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage Clean  permissions'
        ]);
        $permission = new Permission();
        $permRoad = $permission->create([
            'name'        => 'Road',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage Road  permissions'
        ]);
        $permission = new Permission();
        $permPipe = $permission->create([
            'name'        => 'Pipe',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage Pipe  permissions'
        ]);
        $permission = new Permission();
        $permPolice = $permission->create([
            'name'        => 'Police',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage Police  permissions'
        ]);

        //Assign Permission(s) to Role

        $roleAdmin->assignPermission($permAdmin);
        $roleCenter->assignPermission($permCenter);
        $roleLocal->assignPermission($permLocal);
        $roleResource->assignPermission($permResource);
        $roleEMT->assignPermission($permEMT);
        $roleReliever->assignPermission($permReliever);
//        $roleMasses->assignPermission($permMasses);
//        $roleAnalysis->assignPermission($permAnalysis);
        $roleFire->assignPermission($permFire);
        $roleClean->assignPermission($permClean);
        $roleRoad->assignPermission($permRoad);
        $rolePipe->assignPermission($permPipe);
        $rolePolice->assignPermission($permPolice);
        //Assign Role(s) To User

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
//        Role::where('name', '=', 'Administrator')->delete();
//        Role::where('name', '=', 'CenterCommander')->delete();
//        Role::where('name', '=', 'LocalCommander')->delete();
//        Role::where('name', '=', 'Reliever')->delete();
//        Role::where('name', '=', 'EMT')->delete();
//        Role::where('name', '=', 'Resource')->delete();
//        Role::where('name', '=', 'Masses')->delete();
//        Role::where('name', '=', 'Analysis')->delete();
//        Role::where('name', '=', 'Cresource')->delete();
//        Role::where('name', '=', 'Fire')->delete();
//        Role::where('name', '=', 'Clean')->delete();
//        Role::where('name', '=', 'Road')->delete();
//        Role::where('name', '=', 'Pipe')->delete();
//        Role::where('name', '=', 'Police')->delete();


    }

}
