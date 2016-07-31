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
   		    	<div class="box-header">
                 	<a href="{{url('admin/add-location')}}" class="btn bg-olive margin">Add New Location</a>
                 	<a href="{{url('admin/import-location')}}" class="btn bg-olive margin">Import Location</a>
                 </div><!-- /.box-header -->
		        <div class="col-md-12">
		          	<div class="box">
		                <div class="box-header">
		                  <h3 class="box-title">Location</h3>
		                </div><!-- /.box-header -->
		                <div class="box-body">
		                  	<table id="example1" class="table table-bordered table-striped">
		                    	<thead>
		                      		<tr>
				                        <th>ID</th>
				                        <th>Location</th>
				                        <th>Edit</th>
				                        <th>Delete</th>
		                      		</tr>
		                    	</thead>
		                    	<tbody>
		                    	{{--*/ $count = 1 /*--}}
		                    	@foreach($location as $l)
		                      	<tr>
			                        <td>{{$count++}}</td>
			                        <td>{{$l->location}}</td>
			                        <td><a href="{{url('admin/edit-location')}}/{{$l->id}}">Edit</a></td>
			                        <td><a href="{{url('admin/delete-location')}}/{{$l->id}}">Delete</a></td>
		                      	</tr>
		                      	@endforeach
		                      	
		                    </tbody>
		                    <tfoot>
			                    <tr>
			                        <th>ID</th>
			                        <th>Location</th>
			                        <th>Edit</th>
			                        <th>Delete</th>
	                      		</tr>
		                    </tfoot>
		                 </table>
		                </div><!-- /.box-body -->
		            </div>
		        </div>
		    </div>
        </section>
    </div>
        
@stop