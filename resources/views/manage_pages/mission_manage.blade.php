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
