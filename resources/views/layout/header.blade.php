<!-- Navigation -->

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="navbar" style="font-family: 'Noto', sans-serif; font-size: 1.1em; overflow-x: none">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="trangchu" style="color: #ffffff">UET</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
                <ul class="nav navbar-nav">
                    <li>
                        <a href="lienhe" style="color: #ffffff">Giới thiệu</a>
                    </li>
                    <li>
                        <a href="lienhe" style="color: #ffffff">Liên hệ</a>
                    </li>
                </ul>

                <form action="timkiem" method="post" class="navbar-form navbar-left" role="search">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
			        <div class="form-group">
			          <input type="text" name='tukhoa' class="form-control" placeholder="Tìm kiếm">
			        </div>
			        <button type="submit" class="btn btn-default" >Tìm</button>
			    </form>

			    <ul class="nav navbar-nav pull-right">
                    @if(!Auth::user())
                        <li>
                            <a href="dangky" style="color: #ffffff">Đăng ký</a>
                        </li>
                        <li>
                            <a href="dangnhap" style="color: #ffffff">Đăng nhập</a>
                        </li>
                    @else
                        <li>
                        	<a href="nguoidung" style="color: #ffffff">
                        		<span class ="glyphicon glyphicon-user" style="color: #ffffff"></span>
                        		{{Auth::user()->name}}
                        	</a>
                        </li>

                        <li>
                        	<a href="dangxuat" style="color: #ffffff">Đăng xuất</a>
                        </li>
                    @endif
                </ul>

            </div>



            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
