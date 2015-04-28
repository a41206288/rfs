<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
</head>
<body>
<h1>{{ $title }}</h1>
{!!Form::open(['url'=>'post/'.$post->id, 'method'=>'put'])!!}
{!!Form::label('title', '標題')!!}<br>
{!!Form::text('title', $post->title)!!}<br>
{!!Form::label('content', '內容')!!}<br>
{!!Form::textarea('content', $post->content)!!}<br>
{!!Form::submit('儲存')!!}
{!!Form::close()!!}

<br>
{!! Form::open(['url'=>'post/'.$post->id, 'method'=>'delete']) !!}
<button type="submit">刪除</button>
{!! Form::close() !!}
</body>
</html>