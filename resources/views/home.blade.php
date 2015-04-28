
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{!! $title !!}</title>
</head>
<body>
<h1>{!! $title !!}</h1>
<div>{!! link_to('post/create', '新增') !!}</div>

@if (isset($posts))
    <ol>
        @foreach ($posts as $post)
            <li>{!! link_to('post/'.$post->id, $post->title) !!}
                ({!! link_to('post/'.$post->id.'/edit', '編輯') !!})</li>

        @endforeach
            {!! Auth::user()->name!!} 已登入，{!! Html::link('logout', '登出') !!}
    </ol>

@endif
</body>
</html>


{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
    {{--<meta charset="UTF-8">--}}
    {{--<title>{{ $title }}</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--{!!Form::open(['url'=>'/', 'method'=>'post'])!!}--}}
{{--{!!Form::label('title', 'Title')!!}<br>--}}
{{--{!!Form::text('title')!!}<br>--}}
{{--{!!Form::label('content')!!}<br>--}}
{{--{!!Form::textarea('content')!!}<br>--}}
{{--{!!Form::submit('發表文章')!!}--}}
{{--{!!Form::close()!!}--}}
{{--</body>--}}
{{--</html>--}}