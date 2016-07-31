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
		        <div class="col-md-12">
		          	<div class="box">
		                <div class="box-header">
		                  <h3 class="box-title">Tutor List</h3>
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
				                        <!-- <th>Edit</th>
				                        <th>Status</th> -->
		                      		</tr>
		                    	</thead>
		                    	<tbody>
		                    	{{--*/ $count = 1 /*--}}
		                    	@foreach($tutor as $t)
		                      	<tr>
			                        <td>{{$count++}}</td>
			                        <td>{{$t->name}}</td>
			                        <td>{{$t->email}}</td>
			                        <td>{{$t->mobile}}</td>
			                        <td>Tutor</td>
			                        <td>{{$t->address}}</td>
			                        <td>{{$t->gender}}</td>
			                        <!-- <td><a href="#">Edit</a></td>
			                        <td><span class="badge">Active</span></td> -->
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
			                        <!-- <th>Edit</th>
			                        <th>Status</th> -->
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