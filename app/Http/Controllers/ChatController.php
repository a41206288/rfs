<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Chat_room;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller {


	public function get_users()
	{
        $my_id=Auth::user()->id;
        $roles_can_use_chat = [2,3,4,6]; //中央, 地方, 後勤, 醫療
        $users = DB::table('users')
            ->join('role_user','users.id','=','role_user.user_id')
            ->where('users.id','<>',$my_id)  //選擇對話人員列表不顯示自己
            ->whereIn('role_user.role_id',$roles_can_use_chat)
            ->select('users.id', 'users.user_name')
            ->get();

        return $users;
	}

    public function update_chat_room(Request $request)
    {
        $my_id=Auth::user()->id;
        $user_id = $request->input('user_id');

        $find_chat_room_id = DB::table('chat_rooms')
            ->where('user_id_1', $my_id)
            ->where('user_id_2', $user_id)                     //user_id_1=$my_id AND user_id_2=$user_id
            ->orWhere(function($query) use ($my_id,$user_id){ //                              OR
                $query->where('user_id_1', $user_id)           //user_id_1=$user_id AND user_id_2=$my_id
                ->where('user_id_2', $my_id);
            })
            ->lists('chat_room_id');

        if( count($find_chat_room_id) != 0 ){
            $read_message = DB::table('messages')
                ->where('chat_room_id',$find_chat_room_id)
                ->orderBy('created_at')
                ->get();
        }
        else{
            $read_message = [[
                'message_content' => '無對話紀錄',
                'user_id' => $my_id
            ]];
        }

        return $read_message;
    }

    public function send_message(Request $request)
    {
        $input_string = $request->input('message');
        $my_id=Auth::user()->id;
        $user_id = $request->input('user_id');

        $find_chat_room_id = DB::table('chat_rooms')
            ->where('user_id_1', $my_id)
            ->where('user_id_2', $user_id)                     //user_id_1=$my_id AND user_id_2=$user_id
            ->orWhere(function($query) use ($my_id,$user_id){ //                              OR
                $query->where('user_id_1', $user_id)           //user_id_1=$user_id AND user_id_2=$my_id
                ->where('user_id_2', $my_id);
            })
            ->lists('chat_room_id');

        if( count($find_chat_room_id) != 0 ){
            $message = new Message;
            $message->message_content = $input_string;
            $message->chat_room_id = $find_chat_room_id[0];
            $message->user_id = $my_id;
            $message->save();
        }
        else{
            $chat_room = new Chat_room;
            $chat_room->user_id_1 = $my_id;
            $chat_room->user_id_2 = $user_id;
            $chat_room->save();

            $find_chat_room_id = DB::table('chat_rooms')
                ->where('user_id_1', $my_id)
                ->where('user_id_2', $user_id)
                ->lists('chat_room_id');

            $message = new Message;
            $message->message_content = $input_string;
            $message->chat_room_id = $find_chat_room_id[0];
            $message->user_id = $my_id;
            $message->save();
        }

//        return $find_chat_room_id;
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}




	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}




	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
