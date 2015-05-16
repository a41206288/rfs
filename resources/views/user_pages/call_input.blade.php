@extends('user_master')
@section('title')
    通報
@endsection
@section('call_input_active')
    active
@endsection
@section('content')
    <div class="row">
        <div class="col-md-offset-2 col-md-8 middle" >
            <h3><b>通報</b></h3><hr>
            <div style="background:#efefef; padding:20px">
                <h4><b>報案人資料 </b></h4><br>

                <form class="form-horizontal" role="form" action="" method="POST" name="formJoin" id="formJoin"  onSubmit="return checkForm();">
                    <div class="form-group form-group-sm">
                        <label class="col-sm-1 control-label" for="formGroupInputSmall" >姓氏</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text"  name="lname" id="lname" placeholder="">
                            <span class="help-block"><font color="#ff0b11">*必填</font></span>
                        </div>
                        <label class="col-sm-1 control-label" for="formGroupInputSmall">名字</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="fname" id="fname" placeholder="">
                        </div>
                    </div>

                    <div class="form-group form-group-sm">
                        <label class="col-sm-1 control-label" for="formGroupInputSmall" >聯絡電話</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" name="phone" id="phone" placeholder="">
                        </div>
                        <label class="col-sm-1 control-label" for="formGroupInputSmall">E-mail</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="email" name="email" id="email" placeholder="">
                        </div>
                        <br/>
                        <div class="control-label col-sm-5">
                            <span class="help-block"><font color="#ff0b11">*</font> 至少填寫1項聯絡方式，以方便我們聯絡您</span>
                        </div>


                    </div >


                    <hr>
                    <h4><b>通報內容 </b></h4><br>
                    <div class="form-group form-group-sm">
                        <label class="col-sm-1 control-label" for="formGroupInputSmall">事件種類</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="" id="">
                                <option value="">建築物</option>
                                <option value="">道路</option>
                                <option value="">橋梁</option>
                                <option value="">管線</option>
                                <option value="">河流</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select class="form-control" name="" id="">
                                <option value="">倒塌</option>
                                <option value="">斷裂</option>
                                <option value="">淹水</option>
                                <option value="">爆炸</option>
                                <option value="">起火</option>
                            </select>
                        </div>
                        <div class="col-sm-5">
                            <input class="form-control " type="text" name="" id="" placeholder="其他">
                        </div>
                    </div >
                    <div class="form-group form-group-sm">
                        <label class="col-sm-1 control-label" for="formGroupInputSmall">事件備註</label>
                        <div class="col-sm-11">
                            <textarea class="form-control" rows="3" name="mission_comment" id="mission_comment"></textarea>
                            <span class="help-block">如需填寫備註，請以50字以內簡述</span>
                        </div>
                    </div >
                    <div class="form-group form-group-sm">
                        <label class="col-sm-1 control-label" for="formGroupInputSmall" >地點</label>
                        <div class="col-sm-5">

                        </div>
                        <div class="col-sm-5">
                            <label class="control-label" for="formGroupInputSmall">類似事件</label>
                            <span class="help-block">如已有相同事故通報，請勿再次進行通報，以免造成救災混亂</span>

                            <table width="100%" id="similar_mission">
                                <thead>
                                <tr>
                                    <th width="10%">地點</th>
                                    <th width="90%">事件</th>
                                </tr>
                                </thead>
                                <!-- <tr>
                                    <td>地點</td>
                                    <td>事件</td>
                                </tr>
                                <tr>
                                    <td>地點</td>
                                    <td>事件</td>
                                </tr> -->
                            </table>
                        </div>
                    </div>
                    <div class="form-group form-group-sm text-center">
                        <input class="btn btn-default" name="action" type="hidden" id="action" value="join">
                        <input class="btn btn-default" type="submit" name="Submit2" value="送出申請">
                        <input class="btn btn-default" type="reset" name="Submit3" value="重設資料">
                    </div >
                </form>
            </div>
        </div>
    </div>

@endsection
