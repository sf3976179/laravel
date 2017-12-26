@extends('admin.public')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>管理员管理</h3>
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
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>管理员管理 <small>分配管理员权限</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />

                            <div>
                            <form id="myupload" style="float:right;width:5%;padding-top:3.5%;padding-right:30%;" action="{{ route('file_upload') }}" method="post" enctype="multipart/form-data">
                                <div class="shangchuan" style="width:15%;height:100px;margin-top:-3.55rem;float:left;display:inline;">
                                    <div class="pic" style="display:inline;">

                                        @if (!1)
                                            <img id="src" src="{{url('printing')}}/<?php echo 1;?>" style="width:200px;height:150px;">
                                        @else
                                            <img id="src" src="{{asset('image/default_upload.jpg')}}" style="width:200px;height:150px;">
                                        @endif

                                            <!-- CSRF保护 -->
                                            {{ csrf_field() }}
                                            <input id="fileupload" type="file" name="mypic" style="width:16.7rem;height:12.25rem;top:-12.3rem;">
                                            <input type="hidden" name="user_img">
                                    </div>
                                </div>
                            </form>

                            <form id="form_submit" method="post" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('admin_add_submit') }}">
                                {{ csrf_field() }}
                                <div class="form-group" style="height:34px;">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">呢称 <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12" style="width:200px;">
                                        <input style="width:200px;" type="text" name="name" value="" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group" style="height:34px;">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">账号 <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12" style="width:200px;">
                                        <input style="width:200px;" type="text" name="user_login" value="" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">密码 <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12" style="width:200px;">
                                        <input style="width:200px;" type="password" name="password" value="" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">手机号 <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12" style="width:200px;">
                                        <input style="width:200px;" type="text" id="last-name" name="user_phone" value="" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">角色 <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                        @foreach($role_data as $v)
                                        <label class="checkbox-inline">
                                            <input value="{{$v->id}}" type="checkbox" name="role_id[]">{{$v->name}}
                                        </label>
                                        @endforeach

                                    </div>
                                </div>


                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary" type="button">返回</button>
                                        <button class="btn btn-primary" type="reset">重置</button>
                                        <button id="role_add_submit" type="button" class="btn btn-success">提交</button>
                                    </div>
                                </div>

                            </form>
                            </div>
                        </div>

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">×
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">
                                            消息提示
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                                data-dismiss="modal">关闭
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <script type="text/javascript">

                            $(function () {
                                // oss图片上传
                                $("#fileupload").change(function () {
                                    $("#myupload").ajaxSubmit({
                                        dataType: 'json',
                                        success: function (res) {
                                            if (res.code == '200') {
                                                //图片压缩
                                                var compress_img = res.data + '?x-oss-process=image/resize,m_fixed,h_147,w_200';
                                                $("#src").attr("src", compress_img);
                                                $('input[name="user_img"]').val(res.data);  //图片名称
                                            } else {

                                            }

                                        },

                                    });
                                });

                                //表单提交
                                $('#role_add_submit').on('click', function () {
                                    $("#role_add_submit").attr('type', 'submit');
                                    $("#role_add_submit").submit();

                                        {{--// 查询二级分类--}}
                                        {{--$.post("{{ URL::to('role_add') }}", {--}}
                                            {{--'_token': '{{csrf_token()}}',--}}
                                            {{--'name': $("input[name='name']").val(),--}}
                                            {{--'display_name': $("input[name='display_name']").val(),--}}
                                            {{--'description': $("textarea[name='description']").val()--}}
                                        {{--}, function (data) {--}}
                                            {{--//第二个参数要传token的值 再传参数要用逗号隔开--}}
                                            {{--$('.modal-body').html(data.message);--}}
                                            {{--$('#myModal').modal({--}}
                                                {{--keyboard: true--}}
                                            {{--});--}}

                                        {{--});--}}

                                    });
                            });

                        </script>
@endsection
