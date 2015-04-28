<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller {


    public function index()
    {
        //$posts = Post::all();
        $posts = DB::table('posts')->get();

        return View('home')
            ->with('title', 'My Blog')
            ->with('posts', $posts);
    }

    public function create()
    {
        return View('create')
            ->with('title', '新增文章');
    }
//    public function index()
//    {
//        return View('home')
//            ->with('title', '首頁')
//            ->with('hello', '<h2>大家好～～<h2>');
//    }
//    public function show($id)
//    {
//        return View('home')
//            ->with('title', '首頁')
//            ->with('hello', '大家好～～'.$id);
//    }

//    public function store(Request $request)
//    {
//        $input = $request->all();
//
//        $post = new Post;
//        $post->title = $input['title'];
//        $post->content = $input['content'];
//        $post->save();
//
//        return Redirect::to('post');
//    }

    public function store(Request $request)
    {
        $input = $request->all();
        $rules = ['title' => 'required|min:5'];
        $messages = ['required' => '! 欄位不能空白', 'min' => '! 必須超過5個字'];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->passes()){
            $post = new Post;
            $post->title = $input['title'];
            $post->content = $input['content'];
            $post->save();

            return Redirect::to('post');
        }

        return Redirect::to('post/create')
            ->withInput()
            ->withErrors($validator);
    }

    public function show($id)
    {
        $post = Post::find($id);

        return View('show')
            ->with('title', 'My Blog - '. $post->title)
            ->with('post', $post);
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return View('edit')
            ->with('title', '編輯文章')
            ->with('post', $post);
    }

    public function update($id, Request $request)
    {
        $input = $request->all();

        $post = Post::find($id);
        $post->title = $input['title'];
        $post->content = $input['content'];
        $post->save();

        return Redirect::to('post');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return Redirect::to('post');
    }
//    public function store(Request $request)
//    {
////        $input = Input::all();
////        return $input['title'];
//        $input = $request->all();
//        return $input['title'];
//    }

//    public function index()
//    {
//        $posts = Post::all();
//
//        return View::make('home')
//            ->with('title', 'My Blog')
//            ->with('posts', $posts);
//    }

}