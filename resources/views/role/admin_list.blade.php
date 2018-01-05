@extends('admin.public')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>管理员 <small>管理员信息</small></h3>
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
                            <h2>管理员列表 <small>管理员信息操作</small></h2>
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
                            <a href="{{ url('/admin_add') }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> 管理员添加 </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> 删除 </a>
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                    <tr class="headings">
                                        <th>
                                            <input type="checkbox" id="check-all" class="flat">
                                        </th>
                                        <th class="column-title">ID </th>
                                        <th class="column-title">呢称 </th>
                                        <th class="column-title">关键字 </th>
                                        <th class="column-title">描述 </th>
                                        <th class="column-title">拥有权限 </th>
                                        <th class="column-title no-link last"><span class="nobr">操作</span>
                                        </th>
                                        <th class="bulk-actions" colspan="7">
                                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                        <tr class="even pointer">
                                            <td class="a-center ">
                                                <input type="checkbox" class="flat" name="table_records">
                                            </td>
                                            <td class=" "></td>
                                            <td class=" " style="width:15%;"></td>
                                            <td class=" " style="width:20%;">
                                            <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                            </td>
                                            <td class=" " style="width:30%;">

                                            </td>
                                            <td class=" "></td>
                                            <td class="last" style="width:15%;">
                                                <a href="{{ url('article_edit') }}/" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> 编辑 </a>
                                                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> 删除 </a>
                                                <!-- <a href="">编辑</a> -->
                                            </td>
                                        </tr>




                                    </tbody>
                                </table>

                            </div>



                        </div>

                    </div>
{{--                    {{ $article->links() }}--}}

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
