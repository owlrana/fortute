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
                 	<a href="{{url('admin/add-grade')}}" class="btn bg-olive margin">Add New Grade</a>
                 	<a href="{{url('admin/import-grade')}}" class="btn bg-olive margin">Import Grade</a>
                 </div><!-- /.box-header -->
		        <div class="col-md-12">
		          	<div class="box">
		                <div class="box-header">
		                  <h3 class="box-title">Grade List</h3>
		                </div><!-- /.box-header -->
		                <div class="box-body">
		                  	<table id="example1" class="table table-bordered table-striped">
		                    	<thead>
		                      		<tr>
				                        <th>ID</th>
				                        <th>Grade</th>
				                        <th>Edit</th>
				                        <th>Delete</th>
		                      		</tr>
		                    	</thead>
		                    	<tbody>
		                    	{{--*/ $count = 1 /*--}}
		                    	@foreach($grade as $g)
		                      	<tr>
			                        <td>{{$count++}}</td>
			                        <td>{{$g->grade}}</td>
			                        <td><a href="{{url('admin/edit-grade')}}/{{$g->id}}">Edit</a></td>
			                        <td><a href="{{url('admin/delete-grade')}}/{{$g->id}}">Delete</a></td>
		                      	</tr>
		                      @endforeach
		                      	
		                    </tbody>
		                    <tfoot>
			                    <tr>
			                        <th>ID</th>
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