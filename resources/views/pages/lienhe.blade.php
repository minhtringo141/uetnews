@extends('layout.index')

@section('content')
<!-- Page Content -->
<div class="container">

	<!-- slider -->
	@include('layout.slide')
    <!-- end slide -->

    <div class="space20"></div>


    <div class="row main-left">
        @include('layout.menu')

        <div class="col-md-9">
            <div class="panel panel-default">            
            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
            		<h2 style="margin-top:0px; margin-bottom:0px;">Liên hệ</h2>
            	</div>

            	<div class="panel-body">
            		<!-- item -->
                    <h3><span class="glyphicon glyphicon-align-left"></span> Thông tin liên hệ</h3>
				    
                    <div class="break"></div>
				   	<h4><span class= "glyphicon glyphicon-home "></span> Địa chỉ : </h4>
                    <p>xxx</p>

                    <h4><span class="glyphicon glyphicon-envelope"></span> Email : </h4>
                    <p>xxx</p>

                    <h4><span class="glyphicon glyphicon-phone-alt"></span> Điện thoại : </h4>
                    <p>xxx</p>



                    <br><br>
                    <h3><span class="glyphicon glyphicon-globe"></span> Bản đồ</h3>
                    <div class="break"></div><br>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1861.9416128265796!2d105.78158207229797!3d21.03735793816003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3f407a684d2079cc!2zxJDhuqFpIGjhu41jIFF14buRYyBnaWEgSMOgIE7hu5lpLCBYdcOibiBUaOG7p3kgQ2FtcHVz!5e0!3m2!1svi!2s!4v1478511962122" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

				</div>
            </div>
    	</div>
    </div>
    <!-- /.row -->
</div>
<!-- end Page Content -->
@endsection