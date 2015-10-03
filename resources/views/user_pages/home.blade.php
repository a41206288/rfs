@extends('user_master')
@section('title')
    首頁
@endsection
@section('home_active')
    active
@endsection
{{--@section('css')--}}
   {{--td {--}}
    {{--width:250px;--}}
    {{--white-space:nowrap;--}}
    {{--text-overflow:ellipsis;--}}
    {{---o-text-overflow:ellipsis;--}}
    {{--overflow: hidden;--}}
    {{--}--}}
{{--@endsection--}}
@section('content_12')
    <br><br>
    <div class="text-right navbar-form">
        <form action="search/" role="search">
            <div class="form-group">
                <input class="form-control" placeholder="搜尋任務/通報編號" type="text" name="q" value="">
            </div>

            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </form>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">任務列表</div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th width="10%">任務時間</th>
                    <th width="15%">任務地點</th>
                    {{--<th width="14%">負責人</th>--}}
                    <th width="35%" colspan="6">任務進度</th>
                    <th colspan="2">通報</th>
                </tr>
                <tr>
                    <th>
                        {!! Form::select('name', array('日期' => '日期'), '日期', []) !!}
                        {{--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
                        {{--{!! Form::select('name', array('時間' => '時間'), '時間', []) !!}--}}

                    </th>
                    <th>
                        {{--{!! Form::select('name', array('地點種類' => '地點種類'), '地點種類', []) !!}--}}
                        {!! Form::select('name', array('請選擇' => '請選擇'), '請選擇', []) !!}
                        {!! Form::select('name', array('請選擇' => '請選擇'), '請選擇', []) !!}
                    </th>

                    <th colspan="2">調派人員結束時間</th>
                    <th colspan="2">到達任務現場時間</th>
                    <th colspan="2">任務執行完成時間</th>
                    <th>內容</th>
                    {{--<th>通報人</th>--}}
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>15/09/29&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;07:32</td>
                    <td>五福國民中學正門前</td>
                    <td colspan="6">
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
                                <p class="text-right">2015/09/30 07:30 &nbsp;&nbsp;</p>
                            </div>
                        </div>
                    </td>
                    <td width="100%" class="btn-group">
                        <a type="button" class=" btn-s list-group-item dropdown-toggle" data-toggle="dropdown">
                            15/09/29&nbsp;&nbsp;&nbsp07:32&nbsp;&nbsp;路樹倒塌壓過路面<span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#"> 15/09/29&nbsp;&nbsp;&nbsp07:32&nbsp;&nbsp;路樹倒塌壓過路面</a></li>
                            <li><a href="#"> 15/09/29&nbsp;&nbsp;&nbsp07:32&nbsp;&nbsp;路樹倒塌壓過路面</a></li>
                            <li><a href="#"> 15/09/29&nbsp;&nbsp;&nbsp07:32&nbsp;&nbsp;路樹倒塌壓過路面</a></li>
                        </ul>
                    </td>


                </tr>
                <tr>
                    <td>15/09/29&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;07:32</td>
                    <td>三多民權交叉路口</td>
                    <td colspan="6">
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 66%">
                                <p class="text-right">2015/09/30 07:30 &nbsp;&nbsp;</p>
                            </div>
                        </div>
                    </td>
                    <td width="100%" class="btn-group">

                        <a type="button" class=" btn-s list-group-item dropdown-toggle" data-toggle="dropdown">
                            15/09/29&nbsp;&nbsp;&nbsp07:32&nbsp;&nbsp;路樹倒塌壓過路面<span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#"> 15/09/29&nbsp;&nbsp;&nbsp07:32&nbsp;&nbsp;路樹倒塌壓過路面</a></li>
                            <li><a href="#"> 15/09/29&nbsp;&nbsp;&nbsp07:32&nbsp;&nbsp;路樹倒塌壓過路面</a></li>
                            <li><a href="#"> 15/09/29&nbsp;&nbsp;&nbsp07:32&nbsp;&nbsp;路樹倒塌壓過路面</a></li>
                        </ul>

                    </td>
                </tr>
                <tr>
                    <td>15/09/29&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;07:32</td>
                    <td  >四維林森交叉路口</td>
                    <td  colspan="6">
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                <p class="text-right">2015/09/30 07:30 &nbsp;&nbsp;</p>
                            </div>
                        </div>
                    </td>
                    {{--<td>15/09/29&nbsp;&nbsp;&nbsp;&nbsp07:32</td>--}}
                    <td width="100%" class="btn-group">

                        <a type="button" class=" btn-s list-group-item dropdown-toggle" data-toggle="dropdown">
                            15/09/29&nbsp;&nbsp;&nbsp07:32&nbsp;&nbsp;路樹倒塌壓過路面<span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#"> 15/09/29&nbsp;&nbsp;&nbsp07:32&nbsp;&nbsp;路樹倒塌壓過路面</a></li>
                            <li><a href="#"> 15/09/29&nbsp;&nbsp;&nbsp07:32&nbsp;&nbsp;路樹倒塌壓過路面</a></li>
                            <li><a href="#"> 15/09/29&nbsp;&nbsp;&nbsp07:32&nbsp;&nbsp;路樹倒塌壓過路面</a></li>
                        </ul>

                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


@endsection
