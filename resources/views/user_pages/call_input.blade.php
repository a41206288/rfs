@extends('user_master')
@section('title')
    通報
@endsection
@section('call_input_active')
    active
@endsection
@section('content')
    <div class="row">
        <div class="col-md-offset-1 col-md-10 middle" >
            <h3><b>通報</b></h3><hr>
            <div style="background:#efefef; padding:20px">
                <h4><b>報案人資料 </b></h4><br>

                <form class="form-horizontal" role="form" action="" method="POST" name="formJoin" id="formJoin"  onSubmit="return checkForm();">
                    <div class="form-group form-group-sm">
                        <label class="col-sm-1 control-label" for="formGroupInputSmall" >姓氏</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text"  name="lname" id="lname" placeholder="">
                        </div>
                        <label class="col-sm-1 control-label" for="formGroupInputSmall">名字</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" name="fname" id="fname" placeholder="">
                        </div>
                        <span class="help-block"><font color="#ff0b11">*</font> 請填寫真實聯絡方式，以方便我們聯絡您</span>
                    </div>

                    <div class="form-group form-group-sm">
                        <label class="col-sm-1 control-label" for="formGroupInputSmall">電話</label>
                        <div class="col-sm-2">
                            <input class="form-control " type="text" name="home_phone" id="home_phone" placeholder="">

                        </div>
                        <label class="col-sm-1 control-label" for="formGroupInputSmall" >手機</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="phone" id="phone" placeholder="">
                        </div>
                        <label class="col-sm-1 control-label" for="formGroupInputSmall">E-mail</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="email" name="email" id="email" placeholder="">
                        </div>
                    </div >


                    <hr>
                    <h4><b>通報內容 </b></h4><br>
                    <div class="form-group form-group-sm">
                        <label class="col-sm-1 control-label" for="formGroupInputSmall">事件種類</label>
                        <div class="col-sm-3">

                        </div>
                        <div class="col-sm-3">


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
