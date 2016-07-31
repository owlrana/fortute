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
		                <div class="box-body">
			                <div class="table-responsive">
			                	<table id="example1" class="table table-bordered table-striped">
			                    	<thead>
			                      		<tr>
					                        <th>ID</th>
					                        <th>Name</th>
					                        <th>DOB</th>
					                        <th>Grade</th>
					                        <th>Subject</th>
					                        <th>Day</th>
					                        <th>Time</th>
					                        <th>Location</th>
					                        <th>Edit</th>
					                        <th>Status</th>
			                      		</tr>
			                    	</thead>
			                    	<tbody>
			                    	{{--*/ $count = 1 /*--}}

			                    	@foreach($student as $s)
			                      	<tr>
				                        <td>{{$count++}}</td>
				                        <td>{{$s->name}}</td>
				                        <td>{{$s->dob}}</td>
				                        <td>{{$s->grade}}</td>
				                        <td>{{$s->subjects}}</td>
				                        <td>{{$s->days}}</td>
				                        <td>{{$s->times}}</td>
				                        <td>{{$s->location}}</td>
				                        <td><a href="#">Edit</a></td>
				                        <td><span class="badge">Active</span></td>
			                      	</tr>
			                      	@endforeach
			                      	
			                    </tbody>
			                    <tfoot>
				                    <tr>
				                        <th>ID</th>
				                        <th>Name</th>
				                        <th>DOB</th>
				                        <th>Grade</th>
				                        <th>Subject</th>
				                        <th>Day</th>
				                        <th>Time</th>
				                        <th>Location</th>
				                        <th>Edit</th>
				                        <th>Status</th>
		                      		</tr>
			                    </tfoot>
			                 </table>
			                </div>
		                  	
		                </div><!-- /.box-body -->
		            </div>
		        </div>
		    </div>
        </section>
    </div>
        
@stop