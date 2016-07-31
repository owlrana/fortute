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
        	<?php //echo "<pre>",print_r($grade),"</pre>"; ?>
   		    <div class="row">
		        <div class="col-md-12">
		          	<div class="box">
		                <div class="box-header">
		                  <h3 class="box-title">Parent List</h3>
		                </div><!-- /.box-header -->

		                <div class="box-header">
		                  <a href="{{url('admin/add-parent')}}" class="btn bg-olive margin">Add New Parent</a>
		                </div><!-- /.box-header -->
		                <div class="box-body">
		                  	<table id="example1" class="table table-bordered table-striped">
		                    	<thead>
		                      		<tr>
				                        <th>ID</th>
				                        <th>Name</th>
				                        <th>Email</th>
				                        <th>Mobile</th>
				                        <th>User Type</th>
				                        <th>Gender</th>
				                        <th>Address</th>
				                        <th>Student</th>
				                        <th>Edit</th>
				                        <th>Delete</th>
		                      		</tr>
		                    	</thead>
		                    	<tbody>
		                    	{{--*/ $count = 1 /*--}}
		                    	@foreach($user as $u)
		                      	<tr>
			                        <td>{{$count++}}</td>
			                        <td>{{$u->name}}</td>
			                        <td>{{$u->email}}</td>
			                        <td> {{$u->mobile}}	</td>
			                        <td>Parent</td>
			                        <td>{{$u->gender}}</td>
			                        <td>{{$u->address}}</td>
			                        <td><a href="{{url('admin/student')}}/{{$u->id}}">Check Student</a></td>
			                        <td><a href="{{url('admin/edit-parent')}}/{{$u->id}}">Edit</a></td>
			                        <td><a href="{{url('admin/delete-parent')}}/{{$u->id}}">Delete</a></td>
		                      	</tr>
		                      	@endforeach
		                      	
		                    </tbody>
		                    <tfoot>
			                    <tr>
			                        <th>ID</th>
			                        <th>Name</th>
			                        <th>Email</th>
			                        <th>Mobile</th>
			                        <th>User Type</th>
			                        <th>Gender</th>
			                        <th>Address</th>
			                        <th>Student</th>
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