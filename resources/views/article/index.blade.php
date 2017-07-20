@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.message')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <a href="{{ url('admin/article/create') }}" class="btn btn-success btn-sm">添加文章</a>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">文章列表</div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <thead>
                            <tr>
                                <th>编号</th>
                                <th>标题</th>
                                <th>简介</th>
                                <th>添加时间</th>
                                <th>修改时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->desc }}</td>
                                    <td>{{ $article->created_at }}</td>
                                    <td>{{ $article->updated_at }}</td>
                                    <td>
                                        <a href="{{ url('admin/article/' . $article->id) }}" class="btn btn-primary">查看文章</a>
                                        <a href="{{ url('admin/article/' . $article->id . '/edit') }}" class="btn btn-info">修改</a>
                                        <form action="{{ url('admin/article/' . $article->id) }}" method="post" style="display: inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="button" class="btn btn-danger" onclick="deleteObj(this)">删除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_script')
    <script type="text/javascript">
        function deleteObj(obj) {
            if(confirm('你确定要删除？？？')){
                $(obj).parent().submit();
            }
        }
    </script>
@endsection