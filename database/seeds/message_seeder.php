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
        DB:: table('messages')->delete();
        DB:: table('chat_rooms')->delete();

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

        $chat_room = new App\Chat_room;
        $chat_room->chat_room_id = 3;
        $chat_room->user_id_1 = 3;
        $chat_room->user_id_2 = 4;
        $chat_room->save();

        $chat_room = new App\Chat_room;
        $chat_room->chat_room_id = 4;
        $chat_room->user_id_1 = 2;
        $chat_room->user_id_2 = 10;
        $chat_room->save();

        $chat_room = new App\Chat_room;
        $chat_room->chat_room_id = 5;
        $chat_room->user_id_1 = 2;
        $chat_room->user_id_2 = 9;
        $chat_room->save();



        $message = new App\Message;
        $message->message_id = 1;
        $message->message_content = "中央發話";
        $message->chat_room_id = 1;
        $message->user_id = 2;
        $message->read = 1;
        $message->save();

        $message = new App\Message;
        $message->message_id = 2;
        $message->message_content = "地方2回話";
        $message->chat_room_id = 1;
        $message->user_id = 3;
        $message->read = 0;
        $message->save();

        $message = new App\Message;
        $message->message_id = 3;
        $message->message_content = "地方3發話";
        $message->chat_room_id = 2;
        $message->user_id = 4;
        $message->read = 0;
        $message->save();

        $message = new App\Message;
        $message->message_id = 4;
        $message->message_content = "地方2你們有閒置人員嗎?";
        $message->chat_room_id = 3;
        $message->user_id = 4;
        $message->read = 0;
        $message->save();

        $message = new App\Message;
        $message->message_id = 5;
        $message->message_content = "我們這邊需要1個管線修復";
        $message->chat_room_id = 3;
        $message->user_id = 4;
        $message->read = 0;
        $message->save();

        $message = new App\Message;
        $message->message_id = 6;
        $message->message_content = "中央在嗎?";
        $message->chat_room_id = 4;
        $message->user_id = 10;
        $message->read = 1;
        $message->save();

        $message = new App\Message;
        $message->message_id = 7;
        $message->message_content = "在";
        $message->chat_room_id = 4;
        $message->user_id = 2;
        $message->read = 1;
        $message->save();

        $message = new App\Message;
        $message->message_id = 8;
        $message->message_content = "中央目前沒有空閒的人，要再招募多少人?";
        $message->chat_room_id = 4;
        $message->user_id = 10;
        $message->read = 0;
        $message->save();

        $message = new App\Message;
        $message->message_id = 9;
        $message->message_content = "這邊傷患皆安全的在療傷";
        $message->chat_room_id = 5;
        $message->user_id = 9;
        $message->read = 0;
        $message->save();
    }
}

