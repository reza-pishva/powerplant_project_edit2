@extends('layouts.app_requester2')
@section('content')
<script>
    $(document).ready(function() {
        $("#form_create").on('submit',function(event) {
            // $('#requests').css('display','flex');
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
                    success: function (data) {
                        var id_t = 0
                        toastr.success("درخواست جدید با موفقیت به فرم اضافه گردید", "", {
                            "timeOut": "3500",
                            "extendedTImeout": "0"
                        });
                            var id_exit = $('<td class="id_exit" style="font-size: 10px">' + data.id_exit + '</td>')
                            var description = $('<td style="font-size: 10px;text-align:right">' + data.description + '</td>')
                            var exit_no = $('<td style="font-size: 10px">' + data.exit_no + '</td>')
                            var t1 = $('<td></td>')
                            var select = $('<td><button type="button" class="btn-sm btn-outline-info" style="font-family: Tahoma;font-size: smaller;text-align: right">>></button></td>')
                            var edit1 = $('<button type="button" class="btn-sm btn-outline-primary" style="font-family: Tahoma;font-size: smaller;width:100%">ویرایش</button>').attr('id',id_t + 5000)
                            var del2 = $('<button type="button" class="btn-sm btn-outline-danger delete" style="font-family: Tahoma;font-size: smaller;;width:100%">حذف</button>').on('click',function () {   
                                id_t = $(this).closest('tr').find('td:eq(1)').text();
                                var token = $("meta[name='csrf-token']").attr("content");
                                Swal.fire({
                                    title: 'مایل به حذف این درخواست هستید؟',
                                    position: 'top',
                                    customClass:{
                                        title:'swal-title',
                                        content:'swal-text',
                                        confirmButton:'swal-confirm',
                                        denyButton:'swal-deny',
                                        cancelButton:'swal-cancel',
                                    },

                                    showDenyButton: true,
                                    cancelButtonText: `بازگشت`,
                                    confirmButtonText: `انصراف از حذف`,
                                    denyButtonText: 'حذف شود',
                                }).then((result) => {
                                     if (result.isConfirmed) {
                                        Swal.fire('رکورد انتخابی حذف نشد', '', 'info')
                                    } else if (result.isDenied) {
                                        $.ajax({
                                            url:"/exit-delete/" + id_t,
                                            type: 'DELETE',
                                            data: {
                                                "id": id_t,
                                                "_token": token,
                                            },
                                            success: function (response) {
                                                if(true){
                                                    $('.delete').closest('tr').remove();
                                                    toastr.error('درخواست انتخابی حذف گردید');
                                                }
                                            }
                                        });
                                    }        

                                })
                            })
                            t1.append(edit1)
                            var t2 = $('<td></td>')
                            var row = $('<tr></tr>')
                            t2.append(del2)
                            row.append(select,id_exit,description,exit_no,t1,t2)
                            $("#request_table1").append(row)
                            $('#jamdari_no').val('');
                            $('#description').val('');
                            $('#description12').val('');
                            $('#exit_no').val('');
                            $('#id_goods_type').prop("selectedIndex", 0);
                            $('#unit').prop("selectedIndex", 0);
                            

                            
                            $('#' + (Number(data.data) + 5000)).click(function () {
                                //alert($(this).closest('tr').find('td:eq(11)').text());
                                $('#ajax-alert3').hide();
                                $('#id_exit2').val($(this).closest('tr').find('td:eq(0)').text());
                                $('#description2').val($(this).closest('tr').find('td:eq(2)').text());
                                $('#exit_no2').val($(this).closest('tr').find('td:eq(3)').text());
                                $('#jamdari_no2').val($(this).closest('tr').find('td:eq(4)').text());
                                $('#id_goods_type2').val($(this).closest('tr').find('td:eq(10)').text());
                                $('#with_return2').val($(this).closest('tr').find('td:eq(11)').text());
                                $('#origin_destination2').val($(this).closest('tr').find('td:eq(9)').text());

                                $('tr').find('td:eq(2)').removeClass('description');
                                $('tr').find('td:eq(3)').removeClass('exit_no');
                                $('tr').find('td:eq(4)').removeClass('jamdari_no');
                                $('tr').find('td:eq(5)').removeClass('goods_type');
                                $('tr').find('td:eq(6)').removeClass('with_return');
                                $('tr').find('td:eq(9)').removeClass('origin_destination');
                                $('tr').find('td:eq(10)').removeClass('goods_type_value');
                                $('tr').find('td:eq(11)').removeClass('with_return_text');

                                $(this).closest('tr').find('td:eq(2)').addClass('description');
                                $(this).closest('tr').find('td:eq(3)').addClass('exit_no');
                                $(this).closest('tr').find('td:eq(4)').addClass('jamdari_no');
                                $(this).closest('tr').find('td:eq(5)').addClass('goods_type');
                                $(this).closest('tr').find('td:eq(6)').addClass('with_return');
                                $(this).closest('tr').find('td:eq(9)').addClass('origin_destination');
                                $(this).closest('tr').find('td:eq(10)').addClass('goods_type_value');
                                $(this).closest('tr').find('td:eq(11)').addClass('with_return_text');


                            })
                            $('#' + (Number(data.data)+4000)).click(function () {
                                var id_exit = $('#' + (Number(data.data)+4000)).closest('tr').find('td:eq(0)').text();
                                var token = $("meta[name='csrf-token']").attr("content");
                                $.ajax({
                                    url: "/exit-delete/" + id_exit,
                                    type: 'DELETE',
                                    data: {
                                        "id": id_exit,
                                        "_token": token,
                                    },
                                    success: function () {
                                        toastr.options = {
                                            "closeButton": true,
                                            "debug": false,
                                            "positionClass": "toast-top-right",
                                            "onclick": null,
                                            "showDuration": "300",
                                            "hideDuration": "1000",
                                            "timeOut": "3000",
                                            "extendedTimeOut": "1000",
                                            "showEasing": "swing",
                                            "hideEasing": "linear",
                                            "showMethod": "fadeIn",
                                            "hideMethod": "fadeOut"
                                        };
                                        toastr.error('این درخواست از این فرم حذف گردید');
                                        // $('#ajax-alert1').addClass('alert-danger').show(function () {
                                        //     $(this).html("این آیتم با موفقیت از فرم درخواست جاری حذف گردید");
                                        // });
                                        $('#ajax-alert1').hide();
                                        $('#ajax-alert2').hide();
                                        $('#ajax-alert3').hide();

                                    }
                                });
                                $('#' + (Number(data.data)+4000)).closest('tr').remove();
                        })
                    }
                });

        });
        $("#ignore_btn").on('click',function(event) {
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
        });
    })
</script>

    <div class="container" style="direction: rtl">
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
                            <button type="button" disabled style="display;font-family: Tahoma;font-size: small" class="btn btn-danger" id="ignore_btn">انصراف و حذف فرم جاری</button>
                        </div>
                    </div>
                   
                </form>
            </div>
            <div class="col-2 mt-5"></div>
        </div>
        <div class="row mt-2" id="requests" style="margin-right:-40px;width:100%;direction: rtl;display:none">   
           <div class="col-4" style="height:315px;background-color:rgb(56, 56, 115);border-radius: 5px">
                <form method="post" encType="multipart/form-data" id="exit_create" action={{route('exit.store')}}>
                    {{csrf_field()}}
                    <input type="text" id="origin_destination" style="display: none">
                    <input type="text" id="enter_exit" style="display: none">
                    <input type="text" id="with_return" style="display: none">
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
    </div>


@endsection
