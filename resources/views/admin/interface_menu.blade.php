@extends('admin.public')

@section('content')

    <style>
        .col-md-6 {
            width: 100%;
        }
        .col-sm-9{
            padding-top: 15px;
        }
        .input-group-btn:first-child>.btn, .input-group-btn:first-child>.btn-group{
            width:100px;
        }
        /*
        * table input
        */
        #table_input{
            width:97%;
            border-left:0px;
            border-top:0px;
            border-right:0px;
            border-bottom:1px;
        }
        /*
         * table
         */
        #tab_content1{
            width:95%;
        }
    </style>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>接口文档</h3>
                </div>

            </div>

            <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{ $menu_data['parent_name'] }}<small>{{ $menu_data['name'] }}</small></h2>
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

                        <form class="form-horizontal form-label-left">


                            <div class="form-group">

                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span id="post_type">{{ $menu_data['post_type'] }}</span> <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                <li><a onclick="post_type(1)">GET</a>
                                                </li>
                                                <li><a onclick="post_type(2)">POST</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <input type="text" id="data_url" class="form-control" aria-label="Text input with dropdown button" value="{{ $menu_data['url'] }}">
                                        <!-- /btn-group -->



                                    </div>

                                </div>

                                <div>
                                    <a class="btn btn-app" id="interface_submit">
                                        <input id="data_type" type="hidden" value="{{ $menu_data['post_type'] }}" />
                                        <i class="fa fa-play"></i> Play
                                    </a>
                                    <a class="btn btn-app">
                                        <i class="fa fa-save"></i> Save
                                    </a>
                                </div>

                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">headers</a>
                                        </li>
                                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">body</a>
                                        </li>
                                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">文档说明</a>
                                        </li>
                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                                            <table class="table table-bordered" id="table_headers">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Key</th>
                                                    <th>Value</th>
                                                    <th>Description</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($menu_data['headers'] as $k1 => $v1)
                                                <tr>
                                                    <th scope="row">{{$k1+1}}</th>
                                                    <td><input name="headers_input[]" id="table_input" value="{{ isset($v1['0'])?$v1['0']:'' }}" onkeypress="if(event.keyCode==13) focusNextInput(this);"></td>
                                                    <td><input name="headers_input[]" id="table_input" value="{{ isset($v1['1'])?$v1['1']:'' }}" onkeypress="if(event.keyCode==13) focusNextInput(this);"></td>
                                                    <td><input name="headers_input[]" id="table_input" value="{{ isset($v1['2'])?$v1['2']:'' }}" onkeypress="if(event.keyCode==13) focusNextInput(this);"></td>
                                                </tr>
                                                @endforeach

                                                </tbody>
                                            </table>


                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                                            <table class="table table-bordered" id="table_body">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Key</th>
                                                    <th>Value</th>
                                                    <th>Description</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($menu_data['body'] as $k1 => $v1)
                                                    <tr name='body_input[]'>
                                                        <th scope="row">{{$k1+1}}</th>
                                                        <td><input id="table_input" value="{{ isset($v1['0'])?$v1['0']:'' }}" onkeypress="if(event.keyCode==13) focusNextInput1(this);"></td>
                                                        <td><input id="table_input" value="{{ isset($v1['1'])?$v1['1']:'' }}" onkeypress="if(event.keyCode==13) focusNextInput1(this);"></td>
                                                        <td><input id="table_input" value="{{ isset($v1['2'])?$v1['2']:'' }}" onkeypress="if(event.keyCode==13) focusNextInput1(this);"></td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>


                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                            <div class="bs-example" data-example-id="simple-jumbotron">
                                                <div class="jumbotron">
                                                    <h3>文档说明</h3>
                                                    <p>{{ $menu_data['Description'] }}</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <div class="col-md-9 col-sm-9 col-xs-12" style="width:50%";>
                                            <textarea id="textarea" class="resizable_textarea form-control" style="height:300px;" placeholder="接口返回值"></textarea>
                                        </div>

                                        <div class="col-md-8 col-lg-8 col-sm-7" style="float:right;width:50%;">
                                            <blockquote class="blockquote-reverse" style="text-align:left;">
                                                <p>这里后面以图形的效果显示数据发送状态</p>
                                                </footer>
                                            </blockquote>
                                        </div>

                                    </div>




                                </div>


                            </div>



                        </form>
                    </div>
                </div>
            </div>
            </div>


        </div>
        <!-- /page content -->

        <script>
            //数据提交方式
            function post_type(res){
                if(res == '1'){
                    $('#post_type').empty().html('GET');
                }else{
                    $('#post_type').empty().html('POST');
                }
            }

            //jQuery实现在一个输入框按回车键后光标跳到下一个输入框(headers)
            //下面代码以后重构下
            function focusNextInput(thisInput)
            {
                var inputs = $('#table_headers input');
                for(var i = 0;i<inputs.length;i++){
                    // 如果是最后一个，则新创建一行
                    if(i==(inputs.length-1)){
                        // 增加一行
                        var number = parseInt(inputs.length/3)+1;
                        var str = "<tr><th scope='row'>"+number+"</th><td><input name='headers_input[]' id='table_input' value='' onkeypress='if(event.keyCode==13) focusNextInput(this);'></td>" +
                            "<td><input name='headers_input[]' id='table_input' value='' onkeypress='if(event.keyCode==13) focusNextInput(this);'></td>" +
                            "<td><input name='headers_input[]' id='table_input' value='' onkeypress='if(event.keyCode==13) focusNextInput(this);'><li class='fa fa-times' onclick='tr_delete(this);'></li></td></tr>";

                        $("#table_headers").find('tr').last().after(str); //给当前标签后增加数据
                        inputs = $('#table_headers input'); //重新更新表格
                        inputs[i+1].focus();
                        break;
                    }else if(thisInput == inputs[i]){
                        inputs[i+1].focus(); break;
                    }

                }
            }

            //jQuery实现在一个输入框按回车键后光标跳到下一个输入框(body)
            function focusNextInput1(thisInput)
            {
                var inputs = $('#table_body input');
                for(var i = 0;i<inputs.length;i++){
                    // 如果是最后一个，则新创建一行
                    if(i==(inputs.length-1)){
                        // 增加一行
                        var number = parseInt(inputs.length/3)+1;
                        var str = "<tr><th scope='row'>"+number+"</th><td><input name='body_input[]' id='table_input' value='' onkeypress='if(event.keyCode==13) focusNextInput1(this);'></td>" +
                            "<td><input name='body_input[]' id='table_input' value='' onkeypress='if(event.keyCode==13) focusNextInput1(this);'></td>" +
                            "<td><input name='body_input[]' id='table_input' value='' onkeypress='if(event.keyCode==13) focusNextInput1(this);'><li class='fa fa-times' onclick='tr_delete1(this);'></li></td></tr>";

                        $("#table_body").find('tr').last().after(str); //给当前标签后增加数据
                        inputs = $('#table_body input'); //重新更新表格
                        inputs[i+1].focus();
                        break;
                    }else if(thisInput == inputs[i]){
                        inputs[i+1].focus(); break;
                    }

                }
            }

            // 删除tr(headers)
            function tr_delete(rsg){
                $(rsg).parent().parent().remove();
            };
            // 删除tr(body)
            function tr_delete1(rsg){
                $(rsg).parent().parent().remove();
            };

            // 数据提交
            $("#interface_submit").on("click",function(){
                // headers数据提交
                var str = '';
                var length = $("input[name='headers_input[]']").length; //获取长度
                var headers = [];
                $("input[name='headers_input[]']").each(function(i){
                    if(this.value == ''){
                        //判断是否为最后一个
                        if(i == (length-1)){
                            str += null;
                        }else{
                            str += null+'-';
                        }
                    }else {
                        str += this.value+'-';
                    }
                });
                headers.push(str); //headers数据

                //body数据提交
                var str1 = '';
                var body = [];
                $("tr[name='body_input[]']").each(function(i){
                    // tr下的每一个input
                    $(this).find('input').each(function(j){
                        if(this.value == ''){
                                if(i=='2' && j=='2'){ //最后一行最后一条数据
                                    str1 += null;
                                }else if(j=='2'){ //每行的最后数据（除了最后一行）
                                    str1 += null+'^';
                                }else{ //剩下条件的空数据
                                    str1 += null+'-';
                                }
                        }else{
                            if(j=='2' && i!='2'){ //每行的最后数据（除了最后一行）
                                str1 += this.value+'^';
                            }else{
                                str1 += this.value + '-';
                            }
                        }
                        body.push(str1); //body数据
                    });
                });

                // 发送数据
                $.post("{{ URL::to('interface_send') }}",{'_token':'{{csrf_token()}}',headers:headers.pop(),body:body.pop(),url:$('#data_url').val(),type:$('#post_type').text()},function(data){
                    if(data){
                        $('#textarea').val(data);
                    }
                });





            });



        </script>

@endsection
