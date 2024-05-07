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

    <div class="container" style="direction: rtl">
        <div class="row mt-3" style="margin-right:40px;width:100%;direction: rtl">
            <div class="col-1 mt-5">.</div>
            <div class="col-9 pt-3" style="background-color: gainsboro;border-radius: 5px;margin-top: 3px;">
                <form method="post" encType="multipart/form-data" id="upload_form_request" action={{route('exit.store')}}>
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-3">
                            <select class="form-control" name="enter_exit" id="enter_exit" style="display: inline;font-family: Tahoma;font-size: small;width: 150px">
                                <option value=0>انتخاب نوع مجوز</option>
                                <option value=1>مجوز خروج</option>
                                <option value=2>مجوز ورود</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <input type="hidden" class="form-control" id="id_form"  name="id_form">
                            <input type="hidden" class="form-control" id="enter_exit"  name="enter_exit">
                            <input type="hidden" class="form-control" id="date_request_shamsi"  name="date_request_shamsi">
                            <input type="hidden" class="form-control" id="date_request_miladi"  name="date_request_miladi">
                            <input type="hidden" class="form-control" id="time_request"  name="time_request">
                            <input type="hidden" class="form-control" id="request_timestamp"  name="request_timestamp">
                            <input type="hidden" class="form-control" id="id_requester" placeholder="Enter the id of requester" name="id_requester">
                            <input type="hidden" class="form-control" id="id_request_part" name="id_request_part" value={{$part}}>
                            <div class="form-group" >
                                <input type="text" maxlength="30" class="form-control" id="origin_destination" placeholder="مبدا یا مقصد قطعه:" name="origin_destination" style="font-family: Tahoma;font-size: small;width: 100%" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <select class="form-control" name="with_return" id="with_return" style="width:100%;font-family: Tahoma;font-size: small;display: inline">
                                <option value=0>همراه بازگشت:</option>
                                <option value=1>بله</option>
                                <option value=2>خیر</option>
                            </select>
                        </div>
                    </div>



                     {{-- <div class="row">
                        <div class="col">
                            <select class="form-control" name="enter_exit" id="enter_exit" style="display: inline;font-family: Tahoma;font-size: small;width: 150px">
                                <option value=0>انتخاب نوع مجوز</option>
                                <option value=1>مجوز خروج</option>
                                <option value=2>مجوز ورود</option>
                            </select>
                        </div>
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

                    </div> --}}
                    @include('shared.errors')
                    <div id="ajax-alert1" class="alert" style="display:none;font-family: Tahoma;font-size: small"></div>
                    <div id="ajax-alert2" class="alert" style="display:none;font-family: Tahoma;font-size: small"></div>

                    <input type="hidden" class="form-control" id="id_exit">

                </form>
            </div>
            <div class="col-2 mt-5">.</div>
        </div>
        <div class="row mt-2" style="margin-right:40px;width:100%;direction: rtl">
            <form method="post" action={{route('form.store')}}>
                {{csrf_field()}}
                <div class="col">
                    <div class="form-group">
                        <button type="button" style="display;font-family: Tahoma;font-size: small" class="btn btn-primary" id="first_btn">مرحله ورود اطلاعات قطعات</button>
                        <input type="hidden" class="form-control" id="date_shamsi"  name="date_shamsi" value={{$date_shamsi}}>
                        <input type="hidden" class="form-control" id="date_miladi"  name="date_miladi" value={{$mytime}}>
                        <input type="hidden" class="form-control" id="timestamp"  name="timestamp" value={{$mytime->timestamp}}>    
                        <input type="hidden" class="form-control" id="id_requester" name="id_requester" value={{$user}}>
                    </div>
                </div>
            </form>
        </div>
        <div class="row mt-2" style="margin-right:40px;width:100%;direction: rtl">
           <div class="col-4 bg-info" style="height:300px">
                <div class="form-group mt-3">
                    <input type="text" maxlength="50" class="form-control isclicked1" id="description" data-toggle="tooltip" data-placement="right" placeholder="شرح کالا یا قطعه:" name="description" style="direction:rtl;font-family:Tahoma;font-size:small" required>
                </div>
                <div class="form-group">
                    <input type="text" maxlength="200" class="form-control isclicked1" id="description12" data-toggle="tooltip" data-placement="right" placeholder="توضیحات:" name="description12" style="direction:rtl;font-family:Tahoma;font-size:small;background-color:#b8daff">
                </div>
                <div class="form-group" style="text-align: right">
                    <select class="form-control isclicked1" name="id_goods_type" id="id_goods_type" style="width: 150px;font-family: Tahoma;font-size: small;display: inline">
                        <option value=0>نوع قطعه</option>
                        @foreach($goodstypes as $goodstype)
                            <option value="{{$goodstype->id_goods_type}}">{{$goodstype->description}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                             <input type="number" max="10000" min="1" class="form-control isclicked1" id="exit_no" data-toggle="tooltip" data-placement="right" placeholder="تعداد موارد:" name="exit_no" style="direction:rtl;font-family:Tahoma;font-size:small;width:100%" required>
                        </div>
                        <div class="col-6">
                             <select class="form-control" name="unit" id="unit" style="width:100px;font-family: Tahoma;font-size: small;">
                                 <option value='عدد'>عدد</option>
                                 <option value='دستگاه'>دستگاه</option>
                                 <option value='کیلو'>کیلو</option>
                                 <option value='تن'>تن</option>
                                 <option value='لیتر'>لیتر</option>
                                 <option value='مترمکعب'>مترمکعب</option>
                                 <option value='متر'>متر</option>
                                 <option value='ست'>ست</option>
                             </select>
                        </div>
                     </div>
                </div>
                <div class="form-group mt-5">
                    <button type="button" style="display;font-family: Tahoma;font-size: small" class="btn btn-primary" id="first_btn">ثبت اطلاعات</button>
                </div>
            </div>
           <div class="col-8 bg-danger" style="height:300px">
                <div class="row mylist" style="margin: auto;width:100%;height:290px;direction: rtl;margin-top: 4px;border: 1px solid black;border-radius: 5px;background-color: beige">
                    <div class="col-12" style="direction: rtl;height: 288px;overflow-y: scroll">
                      <table id="request_table1" style="width: 100%;font-family: Tahoma;font-size: small">
                          <tr class="bg-primary" style="color: white">
                              <td style="width:5%">#</td>
                              <td style="width:10%">شماره</td>
                              <td style="width:50%">شرح درخواست</td>
                              <td style="width:11%">تعداد</td>
                              <td style="width:12%">#</td>
                              <td style="width:12%">#</td>
                          </tr>
                      </table>
                    </div>
                  </div>
           </div>
        </div>
    </div>


@endsection
