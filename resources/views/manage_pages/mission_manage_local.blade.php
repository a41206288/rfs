@extends('manage_master')
@section('title')
    任務管理
@endsection

@section('content_c8')
    <table class="table  table-bordered table-hover">
        <thead>
        <tr>
            <th width="20%">任務名稱</th>
            <th width="12%">脫困組人數</th>
            <th width="12%">醫療組人數</th>
            <th width="12%">進度條</th>
            <th width="35%">最新回報</th>
            <th width="8%">詳細</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>逢甲區域</td>
            <td>32</td>
            <td>28</td>
            <td></td>
        </tr>
        </tbody>
    </table>


@endsection
@section('content_c4')
    <div class="col-md-6">
        <a class="btn"href="#people" role="tab" data-toggle="tab">人員管理</a>
    </div>

    <br><br>

    <div class="tab-content">
        <div class="tab-pane fade in active" id="people">
            <div class="col-md-6">
                <select class="form-control">
                    這裡要填入所有任務名稱(option)
                    <option>任務1</option>
                    <option>任務2</option>
                </select><br>
                <table class="table  table-bordered table-hover" >
                    <thead>
                    </thead>

                    <tbody id="box1" ondrop="Drop(event)" ondragover="AllowDrop(event)">
                    <tr  id="call_0" draggable="false" ondragstart="Drag(event)">
                        <th>種類</th>
                        <th>人員</th>
                        <th>狀態</th>

                    </tr>
                    <tr id="call_1"draggable="true" ondragstart="Drag(event)">
                        <td>醫護</td>
                        <td>王大明</td>
                        <td>閒置</td>

                    </tr>
                    <tr id="call_2"draggable="true" ondragstart="Drag(event)">
                        <td>救災</td>
                        <td>陳小華</td>
                        <td>閒置</td>

                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <select class="form-control">
                    這裡要填入所有任務名稱(option)
                    <option>任務1</option>
                    <option>任務2</option>
                </select>
                <br>
                <table class="table  table-bordered table-hover" >
                    <thead>
                    </thead>
                    <tbody id="box2" ondrop="Drop(event)" ondragover="AllowDrop(event)">
                    <tr  id="call_0" draggable="false" ondragstart="Drag(event)">
                        <th>種類</th>
                        <th>人員</th>
                        <th>狀態</th>

                    </tr>
                    <tr id="call_3" draggable="true" ondragstart="Drag(event)">
                        <td>醫護</td>
                        <td>王大明</td>
                        <td>閒置</td>

                    </tr>
                    <tr id="call_4" draggable="true" ondragstart="Drag(event)">
                        <td>救災</td>
                        <td>陳小華</td>
                        <td>閒置</td>

                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div  id="history" class="tab-pane fade" >
            <div class="col-md-10">
                <table class="table  table-bordered table-hover" >
                    <thead>
                    <tr>
                        <th  width="30%">回報時間</th>
                        <th  width="70%">回報內容</th>
                    </tr>
                    </thead>
                    <tbody >
                    <tr>
                        <td>2015-3-22-18:11</td>
                        <td>回報內容</td>
                    </tr>
                    <tr>
                        <td>2015-3-22-18:11</td>
                        <td>回報內容</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection



@section('javascript')
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
