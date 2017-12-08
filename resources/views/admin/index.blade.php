@extends('admin.public')

@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left" id="aaa">
                <h3>文章管理 <small>显示所有类别</small></h3>
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
              <div class="col-md-6 col-sm-6 col-xs-12" style="width:100%;">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>文章大类<small>点击下拉显示当前大类的小类</small></h2>
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

                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>分类名称</th>
                          <th>副标题</th>
                          <th>父级ID</th>
                          <th>展开/合拢</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach($article as $k1=>$v1)
                        @if ($v1->ac_parent_id == '0')
                        <tr>
                          <th scope="row">{{$v1->id}}</th>
                          <td>{{$v1->ac_name}}</td>
                          <td>{{$v1->ac_subtitle}}</td>
                          <td>{{$v1->ac_parent_id}}</td>
                          <td>
                            <a class="open_1" onclick="click_button({{$v1->id}})"><i class="fa fa-chevron-up" data-id="{{$v1->id}}"></i></a>
                          </td>
                        </tr>
                        @endif
                        <?php foreach ($article as $k2 => $v2): ?>
                        @if ($v2->ac_parent_id == $v1->id)
                          <tr class="close_2" style="display:none;" data-id="{{$v2->ac_parent_id}}">
                            <th scope="row">-</th>
                            <td>{{$v2->ac_name}}</td>
                            <td>{{$v2->ac_subtitle}}</td>
                            <td>{{$v2->ac_parent_id}}</td>
                            <td>
                              <!-- <a class="collapse-link"><i class="fa fa-chevron-up"></i></a> -->
                              <a class="open_1">—</a>
                            </td>
                          </tr>
                        @endif
                        <?php endforeach; ?>
                        @endforeach




                        <script type="text/javascript">
                          function click_button(reg){
                            // var data-id = $(reg).attr('data-id');
                            // 展开列表
                            $(".close_2").each(function(){
                              if(reg == $(this).attr('data-id')){
                                $(this).slideToggle();
                              }
                            });
                            // 展开合拢样式更改
                            $("i").each(function(){
                              if($(this).attr('data-id') == reg){
                                $(this).toggleClass('fa-chevron-up fa-chevron-down');
                              }
                            });
                          }
                        </script>





                      </tbody>
                    </table>

                  </div>
                </div>
              </div>



              <div class="clearfix"></div>


            </div>
          </div>
        </div>
        <!-- /page content -->

@endsection
