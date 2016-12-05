@extends('layout.index')

@section('content')

<!-- Page Content -->
    <div class="container">
        <div class="row">
            @include('layout.menu')

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>{{$ten}}</b></h4>
                    </div>

                    @foreach($loaitin as $lt)
                    <div class="row-item row">
                       <div class="col-md-12">
                            <a href="loaitin/{{$lt->id}}/{{$lt->TenKhongDau}}.html"><h3>{{$lt->Ten}}</h3></a>
                        </div>
                        <div class="break"></div>
                    </div>
                    @endforeach

                </div>
            </div> 

        </div>

    </div>
    <!-- end Page Content -->
@endsection