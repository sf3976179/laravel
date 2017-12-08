<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DataTables | Gentelella</title>

    <!-- Bootstrap -->
    <link href="{{asset('css/admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('css/admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">


    <!-- Datatables -->

    <!-- 文章增加 begin -->





    <!-- end -->




    <!-- Custom Theme Style -->
    <link href="{{asset('css/admin/build/css/custom.min.css')}}" rel="stylesheet">

    <!-- jQuery -->
    <script src="{{asset('css/admin/vendors/jquery/dist/jquery.min.js')}}"></script>


    <!-- ueditor begin -->
    <link href="{{asset('ueditor/themes/default/css/umeditor.css')}}" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="{{asset('ueditor/third-party/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('ueditor/third-party/template.min.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/umeditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/umeditor.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('ueditor/lang/zh-cn/zh-cn.js')}}"></script>
    <!-- end -->

    <!-- 修改 文件上传按钮样式 begin -->
<style>
 .pic input {position:relative;opacity: 0;filter:alpha(opacity=0);cursor: pointer;width:12.2rem;height: 8.25rem;margin:auto;top:-8.3rem;}
</style>

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">


        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ url('/admin_index') }}" class="site_title"><i class="fa fa-paw"></i> <span>欢迎登录!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">

                @if(Session::get('user_image_name'))
                <img src="{{url('printing')}}/{{ Session::get('user_image_name') }}" alt="..." class="img-circle profile_img">
                @else
                <img src="{{asset('css/admin/images/img.jpg')}}" alt="..." class="img-circle profile_img">
                @endif

              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2> {{ Session::get('name') }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>菜单列表</h3>
                <ul class="nav side-menu">

                  <li><a id="test"><i class="fa fa-home"></i> 文章管理 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/admin_index') }}">文章分类</a></li>
                      <li><a href="{{ url('/article_list') }}">文章编辑</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-table"></i> 会员管理 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a>会员组<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li class="sub_menu"><a href="{{ url('/users') }}">会员编辑</a>
                          </li>
                          <li><a href="#level2_1">会员推荐</a>
                          </li>
                          <li><a href="#level2_2">会员统计</a>
                          </li>
                        </ul>
                      </li>

                      <li><a href="general_elements.html">权限管理</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">General Form</a></li>
                      <li><a href="general_elements.html">Advanced Components</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> 首页设置 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/home_edit') }}">说说、轮播图、链接</a></li>
                      <li><a href="general_elements.html">General Elements</a></li>
                      <li><a href="general_elements.html">General Elements</a></li>
                      <li><a href="general_elements.html">General Elements</a></li>
                      <li><a href="media_gallery.html">Media Gallery</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>管理员模块</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i>接口调用模块<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php foreach($interface_menu as $k => $v){?>
                        @if (!$v->p_id)
                        <li><a><?php echo isset($v->p_id)? '1':$v->name;?><span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            @foreach($interface_menu as $k1 => $v1)
                            @if($v1->p_id == $v->id)
                                {{--{{ URL::to('article_add') }}--}}
                              <li class="sub_menu"><a href="/laravel/public/interface_menu/{{$v1->id}}">{{$v1->name}}</a></li>
                            @endif
                            @endforeach
                          </ul>
                        </li>
                        @endif
                      <?php }?>



                    </ul>
                  </li>

                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

                    @if(Session::get('user_image_name'))
                    <img src="{{url('printing')}}/{{ Session::get('user_image_name') }}" alt="">
                    @else
                    <img src="{{asset('css/admin/images/img.jpg')}}" alt="">
                    @endif

                    {{ Session::get('name') }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="{{asset('css/admin/images/img.jpg')}}" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="{{asset('css/admin/images/img.jpg')}}" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="{{asset('css/admin/images/img.jpg')}}" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="{{asset('css/admin/images/img.jpg')}}"alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->



        @yield('content')



        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by Colorlib. More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jquery form 文件上传 -->
    <script src="{{asset('js/jquery.form.js')}}"></script>

    <!-- input tags -->
    <script src="{{asset('css/admin/vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{asset('css/admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('css/admin/build/js/custom.min.js')}}"></script>
    {{--<script src="{{asset('css/admin/build/js/custom.js')}}"></script>--}}

    <style type="text/css">
        h1{
            font-family: "微软雅黑";
            font-weight: normal;
        }
    </style>
  </body>
</html>
