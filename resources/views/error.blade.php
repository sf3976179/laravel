<!-- /resources/views/post/create.blade.php -->

<h1>提交错误</h1>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <button class="btn btn-primary" onclick="window.history.go(-1);">返回</button>

@endif

<!-- 创建文章表单 -->
