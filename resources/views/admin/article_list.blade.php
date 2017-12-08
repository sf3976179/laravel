@extends('admin.public')

@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>文章列表 <small>显示每条文章信息</small></h3>
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
                  <h2>文章信息 <small>点击查看文章信息详情</small></h2>
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
                  <a href="{{ url('/article_add') }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> 增加 </a>
                  <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> 删除 </a>
                  <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th>
                            <input type="checkbox" id="check-all" class="flat">
                          </th>
                          <th class="column-title">ID </th>
                          <th class="column-title">主标题 </th>
                          <th class="column-title">副标题 </th>
                          <th class="column-title">内容 </th>
                          <th class="column-title">所属分类 </th>
                          <th class="column-title no-link last"><span class="nobr">操作</span>
                          </th>
                          <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                          </th>
                        </tr>
                      </thead>

                      <tbody>

                        @foreach ($article as $v1)
                        <tr class="even pointer">
                          <td class="a-center ">
                            <input type="checkbox" class="flat" name="table_records">
                          </td>
                          <td class=" ">{{ $v1->id }}</td>
                          <td class=" " style="width:15%;">{{ $v1->main_title }}</td>
                          <td class=" " style="width:20%;">{{ $v1->subtitle }}
                            <!-- <i class="success fa fa-long-arrow-up"></i> -->
                          </td>
                          <td class=" " style="width:30%;">
                            <!-- {!! $v1->content !!} -->
                            <?php echo mb_substr(strip_tags($v1->content),0,50,'utf-8');?>。。。
                          </td>
                          <td class=" ">{{ $v1->ac_name }}</td>
                          <td class="last" style="width:15%;">
                            <a href="{{ url('article_edit') }}/<?php echo $v1->article_id;?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> 编辑 </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> 删除 </a>
                            <!-- <a href="">编辑</a> -->
                          </td>
                        </tr>
                        @endforeach



                      </tbody>
                    </table>

                  </div>



                </div>

              </div>
              {{ $article->links() }}

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
