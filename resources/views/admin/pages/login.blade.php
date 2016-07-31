<!DOCTYPE html>
<html>
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <title>Fortute - ADMIN  | Log in</title>
	    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="{{url('admin/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{url('admin/css/AdminLTE.css')}}">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
 	</head>
  	<body class="hold-transition login-page">
	    <div class="login-box">
	      	<div class="login-logo">
	        	<a href=""><b>Fortute</b>Admin</a>
	      	</div><!-- /.login-logo -->
	      	<div class="login-box-body">
	        	<p class="login-box-msg">Sign in to start your session</p>
	        	@if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(!empty(Session::has('info')))
                    {!! Session::get('info') !!}
                @endif
	        	<form action="{{url('admin/postLogin')}}" method="post">
	        		{{csrf_field()}}
	          		<div class="form-group has-feedback">
	            		<input type="text" class="form-control" name="username" placeholder="Username">
	            		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
	          		</div>
	          		<div class="form-group has-feedback">
	            		<input type="password" class="form-control" name="password" placeholder="Password">
	            		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
	          		</div>
	          		<div class="row">
	            		<div class="col-xs-8">
	              		
	            		</div><!-- /.col -->
			            <div class="col-xs-4">
			              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
			            </div><!-- /.col -->
	          		</div>
	        	</form>
	      	</div><!-- /.login-box-body -->
	    </div><!-- /.login-box -->
  	</body>
</html>
