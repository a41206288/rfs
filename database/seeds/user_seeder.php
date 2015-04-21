<?php
//use Kodeine\Acl\Models\Eloquent\Role;
use Illuminate\Support\Facades\DB;
use Kodeine\Acl\Models\Eloquent\Permission;
use app\User;
use Kodeine\Acl\Traits\HasRole;
use Illuminate\Database\Seeder;
/**
 * Created by PhpStorm.
 * User: Tsugumi
 * Date: 2015/4/14
 * Time: 下午 03:47
 */

class user_seeder extends Seeder{
    use HasRole;
    public function run(){
        DB:: table('users')->delete();

        $user = new App\User;
        $user->name = "王小明";
        $user->email = "123@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user = new App\User;
        $user->name = "陳小華";
        $user->email = "456@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->save();

        $user  = User::where('name', '=', '王小明')->first();
        $roleAdmin = Permission::where('name', '=', 'Administrator')->first();
        $user->assignRole($roleAdmin);
        $user->save();
        print_r($user->getRoles());


        $user  = User::where('name', '=', '陳小華')->first();
        $roleModerator = Permission::where('name', '=', 'Moderator')->first();
        $user->assignRole($roleModerator);
        $user->save();
    }
}