@extends('layouts.app')
@section('content')
    <div>

        <div class="container mt-5 ">
            <h1>Send again or delete</h1>
            <table class="table table-bordered table-sm" >
                <thead class="table table-bordered table-sm bg-success " style="color:white;text-align: center">
                <tr>
                    <th style="width: 5%">Request No</th>
                    <th style="width: 40%">Description</th>
                    <th style="width: 10%">Goods type</th>
                    <th style="width: 10%">Jamdari No</th>
                    <th style="width: 10%">Date request</th>
                    <th style="width: 5%">#</th>
                    <th style="width: 8%">#</th>
                    <th style="width: 12%">#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($requests as $request)
                    <tr style="color:black;text-align: center">
                        <td>{{$request['id_exit']}}</td>
                        <td>{{$request['description']}}</td>
                        <td>{{$goodstypes->where('id_goods_type',$request['id_goods_type'])->first()->description}}</td>
                        <td>{{$request['jamdari_no']}}</td>
                        <td>{{$request['date_request_shamsi']}}</td>
                        <td><a  class="btn btn-primary" href={{"http://localhost:8000/editform/".$request['id_exit']}}>Edit</a></td>
                        <td><a  class="btn btn-danger" href={{"http://localhost:8000/exit-delete/".$request['id_exit']}}>Delete</a></td>
                        <td><a  class="btn btn-info" href={{"http://localhost:8000/send-again/".$request['id_exit']}}>Send again</a></td>
                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>



    </div>
@endsection
