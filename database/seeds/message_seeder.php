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
        $chat_room->user_id_1 = 2;
        $chat_room->user_id_2 = 3;
        $chat_room->save();

        $chat_room = new App\Chat_room;
        $chat_room->chat_room_id = 2;
        $chat_room->user_id_1 = 2;
        $chat_room->user_id_2 = 4;
        $chat_room->save();

        $message = new App\Message;
        $message->message_id = 1;
        $message->message_content = "中央發話";
        $message->chat_room_id = 1;
        $message->user_id = 2;
        $message->save();

        $message = new App\Message;
        $message->message_id = 2;
        $message->message_content = "地方2回話";
        $message->chat_room_id = 1;
        $message->user_id = 3;
        $message->save();

        $message = new App\Message;
        $message->message_id = 3;
        $message->message_content = "地方3發話";
        $message->chat_room_id = 2;
        $message->user_id = 4;
        $message->save();
    }
}

