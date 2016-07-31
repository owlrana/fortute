@extends('admin.include.template')

@section('content')
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            
            <!-- right column -->
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Parent</h3>
                </div><!-- /.box-header -->

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
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{url('admin/editParent')}}">

                	{{csrf_field()}}
                  <div class="box-body">

                  	<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="{{$content->name}}" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" value="{{$content->email}}" required>
                      </div>
                    </div>
                    

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Mobile</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="mobile" value="{{$content->mobile}}" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Gender</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="gender" required>
                         <option value="">Select Gender</option>
	                       <option value="{{$content->gender}}" selected>{{$content->gender}}</option>
	                       <option value="Male">Male</option>
	                       <option value="Female">Female</option>
	                    </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">DOB</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="dob" value="{{$content->dob}}" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Address</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="address" value="{{$content->address}}" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Latitude</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="latitude" value="{{$content->latitude}}" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Longitude</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="longitude" value="{{$content->longitude}}" required>
                      </div>
                    </div>

                    <input type="hidden" name="id" value="{{$id}}">

                    
                  <div class="box-footer">
                    <button type="submit" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-info pull-right">Edit Parent</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
              
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
    </div>
        
@stop