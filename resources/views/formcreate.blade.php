@extends('layouts.app_requester2')
@section('content')
<script>
    $(document).ready(function() {
        $("#form_create").on('submit',function(event) {
            $('#requests').fadeIn(1500);
            $('#enter_exit2').prop('disabled',true);
            $('#origin_destination2').prop('disabled',true);
            $('#with_return2').prop('disabled',true);
            $('#ignore_btn').prop('disabled',false);
            $('#first_btn').prop('disabled',true);
            $("#enter_exit").val($("#enter_exit2").val());
            $("#origin_destination").val($("#origin_destination2").val());
            $("#with_return").val($("#with_return2").val());
                event.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                var _token = $("input[name='_token']").val();
                $.ajax({
                    url: "/formreg",
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        toastr.info("فرم جدید با موفقیت ایجاد گردید", "", {
                            "timeOut": "3500",
                            "extendedTImeout": "0"
                        });
                    }
                });
        });  
        $("#form_remove").on('submit',function(event) {

                                // event.preventDefault();
                    // $.ajaxSetup({
                    //     headers: {
                    //         'CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    //     }
                    // });
                    // var _token = $("input[name='_token']").val();
                    // $.ajax({
                    //     url: "/form-delete",
                    //     type: 'POST',
                    //     data: new FormData(this),
                    //     dataType: 'JSON',
                    //     contentType: false,
                    //     processData: false,
                    //     success: function (response) {
                    //         Swal.fire("این فرم همراه با کلیه درخواستهای الصاق شده حذف گردید", "", "success");                        
                    //         $(".report_row").remove();
                    //         $("#enter_exit").val("");
                    //         $("#origin_destination").val("");
                    //         $("#with_return").val("");
                    //         $("#enter_exit2").val(0);
                    //         $("#origin_destination2").val("");
                    //         $("#with_return2").val(0);
                    //         $('#requests').fadeOut(1500);
                    //         $('#enter_exit2').prop('disabled',false);
                    //         $('#origin_destination2').prop('disabled',false);
                    //         $('#with_return2').prop('disabled',false);
                    //         $('#ignor_btn').prop('disabled',true);
                    //         $('#first_btn').prop('disabled',false);
                    //     }
                    // }); 

            event.preventDefault();
            $.ajaxSetup({
                headers: {
                   'CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            var _token = $("input[name='_token']").val();
            Swal.fire({
                title: "آیا مایلید این فرم همراه با کلیه درخواستهای ثبت شده توسط شما حذف شود؟",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "کلیه موارد حذف شوند",
                denyButtonText: `انصراف از حذف`
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/form-delete",
                            type: 'POST',
                            data: new FormData(this),
                            dataType: 'JSON',
                            contentType: false,
                            processData: false,
                            success: function (response) {
                                Swal.fire("این فرم همراه با کلیه درخواستهای الصاق شده حذف گردید", "", "success");                        
                                $(".report_row").remove();
                                $("#enter_exit").val("");
                                $("#origin_destination").val("");
                                $("#with_return").val("");
                                $("#enter_exit2").val(0);
                                $("#origin_destination2").val("");
                                $("#with_return2").val(0);
                                $('#requests').fadeOut(1500);
                                $('#enter_exit2').prop('disabled',false);
                                $('#origin_destination2').prop('disabled',false);
                                $('#with_return2').prop('disabled',false);
                                $('#ignor_btn').prop('disabled',true);
                                $('#first_btn').prop('disabled',false);
                            }
                        });                
                    } else if (result.isDenied) {
                        Swal.fire("فرم درخواست حذف نشد", "", "info");
                    }
                });    
            });
            
        $("#edit_form_request").on('submit',function(event) {
            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })
            var _token = $("input[name='_token']").val();
            $.ajax({
                url: "/editformm",
                method:'POST',
                data:new FormData(this),
                dataType:'JSON',
                contentType:false,
                processData:false,
                success: function (response) {
                    var id_t = 0
                    var id_exit =''
                    var id_goods_type =''
                    var id_request_part =''
                    var with_return =''
                    var id_requester =''
                    var jamdari_no =''
                    var date_request_shamsi =''
                    var date_request_miladi =''
                    var id_form =''
                    var reason4 =''
                    var date_request_shamsi2 =''
                    var origin_destination =''
                    var unit = ''
                    var t1 =''
                    var edit1 =''
                    var del2 =''
                    var t2 =''
                    var row =''
                    toastr.info("تغییرات اعمال گردید", "", {
                        "timeOut": "3500",
                        "extendedTImeout": "0"
                    });
                    $(".report_row").remove();
                    for(var i = 0; i < response.results.length; i++) {
                            id_exit = $('<td class="id_exit" style="font-size: 10px">' + response.results[i]['id_exit'] + '</td>')
                            description = $('<td style="font-size: 10px;text-align:right">' + response.results[i]['description'] + '</td>')
                            exit_no = $('<td style="font-size: 10px">' + response.results[i]['exit_no'] + '</td>')   
                            origin_destination = $('<td hidden>' + response.results[i]['origin_destination'] + '</td>')
                            unit = $('<td hidden>' + response.results[i]['unit'] + '</td>')
                            id_goods_type = $('<td hidden>' + response.results[i]['id_goods_type'] + '</td>')
                            id_request_part = $('<td hidden>' + response.results[i]['id_request_part'] + '</td>')
                            with_return = $('<td hidden>' + response.results[i]['with_return'] + '</td>')
                            id_requester = $('<td hidden>' + response.results[i]['id_requester'] + '</td>')
                            jamdari_no = $('<td hidden>' + response.results[i]['jamdari_no'] + '</td>')
                            date_request_shamsi = $('<td hidden>' + response.results[i]['date_request_shamsi'] + '</td>')
                            date_request_miladi = $('<td hidden>' + response.results[i]['date_request_miladi'] + '</td>')
                            id_form = $('<td hidden>' + response.results[i]['id_form'] + '</td>')
                            reason4 = $('<td hidden>' + response.results[i]['reason4'] + '</td>')
                            date_request_shamsi2 = $('<td hidden>' + response.results[i]['date_request_shamsi2'] + '</td>')

                            edit1 = $('<button type="button" class="btn-sm btn-outline-primary" style="font-family: Tahoma;font-size: smaller;width:100%" data-toggle="modal" data-target="#myModal2">ویرایش</button>').attr('id',  response.results[i]['id_exit']+1000).click(function () {
                                $('#origin_destination3').val($('#origin_destination2').val());
                                $('#with_return3').val($('#with_return2').val());
                                $('#id_goods_type2').val($(this).closest('tr').find('td:eq(4)').text());
                                $('#description22').val($(this).closest('tr').find('td:eq(2)').text());
                                $('#description23').val($(this).closest('tr').find('td:eq(12)').text());
                                $('#exit_no2').val($(this).closest('tr').find('td:eq(3)').text());
                                $('#jamdari_no2').val($(this).closest('tr').find('td:eq(8)').text());
                                $('#id_exit2').val($(this).closest('tr').find('td:eq(1)').text());
                                $('#id_form2').val($(this).closest('tr').find('td:eq(11)').text());                                
                            })
                            del2 = $('<button type="button" class="btn-sm btn-outline-danger delete" style="font-family: Tahoma;font-size: smaller;;width:100%">حذف</button>').attr('id',  response.results[i]['id_exit']).on('click',function () {   
                                id_t = $(this).closest('tr').find('td:eq(1)').text();
                                var token = $("meta[name='csrf-token']").attr("content");

                                $.ajax({
                                    url:"/exit-delete/" + id_t,
                                    type: 'DELETE',
                                    data: {
                                      "id": id_t,
                                      "_token": token,
                                    },
                                    success: function (response) {
                                        $("#"+response.id).closest('tr').remove();
                                        toastr.error('درخواست انتخابی حذف گردید');
                                    }
                                })
                            })

                            t1 = $('<td></td>')
                            select = $('<td><button type="button" class="btn-sm btn-outline-info" style="font-family: Tahoma;font-size: smaller;text-align: right">>></button></td>').click(function (){
                                $("tr.report_row").css("background-color", "white");
                                $("tr.report_row").css("color", "black");
                                $(this).closest('tr.report_row').css("background-color", "#66CDAA");
                                $(this).closest('tr.report_row').css("color", "white");
                            })
                            t1.append(edit1)
                            var t2 = $('<td></td>')
                            var row = $('<tr class="report_row"></tr>')
                            t2.append(del2)
                            row.append(select,id_exit,description,exit_no,id_goods_type,
                                    id_request_part,with_return,id_requester,jamdari_no,
                                    date_request_shamsi,date_request_miladi,id_form,reason4,
                                    origin_destination,unit,t1,t2)
                            $("#request_table1").append(row)               
                            $('#jamdari_no').val('');
                            $('#description').val('');
                            $('#description12').val('');
                            $('#exit_no').val('');
                            $('#id_goods_type').prop("selectedIndex", 0);
                            $('#unit').prop("selectedIndex", 0);

                    }
                    $('.modal.fade').modal('hide');
                }
            })
        });
        $("#exit_create").on('submit',function(event) {
            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            var _token = $("input[name='_token']").val();
            $.ajax({
                url: "/exit-store",
                method: 'POST',
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                processData: false,
                success: function (response) {
                    var id_t = 0
                    var id_exit =''
                    var id_goods_type =''
                    var id_request_part =''
                    var with_return =''
                    var id_requester =''
                    var jamdari_no =''
                    var date_request_shamsi =''
                    var date_request_miladi =''
                    var id_form =''
                    var reason4 =''
                    var date_request_shamsi2 =''
                    var origin_destination =''
                    var unit = ''
                    var t1 =''
                    var edit1 =''
                    var del2 =''
                    var t2 =''
                    var row =''
                    toastr.success("درخواست جدید با موفقیت به فرم اضافه گردید", "", {
                        "timeOut": "3500",
                        "extendedTImeout": "0"
                    });
                    $(".report_row").remove();
                    for(var i = 0; i < response.results.length; i++) {
                            id_exit = $('<td class="id_exit" style="font-size: 10px">' + response.results[i]['id_exit'] + '</td>')
                            description = $('<td style="font-size: 10px;text-align:right">' + response.results[i]['description'] + '</td>')
                            exit_no = $('<td style="font-size: 10px">' + response.results[i]['exit_no'] + '</td>')   
                            origin_destination = $('<td hidden>' + response.results[i]['origin_destination'] + '</td>')
                            unit = $('<td hidden>' + response.results[i]['unit'] + '</td>')
                            id_goods_type = $('<td hidden>' + response.results[i]['id_goods_type'] + '</td>')
                            id_request_part = $('<td hidden>' + response.results[i]['id_request_part'] + '</td>')
                            with_return = $('<td hidden>' + response.results[i]['with_return'] + '</td>')
                            id_requester = $('<td hidden>' + response.results[i]['id_requester'] + '</td>')
                            jamdari_no = $('<td hidden>' + response.results[i]['jamdari_no'] + '</td>')
                            date_request_shamsi = $('<td hidden>' + response.results[i]['date_request_shamsi'] + '</td>')
                            date_request_miladi = $('<td hidden>' + response.results[i]['date_request_miladi'] + '</td>')
                            id_form = $('<td hidden>' + response.results[i]['id_form'] + '</td>')
                            reason4 = $('<td hidden>' + response.results[i]['reason4'] + '</td>')
                            date_request_shamsi2 = $('<td hidden>' + response.results[i]['date_request_shamsi2'] + '</td>')

                            edit1 = $('<button type="button" class="btn-sm btn-outline-primary" style="font-family: Tahoma;font-size: smaller;width:100%" data-toggle="modal" data-target="#myModal2">ویرایش</button>').attr('id',  response.results[i]['id_exit']+1000).click(function () {
                                $('#origin_destination3').val($('#origin_destination2').val());
                                $('#with_return3').val($('#with_return2').val());
                                $('#id_goods_type2').val($(this).closest('tr').find('td:eq(4)').text());
                                $('#description22').val($(this).closest('tr').find('td:eq(2)').text());
                                $('#description23').val($(this).closest('tr').find('td:eq(12)').text());
                                $('#exit_no2').val($(this).closest('tr').find('td:eq(3)').text());
                                $('#jamdari_no2').val($(this).closest('tr').find('td:eq(8)').text());
                                $('#id_exit2').val($(this).closest('tr').find('td:eq(1)').text());
                                $('#id_form2').val($(this).closest('tr').find('td:eq(11)').text());                                
                            })
                            del2 = $('<button type="button" class="btn-sm btn-outline-danger delete" style="font-family: Tahoma;font-size: smaller;;width:100%">حذف</button>').attr('id',  response.results[i]['id_exit']).on('click',function () {   
                                id_t = $(this).closest('tr').find('td:eq(1)').text();
                                var token = $("meta[name='csrf-token']").attr("content");

                                $.ajax({
                                    url:"/exit-delete/" + id_t,
                                    type: 'DELETE',
                                    data: {
                                      "id": id_t,
                                      "_token": token,
                                    },
                                    success: function (response) {
                                        $("#"+response.id).closest('tr').remove();
                                        toastr.error('درخواست انتخابی حذف گردید');
                                    }
                                })
                            })

                            t1 = $('<td></td>')
                            select = $('<td><button type="button" class="btn-sm btn-outline-info" style="font-family: Tahoma;font-size: smaller;text-align: right">>></button></td>').click(function (){
                                $("tr.report_row").css("background-color", "white");
                                $("tr.report_row").css("color", "black");
                                $(this).closest('tr.report_row').css("background-color", "#66CDAA");
                                $(this).closest('tr.report_row').css("color", "white");
                            })
                            t1.append(edit1)
                            var t2 = $('<td></td>')
                            var row = $('<tr class="report_row"></tr>')
                            t2.append(del2)
                            row.append(select,id_exit,description,exit_no,id_goods_type,
                                    id_request_part,with_return,id_requester,jamdari_no,
                                    date_request_shamsi,date_request_miladi,id_form,reason4,
                                    origin_destination,unit,t1,t2)
                            $("#request_table1").append(row)               
                            $('#jamdari_no').val('');
                            $('#description').val('');
                            $('#description12').val('');
                            $('#exit_no').val('');
                            $('#id_goods_type').prop("selectedIndex", 0);
                            $('#unit').prop("selectedIndex", 0);

                    }
                }
            })
        })  
        $('#enter_exit2').on('change',function(){
           if($('#enter_exit2').val() == 1){
            $("#origin_destination2").val("از نیروگاه به ...");
           }else{
            $("#origin_destination2").val("از ... به نیروگاه");
           }
        })     
    })   
    
      


    
</script>

    <div class="container" style="direction: rtl">
        <!-- First form -->
        <div class="row mt-3" style="margin-right:-40px;width:100%;direction: rtl;height:120px">
            <div class="col-1 mt-5"></div>
            <div class="col-9 pt-3" style="background-color: gainsboro;border-radius: 5px;margin-top: 3px;">
                <form method="post" encType="multipart/form-data" id="form_create" action={{route('form.store')}}>
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-3">
                            <select class="form-control" name="enter_exit" id="enter_exit2" style="display: inline;font-family: Tahoma;font-size: small;width: 150px">
                                <option value=0>انتخاب نوع مجوز</option>
                                <option value=1>مجوز خروج</option>
                                <option value=2>مجوز ورود</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <div class="form-group" >
                                <input type="text" maxlength="30" class="form-control" id="origin_destination2" placeholder="مبدا یا مقصد قطعه:" name="origin_destination" style="font-family: Tahoma;font-size: small;width: 100%" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <select class="form-control" name="with_return" id="with_return2" style="width:100%;font-family: Tahoma;font-size: small;display: inline">
                                <option value=0>همراه بازگشت؟</option>
                                <option value=1>همراه بازگشت</option>
                                <option value=2>بدون بازگشت</option>
                            </select>
                        </div>
                    </div>                       
                    <div class="row">
                        <div class="col">
                            <button type="commit" style="display;font-family: Tahoma;font-size: small" class="btn btn-primary" id="first_btn">ثبت فرم وشروع ثبت قطعات و کالا</button>                            
                                           
                   
                </form>
                <form method="post" encType="multipart/form-data" id="form_remove" action={{route('form.remove')}}>
                      {{csrf_field()}}
                      <button type="commit" disabled style="display;font-family: Tahoma;font-size: small" class="btn btn-danger" id="ignore_btn">انصراف و حذف فرم جاری</button>
                   </div>
                </div>
                </form>
            </div>
            <div class="col-2 mt-5"></div>
        </div>
        <!-- Second form -->
        <div class="row mt-2" id="requests" style="margin-right:-40px;width:100%;direction: rtl;display:none">   
           <div class="col-4" style="height:315px;background-color:rgb(56, 56, 115);border-radius: 5px">
                <form method="post" encType="multipart/form-data" id="exit_create" action={{route('exit.store')}}>
                    {{csrf_field()}}
                    <input type="text" id="origin_destination" style="display: none">
                    <input type="text" id="enter_exit" style="display: none">
                    <input type="text" id="with_return2" style="display: none">
                    <div class="form-group mt-3">
                        <input type="text" maxlength="50" class="form-control isclicked1" id="description" placeholder="شرح کالا یا قطعه:" name="description" style="direction:rtl;font-family:Tahoma;font-size:small" required>
                    </div>
                    <div class="form-group">
                        <input type="text" maxlength="200" class="form-control isclicked1" id="description12" placeholder="توضیحات:" name="description12" style="direction:rtl;font-family:Tahoma;font-size:small;background-color:#b8daff">
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
                                     <option value='بشکه'>بشکه</option>
                                     <option value='مترمکعب'>مترمکعب</option>
                                     <option value='متر'>متر</option>
                                     <option value='ست'>ست</option>
                                 </select>
                            </div>
                         </div>
                    </div>
                    <div class="form-group mt-2">
                        <input type="text" maxlength="50" class="form-control isclicked1" id="jamdari_no"  placeholder="کد جمعداری:" name="jamdari_no" style="direction:rtl;font-family:Tahoma;font-size:small">
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" style="display;font-family: Tahoma;font-size: small" class="btn btn-primary" id="second_btn">ثبت اطلاعات</button>
                        <button type="submit" style="display;font-family: Tahoma;font-size: small" class="btn btn-info" id="third_btn">بستن درخواست و خروج</button>
                    </div>                    
                </form> 
           </div>
           <div class="col-8" style="height:315px;background-color:rgb(56, 56, 115);border-radius: 5px">
                <div class="row mylist" style="margin: auto;width:100%;height:305px;direction: rtl;margin-top:8px;border: 1px solid black;border-radius: 5px;background-color: beige">
                    <div class="col-12" style="direction: rtl;height: 288px;overflow-y: scroll;margin-top:12px">
                      <table id="request_table1" style="width: 102%;font-family: Tahoma;font-size: small">
                          <tr class="bg-primary" style="color: white">
                              <td style="width:5%">#</td>
                              <td style="width:10%">شماره</td>
                              <td style="width:45%;text-align:right">شرح درخواست</td>
                              <td style="width:16%">تعداد</td>
                              <td style="width:12%">#</td>
                              <td style="width:12%">#</td>
                          </tr>
                      </table>
                    </div>
                  </div>
           </div>
        </div>
        <!-- Edit form -->
        <div class="modal fade mt-3" id="myModal2" style="direction: rtl;margin-top:10px;position: relative;top: -800px;left: 10%;">
                <div class="modal-dialog modal-md" id="editlist" style="margin-top: 300px">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header bg-dark" style="height: 35px;padding-top: 5px;" >
                            <div class="row" style="width: 100%">
                                <div class="col-6"><p class="modal-title" style="color: white;font-family: Tahoma;font-size: small;display: inline">فرم اعمال تغییرات</p></div>
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
                        <!-- Edit form -->
                        <div class="container" style="margin: auto;background-color:lightgray ">
                            <form method="post" encType="multipart/form-data" id="edit_form_request" action="{{route('editformm.edit44')}}">
                                {{csrf_field()}}
                                <input type="hidden" class="form-control" id="id_form2"  name="id_form">
                                <input type="hidden" class="form-control" id="id_exit2"  name="id_exit">
                                <div class="row" style="height: 20px;margin-top: 10px">
                                    <div class="col"><p style="text-align: right;font-family: Tahoma;font-size: small">مقصد:</p></div>
                                    <div class="col"><p style="text-align: right;font-family: Tahoma;font-size: small">نوع قطعه:</p></div>
                                </div>
    
                                <div class="row" style="height: 15px">
                                    <div class="col">
                                        <div class="form-group" >
                                            <input type="text" maxlength="30" class="form-control" id="origin_destination3"  data-toggle="tooltip" data-placement="right" placeholder="مقصد قطعه:" name="origin_destination" style="direction: rtl;font-family: Tahoma;font-size: small;width: 200px" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group" style="text-align: right">
                                            <select class="form-control" name="id_goods_type" id="id_goods_type2" style="width: 150px;font-family: Tahoma;font-size: small;display: inline">
                                                @foreach($goodstypes as $goodstype)
                                                    <option value="{{$goodstype->id_goods_type}}">{{$goodstype->description}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="row" style="height: 10px;margin-top: 25px;width: 100%">
                                    <div class="col-12"><p style="text-align: right;font-family: Tahoma;font-size: small">شرح انتقال:</p></div>
                                </div>
    
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-12">
                                        <div class="form-group" style="height: 15px">
                                            <input type="text" maxlength="50" class="form-control" id="description22" data-toggle="tooltip" data-placement="right" placeholder="شرح کالا یا قطعه:" name="description2" style="direction:rtl;font-family:Tahoma;font-size:small" required title="شرح کالا و یا قطعه مورد نظر برای ورود یا خروج از نیروگاه">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" maxlength="200" class="form-control isclicked1" id="description23" data-toggle="tooltip" data-placement="right" placeholder="توضیحات:" name="description3" style="direction:rtl;font-family:Tahoma;font-size:small;background-color:#b8daff"  title="اطلاعاتی که لازم است مدیر نیروگاه و سایر گیرندگان این درخواست در جریان باشند در اینجا وارد شود">
                                        </div>
                                    </div>
                                </div>
   
                                <div class="row" style="margin-top:-10px;height: 20px">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="test" class="form-control isclicked1" id="exit_no2" data-toggle="tooltip" data-placement="right" placeholder="تعداد موارد:" name="exit_no" style="direction:rtl;font-family:Tahoma;font-size:small;width:110px;display: inline" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                                <div  class="form-group" style="text-align: right">
                                                    <select class="form-control" name="with_return2" id="with_return3" style="width: 130px;font-family: Tahoma;font-size: small;display: inline">
                                                        <option value=0>همراه برگشت؟</option>
                                                        <option value=1>همراه برگشت</option>
                                                        <option value=2>بدون برگشت</option>
                                                    </select>
                                                </div>

                                    </div>
                                </div>
    
                                <div class="row" style="height: 20px;margin-top:18px">
                                    <div class="col-12">
                                        <p style="text-align: right;font-family: Tahoma;font-size: small">شماره جمعداری یا شماره سریال:</p>
                                    </div>
                                </div>
    
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" maxlength="20" class="form-control" id="jamdari_no2" data-toggle="tooltip" data-placement="right" placeholder="شماره جمعداری یا شماره سریال:" name="jamdari_no" style="direction:rtl;font-family:Tahoma;font-size:smaller;width: 200px">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary" id="btnupdate" style="font-family: Tahoma;font-size: small;text-align: right">اعمال تغییرات</button>
                                    </div>
                                </div>
                                <div id="ajax-alert3" class="alert" style="display:none;font-family: Tahoma;font-size: small"></div>
                            </form>
                        </div>
    
                        <!-- Modal footer -->
                        <div class="modal-footer bg-info" style="height: 20px"></div>
    
                    </div>
                </div>
            </div>
        </div>


@endsection