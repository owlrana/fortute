@extends('admin.include.template')

@section('content')
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Slider Section</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{url('admin/postTabSlider')}}" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                    {{csrf_field()}}
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" name="slider_title" value="{{$content[0]->slider_title}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Content</label>
                      <input type="text" class="form-control" name="slider_content" value="{{$content[0]->slider_content}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Background Image</label>
                      <input type="file" name="slider_image">
                      
                    </div>

                    @if(!empty($content[0]->slider_image))
                    <div class="form-group">
                      <img src="{{url('uploads/home')}}/{{$content[0]->slider_image}}" width="100" height="100">
                    </div>
                    @endif
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->

              <!-- Form Element sizes -->
         
              <!-- Input addon -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Pricing Section</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{url('admin/postTabPrice')}}">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">First Price</label>
                      <input type="text" class="form-control" name="first_price" value="{{$content[0]->first_price}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">First Grade</label>
                      <input type="text" class="form-control" name="first_grade" value="{{$content[0]->first_grade}}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">First URL</label>
                      <input type="text" class="form-control" name="first_price_link" value="{{$content[0]->first_price_link}}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Second Price</label>
                      <input type="text" class="form-control" name="second_price" value="{{$content[0]->second_price}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Second Grade</label>
                      <input type="text" class="form-control" name="second_grade" value="{{$content[0]->second_grade}}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Second URL</label>
                      <input type="text" class="form-control" name="second_price_link" value="{{$content[0]->second_price_link}}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Third Price</label>
                      <input type="text" class="form-control" name="third_price" value="{{$content[0]->third_price}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Third Grade</label>
                      <input type="text" class="form-control" name="third_grade" value="{{$content[0]->third_grade}}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Third URL</label>
                      <input type="text" class="form-control" name="third_price_link" value="{{$content[0]->third_price_link}}">
                    </div>

                    {{csrf_field()}}
                    
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->

            </div><!--/.col (left) -->
            <!-- right column -->

            <div class="col-md-6">
              <!-- Horizontal Form -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">About Us Section</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form" method="post" action="{{url('admin/postTabContent')}}">
                    <!-- text input -->
                    {{csrf_field()}}
                    <div class="form-group">
                      <label>Tab One Heading</label>
                      <input type="text" class="form-control" name="about_tabone_heading" value="{{$content[0]->about_tabone_heading}}">
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                      <label>Tab One</label>
                      <textarea class="form-control" rows="3" name="about_tabone">{{$content[0]->about_tabone}}</textarea>
                    </div>

                    <hr>

                    <div class="form-group">
                      <label>Tab Two Heading</label>
                      <input type="text" class="form-control" name="about_tabtwo_heading" value="{{$content[0]->about_tabtwo_heading}}">
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                      <label>Tab Two</label>
                      <textarea class="form-control" rows="3" name="about_tabtwo">{{$content[0]->about_tabtwo}}</textarea>
                    </div>

                    <hr>

                    <div class="form-group">
                      <label>Tab Three Heading</label>
                      <input type="text" class="form-control" name="about_tabthree_heading" value="{{$content[0]->about_tabthree_heading}}">
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                      <label>Tab Three</label>
                      <textarea class="form-control" rows="3" name="about_tabthree">{{$content[0]->about_tabthree}}</textarea>
                    </div>
                    
                    <div class="box-footer">
	                   <button type="submit" class="btn btn-info pull-right">Submit</button>
	                 </div><!-- /.box-footer -->

                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Download Section</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form" method="post" action="{{url('admin/postTabDownloadImage')}}" enctype="multipart/form-data">
                    <!-- text input -->
                    {{csrf_field()}}
                    <div class="form-group">
                      <label>Image</label>
                      <input type="file" class="form-control" name="downloadimage">
                    </div>

                    @if(!empty($content[0]->download_image))
                    <div class="form-group">
                      <img src="{{url('uploads/home')}}/{{$content[0]->download_image}}" width="100" height="100">
                    </div>
                    @endif
                    
                  	<div class="box-footer">
	                   <button type="submit" class="btn btn-info pull-right">Submit</button>
	                 </div><!-- /.box-footer -->

                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
    </div>
        
@stop