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
                 	<a href="{{url('admin/add-subject')}}" class="btn bg-olive margin">Add New Subject</a>
                 	<a href="{{url('admin/import-subject')}}" class="btn bg-olive margin">Import Subject</a>
                 </div><!-- /.box-header -->
		        <div class="col-md-12">
		          	<div class="box">
		                <div class="box-header">
		                  <h3 class="box-title">Subject List</h3>
		                </div><!-- /.box-header -->
		                <div class="box-body">
		                  	<table id="example1" class="table table-bordered table-striped">
		                    	<thead>
		                      		<tr>
				                        <th>ID</th>
				                        <th>Subject</th>
				                        <th>Grade</th>
				                        <th>Edit</th>
				                        <th>Delete</th>
		                      		</tr>
		                    	</thead>
		                    	<tbody>
		                    	{{--*/ $count = 1 /*--}}
		                    	@foreach($subject as $s)
		                      	<tr>
			                        <td>{{$count++}}</td>
			                        <td>{{$s->subjects}}</td>
			                        <td>Class I</td>
			                        <td><a href="{{url('admin/edit-subject')}}/{{$s->id}}">Edit</a></td>
			                        <td><a href="{{url('admin/delete-subject')}}/{{$s->id}}">Delete</a></td>
		                      	</tr>
		                      	@endforeach
		                      	
		                    </tbody>
		                    <tfoot>
			                    <tr>
			                        <th>ID</th>
			                        <th>Subject</th>
			                        <th>Grade</th>
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