@extends('manage_master')
@section('title')
    通報管理
@endsection
@section('content_c8')
    <div class="table-responsive">
        {!! Form::open(array('url' => 'call_manage', 'method' => 'post')) !!}
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="10%">通報編號</th>
                    <th width="40%">通報內容</th>
                    <th width="40%">通報地址
                        {!! Form::select('size', array('L' => '台中市', 'S' => '苗栗縣','請選擇'=>'請選擇'), '請選擇') !!}
                        {!! Form::select('size', array('L' => '西屯區', 'S' => '南屯區','請選擇'=>'請選擇'), '請選擇') !!}
                        {!! Form::select('size', array('L' => '文華路', 'S' => '西屯路','請選擇'=>'請選擇'), '請選擇') !!}
                    </th>
                    <th width="10%">{!! Form::submit('save', ['class' => 'btn btn-default ']) !!}<br></th>
                </tr>

            </thead>
            <tbody>
                <tr>
                    <td>1,001</td>
                    <td>Lorem</td>
                    <td>ipsum</td>
                    <td>{!! Form::select('size', array('L' => 'Large', 'S' => 'Small','請選擇'=>'請選擇'), '請選擇') !!}</td>
                </tr>
                <tr>
                    <td>1,002</td>
                    <td>amet</td>
                    <td>consectetur</td>
                    <td>{!! Form::select('size',array('L' => 'Large', 'S' => 'Small','請選擇'=>'請選擇'), '請選擇') !!}</td>
                </tr>
                <tr>
                    <td>1,003</td>
                    <td>Integer</td>
                    <td>nec</td>
                    <td>{!! Form::select('size', array('L' => 'Large', 'S' => 'Small','請選擇'=>'請選擇'), '請選擇') !!}</td>
                </tr>
                <tr>
                    <td>1,003</td>
                    <td>libero</td>
                    <td>Sed</td>
                    <td>{!! Form::select('size', array('L' => 'Large', 'S' => 'Small','請選擇'=>'請選擇'), '請選擇') !!}</td>
                </tr>
                <tr>
                    <td>1,004</td>
                    <td>dapibus</td>
                    <td>diam</td>
                    <td>{!! Form::select('size', array('L' => 'Large', 'S' => 'Small','請選擇'=>'請選擇'), '請選擇') !!}</td>
                </tr>
                <tr>
                    <td>1,005</td>
                    <td>Nulla</td>
                    <td>quis</td>
                    <td>{!! Form::select('size', array('L' => 'Large', 'S' => 'Small','請選擇'=>'請選擇'), '請選擇') !!}</td>
                </tr>

            </tbody>
        </table>
        {!! Form::close() !!}
    </div>



@endsection
