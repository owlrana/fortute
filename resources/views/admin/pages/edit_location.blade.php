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
                  <h3 class="box-title">Edit Location</h3>
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
                <form class="form-horizontal" method="POST" action="{{url('admin/editLocation')}}">

                  {{csrf_field()}}
                  <div class="box-body">

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Location</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="location" value="{{$location->location}}" required>
                      </div>
                    </div>
                    <input type="hidden" name="id"  value="{{$id}}">
                    
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
              
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
    </div>
        
@stop