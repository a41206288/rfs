@extends('manage_master')
@section('title')
    現場分析管理
@endsection
@section('content')
    <h3>任務管理</h3>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>地點</th><th>嚴重程度</th><th>預估傷亡人數</th><th>現場狀況</th><th>評估時間</th><th>指派人員</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>資電館</td><td>輕度</td><td>20</td><td>暫時將此區域水管管線供水, 街道積水尚未清理</td><td>2015-06-05 08:29:14</td>
            <td>
                <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#createTeam">
                    分派人員
                </button>
                <!-- Modal -->
                <div class="modal fade" id="createTeam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog"  style="width:  800px">
                        <div class="modal-content">
                            {!! Form::open(array('url' => 'call/manage/createMission', 'method' => 'post','class' => 'form-horizontal')) !!}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel"><b>創建新任務</b></h4>
                            </div>
                            <div class="modal-body ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <dl class="dl-horizontal">
                                            <dt>任務名稱</dt>
                                            <dd>{!! Form::text('mission_list_name','',['id' =>  'mission_list_name','class' => 'form-control', 'required']) !!}</dd> <br>
                                            <dt>負責人</dt>
                                            <dd> {!! Form::text('leader', '', ['id' =>  'leader', 'placeholder' =>  'Enter name','class' => 'form-control', 'required']) !!}<br>
                                            <dt>脫困組人數</dt>
                                            <dd> {!! Form::text('Reliever_num', '', ['id' =>  'Reliever_num', 'class' => 'form-control', 'required']) !!}</dd> <br>
                                            <dt>醫療組人數</dt>
                                            <dd>{!! Form::text('Emt_num', '', ['id' =>  'Emt_num','class' => 'form-control', 'required']) !!}</dd>
                                        </dl>
                                    </div>
                                    <div class="col-md-6">
                                        <dl class="dl-horizontal ">
                                            <dt>任務名稱</dt>
                                            <dd>{!! Form::text('mission_list_name','',['id' =>  'mission_list_name','class' => 'form-control', 'required']) !!}</dd> <br>
                                            <dt>負責人</dt>
                                            <dd> {!! Form::text('leader', '', ['id' =>  'leader', 'placeholder' =>  'Enter name','class' => 'form-control', 'required']) !!}<br>
                                            <dt>脫困組人數</dt>
                                            <dd> {!! Form::text('Reliever_num', '', ['id' =>  'Reliever_num', 'class' => 'form-control', 'required']) !!}</dd> <br>
                                            <dt>醫療組人數</dt>
                                            <dd>{!! Form::text('Emt_num', '', ['id' =>  'Emt_num','class' => 'form-control', 'required']) !!}</dd>
                                        </dl>
                                    </div>
                                </div>




                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
                                {!! Form::submit('創建任務', ['class' => 'btn btn-default btn-sm btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </td>
        </tr>
        </tbody>
    </table>
@endsection


@section('javascript')
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function AllowDrop(event){
            event.preventDefault();
        }
        function Drag(event){
            event.dataTransfer.setData("text",event.currentTarget.id);
        }
        function Drop(event){
            event.preventDefault();
            var data=event.dataTransfer.getData("text");
            event.currentTarget.appendChild(document.getElementById(data));
        }
        var element_count = 0;

    </script>
@endsection
