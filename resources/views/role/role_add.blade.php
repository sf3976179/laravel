@extends('admin.public')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>角色管理</h3>
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
                            <h2>角色管理 <small>添加角色</small></h2>
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
                            <form method="post" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">角色名称 <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input style="width:40%;" type="text" name="name" value="<?php echo isset($role_data->name)?$role_data->name:'';?>" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">关键字 <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input style="width:40%;" type="text" id="last-name" name="display_name" value="<?php echo isset($role_data->display_name)?$role_data->display_name:'';?>" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">角色描述</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea style="height:110px;" id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="description">
                                            <?php echo isset($role_data->description)?$role_data->description:'';?>
                                        </textarea>
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
                            //表单提交
                            $('#role_add_submit').on('click',function(){
                                // 查询二级分类
                                $.post("{{ URL::to('role_add') }}",{'_token':'{{csrf_token()}}','name':$("input[name='name']").val(),'display_name':$("input[name='display_name']").val(),'description':$("textarea[name='description']").val()},function(data){
                                    //第二个参数要传token的值 再传参数要用逗号隔开
                                    $('.modal-body').html(data.message);
                                    $('#myModal').modal({
                                        keyboard: true
                                    });

                                });
                            });

                        </script>
@endsection
