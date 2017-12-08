@extends('admin.public')

@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>文章发布</h3>
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
                    <h2>文章增加 <small>增加文章信息</small></h2>
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
                  <div class="x_content" style="padding:0 100px 10px 1px;">
                    <br />
                    <!-- <form id="myupload" action="{{ route('file_upload') }}" method="post" enctype="multipart/form-data">
                    </form> -->
                    <!-- {{ route('article_submit') }} -->
                    <form name="form_data" id="myupload" method="POST" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('file_upload') }}" enctype="multipart/form-data">
                      <div style="width:100%;" style="float:left;">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">文章主标题 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="first_title" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="shangchuan" style="width:15%;height:100px;margin-top:-3.55rem;float:right;display:inline;">
                        <div class="pic" style="display:inline;">
                          <img id="src" src="{{asset('image/default_upload.jpg')}}" style="width:150px;height:100px;">
                          <!-- CSRF保护 -->
                          {{ csrf_field() }}
                        <input id="fileupload" type="file" name="mypic"></div>
                        <!-- 图片地址 -->
                        <input name="image_upload" type="hidden" />
                      </div>
                      </div>
                      <div class="form-group" >
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">文章副标题 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="second_titile" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">选择分类 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">



                          <div class="btn-group">
                            <button type="button" class="btn btn-danger" id="article_list1">文章大类</button>
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                              <span class="caret"></span>
                              <!-- <span class="sr-only">Toggle Dropdown</span> -->
                            </button>
                            <!-- 文章大类 -->
                            <input name="article_list1" type="hidden"/>
                            <ul class="dropdown-menu" role="menu" style="min-width:0px;width:100%;">
                              @foreach ($article as $v1)
                                @if ($v1->ac_parent_id == '0')
                                  <li onclick="change_list1('{{$v1->ac_name}}','{{$v1->id}}')" style="text-align:center;">{{$v1->ac_name}}</li>
                                @endif
                              @endforeach
                              <li class="divider"></li>
                              <li><a href="#">点错了</a>
                              </li>
                            </ul>

                            <script type="text/javascript">
                              // 文章分类1
                              function change_list1(obj,id){
                                $('#article_list1').text(obj);
                                $('input[name="article_list1"]').val(id); //传参文章大类赋值

                                // 查询二级分类
                                $.post("{{ URL::to('article_add') }}",{'_token':'{{csrf_token()}}','id':id,type:'ajax'},function(data){
                                  //第二个参数要传token的值 再传参数要用逗号隔开
                                  console.log(data);
                                  var res = JSON.parse(data);
                                  console.log(res);
                                  var str = '';
                                  for(var i = 0; i<res.length;i++){
                                    str += '<li onclick="change_title(\''+res[i].ac_name+'\',\''+res[i].id+'\')" data-value="'+res[i].ac_name+'">'+res[i].ac_name+'</li>';
                                  }
                                  $("#change_list2").html(' ');
                                  $("#change_list2").append(str);
                                });
                              }

                              // 文章分类2
                              function change_title(res,id){
                                $('#article_list2').text(res);
                                $('input[name="article_list2"]').val(id); //传参文章小类赋值
                              }
                            </script>

                          </div>

                          <div class="btn-group">
                            <button type="button" class="btn btn-danger" id="article_list2">文章小类</button>
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <input name="article_list2" type="hidden"/>
                            <ul class="dropdown-menu" role="menu" id="change_list2" style="min-width:100%;">
                            </ul>
                          </div>


                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">自定义文章标签</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input name="tags_1" id="tags_1" type="text" class="tags form-control" value="大神, 吐槽, 精品" />
                          <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">文章显示方式</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="display" value="0"> &nbsp; 公开 &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="display" value="1"> 私人
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">文章内容 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <script type="text/plain" id="myEditor" style="width:700px;height:200px;">
                          </script>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">back</button>
                          <button class="btn btn-primary" type="reset" onclick="$('#myupload').reset();">Reset</button>
                            <!-- CSRF保护 -->
                            {{ csrf_field() }}
                          <input type="button" id="submit" class="btn btn-success" value="Submit"/>
                          <input type="hidden" id="form_sign" name="form_sign"/>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
        </div>

        <script type="text/javascript">
        // 表单数据提交
        $(function(){
          $('#submit').click(function(){
              $("input[type='button']").attr('type','submit');
              // 标记为表单提交而非图片提交
              $('#form_sign').val('1');
              $("input[type='submit']").submit();
          })
        })
        </script>

        <script type="text/javascript">
            //实例化编辑器
            var um = UM.getEditor('myEditor');
            um.addListener('focus',function(){
                $('#focush2').html('')
            });
            //按钮的操作
            function insertHtml() {
                var value = prompt('插入html代码', '');
                um.execCommand('insertHtml', value)
            }
            function isFocus(){
                alert(um.isFocus())
            }
            function doBlur(){
                um.blur()
            }
            function createEditor() {
                enableBtn();
                um = UM.getEditor('myEditor');
            }
            function getAllHtml() {
                alert(UM.getEditor('myEditor').getAllHtml())
            }
            function getContent() {
                var arr = [];
                arr.push("使用editor.getContent()方法可以获得编辑器的内容");
                arr.push("内容为：");
                arr.push(UM.getEditor('myEditor').getContent());
                alert(arr.join("\n"));
            }
            function getPlainTxt() {
                var arr = [];
                arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
                arr.push("内容为：");
                arr.push(UM.getEditor('myEditor').getPlainTxt());
                alert(arr.join('\n'))
            }
            function setContent(isAppendTo) {
                var arr = [];
                arr.push("使用editor.setContent('欢迎使用umeditor')方法可以设置编辑器的内容");
                UM.getEditor('myEditor').setContent('欢迎使用umeditor', isAppendTo);
                alert(arr.join("\n"));
            }
            function setDisabled() {
                UM.getEditor('myEditor').setDisabled('fullscreen');
                disableBtn("enable");
            }

            function setEnabled() {
                UM.getEditor('myEditor').setEnabled();
                enableBtn();
            }

            function getText() {
                //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
                var range = UM.getEditor('myEditor').selection.getRange();
                range.select();
                var txt = UM.getEditor('myEditor').selection.getText();
                alert(txt)
            }

            function getContentTxt() {
                var arr = [];
                arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
                arr.push("编辑器的纯文本内容为：");
                arr.push(UM.getEditor('myEditor').getContentTxt());
                alert(arr.join("\n"));
            }
            function hasContent() {
                var arr = [];
                arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
                arr.push("判断结果为：");
                arr.push(UM.getEditor('myEditor').hasContents());
                alert(arr.join("\n"));
            }
            function setFocus() {
                UM.getEditor('myEditor').focus();
            }
            function deleteEditor() {
                disableBtn();
                UM.getEditor('myEditor').destroy();
            }
            function disableBtn(str) {
                var div = document.getElementById('btns');
                var btns = domUtils.getElementsByTagName(div, "button");
                for (var i = 0, btn; btn = btns[i++];) {
                    if (btn.id == str) {
                        domUtils.removeAttributes(btn, ["disabled"]);
                    } else {
                        btn.setAttribute("disabled", "true");
                    }
                }
            }
            function enableBtn() {
                var div = document.getElementById('btns');
                var btns = domUtils.getElementsByTagName(div, "button");
                for (var i = 0, btn; btn = btns[i++];) {
                    domUtils.removeAttributes(btn, ["disabled"]);
                }
            }
        </script>

        <!-- 图片上传、预览 bengin -->
        <script type="text/javascript">
        $(function () {
            // 图片上传
            $("#fileupload").change(function(){
              $("#myupload").ajaxSubmit({
                dataType:  'json',
                success: function(data){
                 console.log(data);
                 //  $("#src").hide(); // 隐藏初始图片
                 $("#upload_identify").hide(); // 隐藏初始文字
                 $('div[class="shangchuan"]').css('border','0px'); // 把上传图片虚线去掉
                 //  $('div[class="mode_post"]').css('background',"url("+'/public/printing/'+data.name+")");
                 $("#src").attr("src",data.print_path);
                 $('div[class="mode_post"]').css('background-position','center center');
                 $('div[class="mode_post"]').css('background-size','100% 100%');
                 $('input[name="image_upload"]').val(data.name); // 图片名称
                },

              });
          });
        });
        </script>
        <!-- end -->

        <!-- /page content -->
@endsection
