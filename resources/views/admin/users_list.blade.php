@extends('admin.public')

@section('content')

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>会员列表</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_content">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 text-center">

              </div>

              <div class="clearfix"></div>

              @foreach ($users as $v1)
              <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                <div class="well profile_view">
                  <div class="col-sm-12">
                    <h4 class="brief"><i>{{ $v1->name }}</i></h4>
                    <div class="left col-xs-7">
                      <h2>个人信息</h2>
                      <p><strong>详情: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                      <ul class="list-unstyled">
                        <li><i class="fa fa-building"></i> Address:{{ $v1->address }}</li>
                        <li><i class="fa fa-phone"></i> Phone:{{ $v1->user_phone }}</li>
                      </ul>
                    </div>
                    <div class="right col-xs-5 text-center">
                      @if($v1->user_image)
                        <img src="{{url('printing')}}/<?php echo $v1->user_image;?>" alt="" class="img-circle img-responsive">
                      @else
                        <img src="{{asset('css/admin/images/img.jpg')}}" alt="" class="img-circle img-responsive">
                      @endif
                    </div>
                  </div>
                  <div class="col-xs-12 bottom text-center">
                    <div class="col-xs-12 col-sm-6 emphasis">
                      <p class="ratings">
                        <a>4.0</a>
                        <a href="#"><span class="fa fa-star"></span></a>
                        <a href="#"><span class="fa fa-star"></span></a>
                        <a href="#"><span class="fa fa-star"></span></a>
                        <a href="#"><span class="fa fa-star"></span></a>
                        <a href="#"><span class="fa fa-star-o"></span></a>
                      </p>
                    </div>
                    <div class="col-xs-12 col-sm-6 emphasis">
                      <a href="{{ url('user_edit') }}/<?php echo $v1->id;?>">
                        <button type="button" class="btn btn-success btn-xs"> <i class="fa">
                        </i> <i class="fa fa-comments-o"></i>编辑 </button>
                      </a>
                      <button type="button" class="btn btn-primary btn-xs">
                        <i class="fa fa-user"> </i> 查看信息
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach



            </div>
          </div>
        </div>
      </div>
      {{ $users->links() }}

      <style type="text/css">
        /*
        * 这个分页真TM丑
        */
        .pagination{
          padding-left: 50%;
        }
      </style>
    </div>
  </div>
</div>
<!-- /page content -->

@endsection
