@extends('layouts.app')

@section('content')
<!-- jQuery -->
<script src="{{asset('css/admin/vendors/jquery/dist/jquery.min.js')}}"></script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">消息提示</div>

                 <div id="applyFor" style="text-align: center; width: 500px; margin: 100px auto;">
                   {{$message}},将在<span class="loginTime" style="color: red">{{$jumpTime}}</span>秒后跳转至
                   <a href="{{$url}}" style="color: red">{{$name}}</a>页面
                 </div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        $(function(){
            var url = "{{$url}}"
            var loginTime = parseInt($('.loginTime').text());
            var time = setInterval(function(){
                loginTime = loginTime-1;
                $('.loginTime').text(loginTime);
                if(loginTime==0){
                    clearInterval(time);
                    window.location.href=url;
                }
            },1000);
        })
    </script>
@endsection
