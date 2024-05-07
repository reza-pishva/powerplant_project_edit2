@extends('layouts.app_requester2')
@section('content')
<script>
    $(document).ready(function() {
        var condition="";
        var date_shamsi=$("#date_shamsi").val();
        $("#first_btn").click(function() {
            var enter_exit=$("#enter_exit").val();
            if(enter_exit==0){
                $("#comm1").text('متاسفانه شما');
                $("#note").text(' نوع مجوز را انتخاب نکرده اید.');
                $("#comm2").text('لطفا مجددا جهت');
                $("#comm3").text('تعیین نوع مجوز');
                $("#comm4").text('به فرم مربوطه مراجعه کنید');
                $('#sub').attr("disabled", true);
            }
            if(enter_exit==1){
                $("#comm1").text('فرمی برای دریافت');
                $("#note").text('مجوز خروج');
                $("#comm2").text('توسط شما درخواست شده.در صورت اطمینان از این انتخاب');
                $("#comm3").text('بر روی دکمه');
                $("#comm4").text('ایجاد فرم کلیک کنید.در غیراینصورت بر روی دکمه بازگشت کلیک کنید.');
                $('#sub').attr("disabled", false);
            }
            if(enter_exit==2){
                $("#comm1").text('فرمی برای دریافت');
                $("#note").text('مجوز ورود');
                $("#comm2").text('توسط شما درخواست شده.در صورت اطمینان از این انتخاب');
                $("#comm3").text('بر روی دکمه');
                $("#comm4").text('ایجاد فرم کلیک کنید.در غیراینصورت بر روی دکمه بازگشت کلیک کنید.');
                $('#sub').attr("disabled", false);
            }

        });

    })
</script>

    <div class="container" style="direction: rtl;margin:auto">
        <div class="row">
            <div class="col-6  mt-3">
                <form method="post" action={{route('form.store')}}>
                    {{csrf_field()}}
                    <div class="form-group">

                        <button type="button" style="display: inline;font-family: Tahoma;font-size: small" class="btn btn-primary" id="first_btn" data-toggle="modal" data-target="#myModal">ایجاد فرم</button>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="date_shamsi"  name="date_shamsi" value={{$date_shamsi}}>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="date_miladi"  name="date_miladi" value={{$mytime}}>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="timestamp"  name="timestamp" value={{$mytime->timestamp}}>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_requester" placeholder="Enter the id of requester" name="id_requester" value={{$user}}>
                    </div>

                    <!-- The Modal -->
                    <div class="modal fade" id="myModal" style="direction: rtl">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header bg-info">
                                    <div class="row" style="width: 100%">
                                        <div class="col-6"><p class="modal-title" style="color: white;font-family: Tahoma;font-size: small;display: inline">یاداوری</p></div>
                                        <div class="col-6">
                                            <div class="row" style="width: 100%">
                                                <div class="col-10">.</div>
                                                <div class="col-2">
                                                    <button type="button" class="close" data-dismiss="modal" style="text-align: center;display: inline;color: white">&times;</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body" id="comment" style="font-family: Tahoma;font-size: small;direction: rtl">
                                    <p id="comm1">آیا شما از ایجاد فرمی برای اخذ</p>
                                    <p id="note" style="font-weight: bold"></p>
                                    <p id="comm2">اطمینان دارید</p>
                                    <p id="comm3">؟</p>
                                    <p id="comm4">در صورت انتخاب اشتباه نوع مجوز ، گردش این فرم با اشکالاتی مواجه خواهد شد.</p>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" style="font-family: Tahoma;font-size: small" class="btn btn-sm btn-primary" id="sub">ایجاد فرم</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    @include('shared.errors')


                </form>
            </div>
            <div class="col-3">.</div>
            <div class="col-3">.</div>
        </div>
        <div class="row" style="margin: auto;width:100%;direction: rtl">
            <div class="col-1 mt-5">.</div>
            <div class="col-10 pt-3" style="background-color: gainsboro;border-radius: 5px;margin-top: 3px;">
                <form method="post" encType="multipart/form-data" id="upload_form_request" action={{route('exit.store')}}>
                    {{csrf_field()}}
                     <div class="row">
                        <div class="col">
                            <input type="hidden" class="form-control" id="id_form"  name="id_form">
                            <input type="hidden" class="form-control" id="enter_exit"  name="enter_exit">
                            <input type="hidden" class="form-control" id="date_request_shamsi"  name="date_request_shamsi">
                            <input type="hidden" class="form-control" id="date_request_miladi"  name="date_request_miladi">
                            <input type="hidden" class="form-control" id="time_request"  name="time_request">
                            <input type="hidden" class="form-control" id="request_timestamp"  name="request_timestamp">
                            <input type="hidden" class="form-control" id="id_requester" placeholder="Enter the id of requester" name="id_requester">
                            <input type="hidden" class="form-control" id="id_request_part" name="id_request_part" value={{$part}}>
                            <div class="form-group" >
                                <input type="text" maxlength="30" class="form-control isclicked1" id="origin_destination" data-toggle="tooltip" data-placement="right" placeholder="مبدا یا مقصد قطعه:" name="origin_destination" style="direction: rtl;font-family: Tahoma;font-size: small;width: 200px" required title="لطفا مبدا یا مقصد این قطعه را وارد کنید">
                            </div>
                        </div>
                        <div class="col">
                            <div  class="form-group" style="text-align: right">
                                <label for="with_return" style="font-family: Tahoma;font-size: small;display: inline"> همراه با بازگشت:</label>
                                <select class="form-control isclicked1" name="with_return" id="with_return" style="width: 110px;font-family: Tahoma;font-size: small;display: inline">
                                    <option value=1>بله</option>
                                    <option value=2>خیر</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <select class="form-control" name="enter_exit" id="enter_exit" style="display: inline;font-family: Tahoma;font-size: small;width: 150px">
                                <option value=0>انتخاب نوع مجوز</option>
                                <option value=1>مجوز خروج</option>
                                <option value=2>مجوز ورود</option>
                            </select>
                        </div>
                    </div>
                    @include('shared.errors')
                    <div id="ajax-alert1" class="alert" style="display:none;font-family: Tahoma;font-size: small"></div>
                    <div id="ajax-alert2" class="alert" style="display:none;font-family: Tahoma;font-size: small"></div>

                    <input type="hidden" class="form-control" id="id_exit">

                </form>
            </div>
            <div class="col-1 mt-5">.</div>
        </div>
    </div>


@endsection
