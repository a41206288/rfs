<?php
use Illuminate\Support\Facades\DB;
use Kodeine\Acl\Models\Eloquent\Permission;
use Kodeine\Acl\Traits\HasRole;
use Illuminate\Database\Seeder;
use app\Message;
use app\Chat_room;

class message_seeder extends Seeder{
    use HasRole;
    public function run(){
//        DB:: table('messages')->delete();
//        DB:: table('chat_rooms')->delete();

        $chat_room = new App\Chat_room;
        $chat_room->chat_room_id = 1;
        $chat_room->save();

        $message = new App\Message;
        $message->message_id = 1;
        $message->message_content = "中央閒置人員不足，能否支援3位脫困人員";
        $message->chat_room_id = 1;
        $message->user_id = 2;
        $message->save();

        $message = new App\Message;
        $message->message_id = 1;
        $message->message_content = "目前沒有閒置脫困人員";
        $message->chat_room_id = 1;
        $message->user_id = 3;
        $message->save();
    }
}

