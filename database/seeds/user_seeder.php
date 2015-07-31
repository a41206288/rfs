<?php
//use Kodeine\Acl\Models\Eloquent\Role;
use Illuminate\Support\Facades\DB;
use Kodeine\Acl\Models\Eloquent\Permission;
use app\User;
use app\Post;
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
        DB:: table('works_ons')->delete();

        $user = new App\User; //測試用密碼是1234
        $user->id = 1;
        $user->name = "王小明";
        $user->email = "123@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0912312312';
        $user->save();

        $user  = User::where('name', '=', '王小明')->first();
        $roleAdmin = Permission::where('name', '=', 'Administrator')->first();
        $user->assignRole($roleAdmin);
        $user->save();


        $user = new App\User; //測試用密碼是1234
        $user->id = 2;
        $user->name = "陳小華";
        $user->email = "456@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0945645645';
        $user->save();

        $user  = User::where('name', '=', '陳小華')->first();
        $roleCenter = Permission::where('name', '=', 'Center')->first();
        $user->assignRole($roleCenter);
        $user->save();

        $user = new App\User; //測試用密碼是1234
        $user->id = 3;
        $user->name = "陳芊蓉";
        $user->email = "789@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0978978978';
        $user->save();

        $user  = User::where('name', '=', '陳芊蓉')->first();
        $roleAnalysis = Permission::where('name', '=', 'Analysis')->first();
        $user->assignRole( $roleAnalysis );
        $user->mission_list_id = 2;
        $user->save();


        $user = new App\User; //測試用密碼是1234
        $user->id = 4;
        $user->name = "林麗雯";
        $user->email = "004@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0900400404';
        $user->save();

        $user  = User::where('name', '=', '林麗雯')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 1;
        $user->save();


        $user = new App\User; //測試用密碼是1234
        $user->id = 5;
        $user->name = "韓東霖";
        $user->email = "005@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0900500505';
        $user->save();

        $user  = User::where('name', '=', '韓東霖')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 1;
        $user->save();


        $user = new App\User;
        $user->id = 6;
        $user->name = "葉雯情";
        $user->email = "006@yahoo.com.tw";
        $user->password =Hash::make ('6565erg');
        $user->phone = '0900600606';
        $user->save();

        $user  = User::where('name', '=', '葉雯情')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 2;
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->mission_new_locations_id = 1;
        $Works_on->id = 6;
        $Works_on->save();


        $user = new App\User;
        $user->id = 7;
        $user->name = "王麗芳";
        $user->email = "007@yahoo.com.tw";
        $user->password =Hash::make ('e6r5g4654rg');
        $user->phone = '0900700707';
        $user->save();

        $user  = User::where('name', '=', '王麗芳')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_id = 5;
        $user->mission_list_id = 2;
        $user->save();


        $Works_on = new App\Works_on;
        $Works_on->mission_new_locations_id = 3;
        $Works_on->id = 7;
        $Works_on->save();

        $user = new App\User;
        $user->id = 8;
        $user->name = "吳番薯";
        $user->email = "008@yahoo.com.tw";
        $user->password =Hash::make ('xv3z21vz');
        $user->phone = '0900800808';
        $user->save();

        $user  = User::where('name', '=', '吳番薯')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_id = 3;
        $user->mission_list_id = 3;
        $user->save();


        $user = new App\User;
        $user->id = 9;
        $user->name = "葉欣偉";
        $user->email = "009@yahoo.com.tw";
        $user->password =Hash::make ('wer75qr13');
        $user->phone = '0900900909';
        $user->save();

        $user  = User::where('name', '=', '葉欣偉')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_id = 4;
        $user->mission_list_id = 4;
        $user->save();


        $user = new App\User;
        $user->id = 10;
        $user->name = "楊光冽";
        $user->email = "010@yahoo.com.tw";
        $user->password =Hash::make ('3we2r1');
        $user->phone = '0901001010';
        $user->save();

        $user  = User::where('name', '=', '楊光冽')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_id = 11;
        $user->mission_list_id = 5;
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->mission_new_locations_id = 18;
        $Works_on->id = 10;
        $Works_on->save();


        $user = new App\User;
        $user->id = 11;
        $user->name = "簡道鉗";
        $user->email = "011@yahoo.com.tw";
        $user->password =Hash::make ('w13e54f');
        $user->phone = '0901101111';
        $user->save();

        $user  = User::where('name', '=', '簡道鉗')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_id = 14;
        $user->mission_list_id = 6;
        $user->save();


        $user = new App\User;
        $user->id = 12;
        $user->name = "林語";
        $user->email = "012@yahoo.com.tw";
        $user->password =Hash::make ('6a5s4d');
        $user->phone = '0901201212';
        $user->save();

        $user  = User::where('name', '=', '林語')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_id = 12;
        $user->mission_list_id = 7;
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->mission_new_locations_id = 26;
        $Works_on->id = 12;
        $Works_on->save();


        $user = new App\User;
        $user->id = 13;
        $user->name = "耿夜";
        $user->email = "013@yahoo.com.tw";
        $user->password =Hash::make ('we4a6sf45');
        $user->phone = '0901301313';
        $user->save();

        $user  = User::where('name', '=', '耿夜')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 1;
        $user->save();


        $user = new App\User;
        $user->id = 14;
        $user->name = "彭士萱";
        $user->email = "014@yahoo.com.tw";
        $user->password =Hash::make ('v31s5e4f');
        $user->phone = '0901401414';
        $user->save();

        $user  = User::where('name', '=', '彭士萱')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_id = 6;
        $user->mission_list_id = 2;
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->mission_new_locations_id = 4;
        $Works_on->id = 14;
        $Works_on->save();


        $user = new App\User;
        $user->id = 15;
        $user->name = "黃奇偉";
        $user->email = "015@yahoo.com.tw";
        $user->password =Hash::make ('4wg9e87f');
        $user->phone = '0901501515';
        $user->save();

        $user  = User::where('name', '=', '黃奇偉')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_id = 7;
        $user->mission_list_id = 3;
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->mission_new_locations_id = 13;
        $Works_on->id = 15;
        $Works_on->save();


        $user = new App\User;
        $user->id = 16;
        $user->name = "丁凝";
        $user->email = "016@yahoo.com.tw";
        $user->password =Hash::make ('d4q9w8f4');
        $user->phone = '0901601616';
        $user->save();

        $user  = User::where('name', '=', '丁凝')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_id = 9;
        $user->mission_list_id = 4;
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->mission_new_locations_id = 14;
        $Works_on->id = 16;
        $Works_on->save();


        $user = new App\User;
        $user->id = 17;
        $user->name = "曾家琪";
        $user->email = "017@yahoo.com.tw";
        $user->password =Hash::make ('d46qw7f');
        $user->phone = '0901701717';
        $user->save();

        $user  = User::where('name', '=', '曾家琪')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_id = 17;
        $user->mission_list_id = 5;
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->mission_new_locations_id = 19;
        $Works_on->id = 17;
        $Works_on->save();


        $user = new App\User;
        $user->id = 18;
        $user->name = "顧溪中";
        $user->email = "018@yahoo.com.tw";
        $user->password =Hash::make ('t6y15mrn');
        $user->phone = '0901801818';
        $user->save();

        $user  = User::where('name', '=', '顧溪中')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_id = 15;
        $user->mission_list_id = 6;
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->mission_new_locations_id = 23;
        $Works_on->id = 18;
        $Works_on->save();


        $user = new App\User;
        $user->id = 19;
        $user->name = "鍾渝";
        $user->email = "019@yahoo.com.tw";
        $user->password =Hash::make ('q9w87zc213');
        $user->phone = '0901901919';
        $user->save();

        $user  = User::where('name', '=', '鍾渝')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_id = 13;
        $user->mission_list_id = 7;
        $user->save();


        $user = new App\User;
        $user->id = 20;
        $user->name = "金南響";
        $user->email = "020@yahoo.com.tw";
        $user->password =Hash::make ('af987w');
        $user->phone = '0902002020';
        $user->save();

        $user  = User::where('name', '=', '金南響')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 3;
        $user->save();


        $user = new App\User;
        $user->id = 21;
        $user->name = "呂伙棲";
        $user->email = "021@yahoo.com.tw";
        $user->password =Hash::make ('z3xv5d4');
        $user->phone = '0902102121';
        $user->save();

        $user  = User::where('name', '=', '呂伙棲')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 4;
        $user->save();


        $user = new App\User;
        $user->id = 22;
        $user->name = "江晉玖";
        $user->email = "022@yahoo.com.tw";
        $user->password =Hash::make ('6qef4zv');
        $user->phone = '0902202222';
        $user->save();

        $user  = User::where('name', '=', '江晉玖')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 5;
        $user->save();


        $user = new App\User;
        $user->id = 23;
        $user->name = "高吉夙";
        $user->email = "023@yahoo.com.tw";
        $user->password =Hash::make ('s65dg4');
        $user->phone = '0902302323';
        $user->save();

        $user  = User::where('name', '=', '高吉夙')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 6;
        $user->save();


        $user = new App\User;
        $user->id = 24;
        $user->name = "柯苛科";
        $user->email = "024@yahoo.com.tw";
        $user->password =Hash::make ('6s5df4');
        $user->phone = '0902402424';
        $user->save();

        $user  = User::where('name', '=', '柯苛科')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 7;
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->mission_new_locations_id = 27;
        $Works_on->id = 24;
        $Works_on->save();


        $user = new App\User;
        $user->id = 25;
        $user->name = "白卓逸";
        $user->email = "025@yahoo.com.tw";
        $user->password =Hash::make ('s65df4s5d4v');
        $user->phone = '0902502525';
        $user->save();

        $user  = User::where('name', '=', '白卓逸')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 7;
        $user->save();


        $user = new App\User;
        $user->id = 26;
        $user->name = "郭曉建";
        $user->email = "026@yahoo.com.tw";
        $user->password =Hash::make ('s3dv21');
        $user->phone = '0902602626';
        $user->save();

        $user  = User::where('name', '=', '郭曉建')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 2;
        $user->save();

//        $Works_on = new App\Works_on;
//        $Works_on->mission_new_locations_id = 2;
//        $Works_on->id = 26;
//        $Works_on->save();

        $user = new App\User;
        $user->id = 27;
        $user->name = "詹絳";
        $user->email = "027@yahoo.com.tw";
        $user->password =Hash::make ('s35df44w');
        $user->phone = '0902702727';
        $user->save();

        $user  = User::where('name', '=', '詹絳')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 3;
        $user->save();


        $user = new App\User;
        $user->id = 28;
        $user->name = "趙漾刻";
        $user->email = "028@yahoo.com.tw";
        $user->password =Hash::make ('svd97ga');
        $user->phone = '0902802828';
        $user->save();

        $user  = User::where('name', '=', '趙漾刻')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 4;
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->mission_new_locations_id = 15;
        $Works_on->id = 28;
        $Works_on->save();


        $user = new App\User;
        $user->id = 29;
        $user->name = "朱禮姚";
        $user->email = "029@yahoo.com.tw";
        $user->password =Hash::make ('x3v54g');
        $user->phone = '0902902929';
        $user->save();

        $user  = User::where('name', '=', '朱禮姚')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 5;
        $user->save();


        $user = new App\User;
        $user->id = 30;
        $user->name = "唐臥土";
        $user->email = "030@yahoo.com.tw";
        $user->password =Hash::make ('ca6s5f4');
        $user->phone = '0903003030';
        $user->save();

        $user  = User::where('name', '=', '唐臥土')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 6;
        $user->save();


        $user = new App\User; //測試用密碼是1234
        $user->id = 31;
        $user->name = "尤燕";
        $user->email = "031@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0903103131';
        $user->save();

        $user  = User::where('name', '=', '尤燕')->first();
        $roleAdmin = Permission::where('name', '=', 'Local')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 7;
        $user->save();


        $user = new App\User;
        $user->id = 32;
        $user->name = "謝卸";
        $user->email = "032@yahoo.com.tw";
        $user->password =Hash::make ('asc65f7');
        $user->phone = '0903203232';
        $user->save();

        $user  = User::where('name', '=', '謝卸')->first();
        $roleAdmin = Permission::where('name', '=', 'Local')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 2;
        $user->save();


        $user = new App\User;
        $user->id = 33;
        $user->name = "莊簿郝";
        $user->email = "033@yahoo.com.tw";
        $user->password =Hash::make ('n98r7b');
        $user->phone = '0903303333';
        $user->save();

        $user  = User::where('name', '=', '莊簿郝')->first();
        $roleAdmin = Permission::where('name', '=', 'Local')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 3;
        $user->save();


        $user = new App\User;
        $user->id = 34;
        $user->name = "鄭織恩";
        $user->email = "034@yahoo.com.tw";
        $user->password =Hash::make ('a6s5v1c4a6f');
        $user->phone = '0903403434';
        $user->save();

        $user  = User::where('name', '=', '鄭織恩')->first();
        $roleAdmin = Permission::where('name', '=', 'Local')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 4;
        $user->save();


        $user = new App\User;
        $user->id = 35;
        $user->name = "許瑗慈";
        $user->email = "035@yahoo.com.tw";
        $user->password =Hash::make ('6d54ca1');
        $user->phone = '0903503535';
        $user->save();

        $user  = User::where('name', '=', '許瑗慈')->first();
        $roleAdmin = Permission::where('name', '=', 'Local')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 5;
        $user->save();


        $user = new App\User;
        $user->id = 36;
        $user->name = "張俞";
        $user->email = "036@yahoo.com.tw";
        $user->password =Hash::make ('ac987sf');
        $user->phone = '0903603636';
        $user->save();

        $user  = User::where('name', '=', '張俞')->first();
        $roleAdmin = Permission::where('name', '=', 'Local')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 6;
        $user->save();


        $user = new App\User;
        $user->id = 37;
        $user->name = "劉夏萊";
        $user->email = "037@yahoo.com.tw";
        $user->password =Hash::make ('a6s54c6f4a');
        $user->phone = '0903703737';
        $user->save();

        $user  = User::where('name', '=', '劉夏萊')->first();
        $roleAdmin = Permission::where('name', '=', 'Local')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 7;
        $user->save();

        $user = new App\User;
        $user->id = 38;
        $user->name = "王月";
        $user->email = "038@yahoo.com.tw";
        $user->password =Hash::make ('as6ca65s4c');
        $user->phone = '0903803838';
        $user->save();

        $user  = User::where('name', '=', '王月')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_id = 5;
        $user->mission_list_id = 2;
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->mission_new_locations_id = 3;
        $Works_on->id = 38;
        $Works_on->save();

        $user = new App\User;
        $user->id =39;
        $user->name = "鍾堅植";
        $user->email = "039@yahoo.com.tw";
        $user->password =Hash::make ('cas6c1');
        $user->phone = '0903903939';
        $user->save();

        $user  = User::where('name', '=', '鍾堅植')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_id = 13;
        $user->mission_list_id = 7;
        $user->save();

        $user = new App\User;
        $user->id = 40;
        $user->name = "顧赭鴟";
        $user->email = "040@yahoo.com.tw";
        $user->password =Hash::make ('a5sc465');
        $user->phone = '0904004040';
        $user->save();

        $user  = User::where('name', '=', '顧赭鴟')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_id = 15;
        $user->mission_list_id = 6;
        $user->save();

        $user = new App\User;
        $user->id =41;
        $user->name = "簡依舞";
        $user->email = "041@yahoo.com.tw";
        $user->password =Hash::make ('q9w87d4cf1');
        $user->phone = '0904104141';
        $user->save();

        $user  = User::where('name', '=', '簡依舞')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_id = 14;
        $user->mission_list_id = 6;
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->mission_new_locations_id = 22;
        $Works_on->id = 41;
        $Works_on->save();

        $user = new App\User;
        $user->id =42;
        $user->name = "曾晉瑋";
        $user->email = "042@yahoo.com.tw";
        $user->password =Hash::make ('a6c5s4');
        $user->phone = '0904204242';
        $user->save();

        $user  = User::where('name', '=', '曾晉瑋')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_id = 17;
        $user->mission_list_id = 5;
        $user->save();

        $user = new App\User;
        $user->id = 43;
        $user->name = "詹欣束";
        $user->email = "043@yahoo.com.tw";
        $user->password =Hash::make ('6a5c1c');
        $user->phone = '0904304343';
        $user->save();

        $user  = User::where('name', '=', '詹欣束')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 3;
        $user->save();

        $user = new App\User;
        $user->id = 44;
        $user->name = "趙則恩";
        $user->email = "044@yahoo.com.tw";
        $user->password =Hash::make ('a16s5c1');
        $user->phone = '0904404444';
        $user->save();

        $user  = User::where('name', '=', '趙則恩')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 4;
        $user->save();

        $user = new App\User;
        $user->id = 45;
        $user->name = "郭編范";
        $user->email = "045@yahoo.com.tw";
        $user->password =Hash::make ('c1as65c');
        $user->phone = '0904504545';
        $user->save();

        $user  = User::where('name', '=', '郭編范')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 2;
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->mission_new_locations_id = 3;
        $Works_on->id = 45;
        $Works_on->save();

        $user = new App\User;
        $user->id = 46;
        $user->name = "范聖佩";
        $user->email = "046@yahoo.com.tw";
        $user->password =Hash::make ('6as5c1');
        $user->phone = '0904604646';
        $user->save();

        $user  = User::where('name', '=', '范聖佩')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 7;
        $user->save();

        $user = new App\User;
        $user->id = 47;
        $user->name = "江文欣";
        $user->email = "047@yahoo.com.tw";
        $user->password =Hash::make ('as65c1');
        $user->phone = '0904704747';
        $user->save();

        $user  = User::where('name', '=', '江文欣')->first();
        $roleAdmin = Permission::where('name', '=', 'emt')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 7;
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->mission_new_locations_id = 28;
        $Works_on->id = 47;
        $Works_on->save();

        $user = new App\User; //測試用密碼是1234
        $user->id = 48;
        $user->name = "黃織圓";
        $user->email = "048@yahoo.com.tw";
        $user->password =Hash::make ('1234');
        $user->phone = '0904804848';
        $user->save();

        $user  = User::where('name', '=', '黃織圓')->first();
        $roleAdmin = Permission::where('name', '=', 'Resource')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 2;
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->mission_new_locations_id = 2;
        $Works_on->id = 48;
        $Works_on->save();

        $user = new App\User;
        $user->id =49;
        $user->name = "高杉政";
        $user->email = "049@yahoo.com.tw";
        $user->password =Hash::make ('ae6f84');
        $user->phone = '0904904949';
        $user->save();

        $user  = User::where('name', '=', '高杉政')->first();
        $roleAdmin = Permission::where('name', '=', 'Local')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 1;
        $user->save();

        $user = new App\User;
        $user->id = 50;
        $user->name = "魏瑜";
        $user->email = "050@yahoo.com.tw";
        $user->password =Hash::make ('e5gfq6f');
        $user->phone = '0905005050';
        $user->save();

        $user  = User::where('name', '=', '魏瑜')->first();
        $roleAdmin = Permission::where('name', '=', 'Local')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 1;
        $user->save();

        $user = new App\User;
        $user->id = 51;
        $user->name = "郭大建";
        $user->email = "051@yahoo.com.tw";
        $user->password =Hash::make ('s3dv21');
        $user->phone = '0905105151';
        $user->save();

        $user  = User::where('name', '=', '郭大建')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 2;
        $user->save();

        $user = new App\User;
        $user->id = 52;
        $user->name = "郭中建";
        $user->email = "052@yahoo.com.tw";
        $user->password =Hash::make ('s3dv21');
        $user->phone = '0905205252';
        $user->save();

        $user  = User::where('name', '=', '郭中建')->first();
        $roleAdmin = Permission::where('name', '=', 'Reliever')->first();
        $user->assignRole($roleAdmin);
        $user->mission_list_id = 2;
        $user->save();

        $Works_on = new App\Works_on;
        $Works_on->mission_new_locations_id = 4;
        $Works_on->id = 52;
        $Works_on->save();

    }
}