@extends('admin.public')

@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>会员编辑</h3>
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
                    <h2>会员编辑 <small>编辑当前会员信息</small></h2>
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

                    <!-- 俩个div处于同行 -->
                    <div>

                    <form id="myupload" style="float:left;width:5%;padding-top:5%;" action="{{ route('file_upload') }}" method="post" enctype="multipart/form-data">
                      <div class="shangchuan" style="width:15%;height:100px;margin-top:-3.55rem;float:left;display:inline;">
                        <div class="pic" style="display:inline;">

                          @if ($user_info->user_image)
                            <img id="src" src="{{url('printing')}}/<?php echo $user_info->user_image;?>" style="width:200px;height:150px;">
                          @else
                            <img id="src" src="{{asset('image/default_upload.jpg')}}" style="width:200px;height:150px;">
                          @endif

                          <!-- CSRF保护 -->
                          {{ csrf_field() }}
                        <input id="fileupload" type="file" name="mypic" style="width:16.7rem;height:12.25rem;top:-12.3rem;"></div>
                      </div>
                    </form>


                    <form name="form_data" style="float:right;width:90%;" id="myupload" method="POST" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('user_editok') }}" enctype="multipart/form-data">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">呢称 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="user_name" id="first-name" value="{{ $user_info->name }}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">邮箱 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" disabled="disabled" name="user_email" id="first-name" value="{{ $user_info->email }}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group" >
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">地址 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="user_address" value="{{ $user_info->address }}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group" >
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">手机号 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="user_phone" value="{{ $user_info->user_phone }}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">会员性别</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn <?php if($user_info->user_sex == '1'){echo 'btn-default active';}else{echo 'btn-default';}?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="user_sex" value="1" <?php if($user_info->user_sex == '1'){echo 'checked';}?>> &nbsp; 男 &nbsp;
                            </label>
                            <label class="btn <?php if($user_info->user_sex == '2'){echo 'btn-primary active';}else{echo 'btn-primary';}?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="user_sex" value="2" <?php if($user_info->user_sex == '2'){echo 'checked';}?>> 女
                            </label>
                          </div>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">会员标签</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input name="user_tags" id="tags_1" type="text" class="tags form-control" value="{{ $user_info->user_tag }}" />
                          <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">自我评价 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <script type="text/plain" id="myEditor" style="width:700px;height:200px;">
                            <?php echo $user_info->user_profile;?>
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
                          <input type="hidden" name="user_id" value="{{ $user_info->id }}" />
                          <!-- 图片地址 -->
                          <input name="image_upload" type="hidden" />
                          <input type="submit" class="btn btn-success" value="保存"/>
                        </div>
                      </div>
                    </form>



                    </div>

                  </div>
                </div>
              </div>
        </div>

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
