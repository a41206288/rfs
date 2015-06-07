@extends('manage_master')
@section('title')
    現場分析
@endsection
@section('content')
    {{--<h3><b>現場分析</b></h3>--}}
    <div class="col-xs-7 col-sm-6 col-md-5">

        <h5><b>通報地點</b></h5>
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr><th>分析狀態</th><th>編號</th><th>內容</th><th>地址</th></tr>
            </thead>
            <tbody>
                <tr>
                    <td>分析完成</td><td>12</td><td>從地面裂縫中滲出水</td><td>台中市西屯區文華路100號</td>
                </tr>
                <tr>
                    <td>分析完成</td><td>12</td><td>從地面裂縫中滲出水</td><td>台中市西屯區文華路100號</td>
                </tr>
                <tr>
                    <td>分析完成</td><td>12</td><td>從地面裂縫中滲出水</td><td>台中市西屯區文華路100號</td>
                </tr>
                <tr>
                    <td>分析完成</td><td>12</td><td>從地面裂縫中滲出水</td><td>台中市西屯區文華路100號</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-xs-9 col-sm-6 col-md-7" >
        <h5><b>創建的地點</b></h5>
        <p class="text-right"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createLocalBlock">創建地點</button></p>
        <!-- Modal -->
        <div class="modal fade" id="createLocalBlock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    {{--{!! Form::open(array('url' => 'call/manage/createMission', 'method' => 'post','class' => 'form-horizontal')) !!}--}}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel" ><b>創建新地點</b></h4>
                    </div>
                    <div class="modal-body">
                        <dl class="dl-horizontal">
                            <dt>地點名稱</dt>
                            <dd> {!! Form::text('localtion_name','',['id' =>  'localtion_name','class' => 'form-control', 'required']) !!}</dd> <br>
                            <dt>嚴重程度</dt>
                            <dd> {!! Form::text('severe_level', '', ['id' =>  'severe_level','class' => 'form-control', 'required']) !!}<br>
                            <dt>預估傷亡人數</dt>
                            <dd> {!! Form::text('victim_num', '', ['id' =>  'victim_num', 'class' => 'form-control', 'required']) !!}</dd> <br>
                            <dt>現場狀況</dt>
                            <dd> {!! Form::textarea('condition','',['class' => 'form-control','style'=>'resize:none', 'required']) !!}</dd>
                        </dl>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
                        {!! Form::submit('創建地點', ['class' => 'btn btn-default btn-sm btn-primary']) !!}
                    </div>
                    {{--{!! Form::close() !!}--}}
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <table class="table table-bordered">
            <thead>
                <tr><th>地點</th><th>嚴重程度</th><th>預估傷亡人數</th><th>現場狀況</th><th>評估時間</th><th>修改</th></tr>
            </thead>
            <tbody>
                <tr><td>資電館</td><td>輕度</td><td>23</td><td>勢無法控制, 需要更多脫困及醫療人員支援</td><td>2014/08/23 10:05:07</td><td><button class="btn btn-link btn-sm">修改</button></td></tr>
            </tbody>
        </table>

    </div>

@endsection
@section('javascript')
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

@endsection
