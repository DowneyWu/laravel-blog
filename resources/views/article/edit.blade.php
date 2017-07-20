@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.validator')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        修改文章
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="{{ url('admin/article', ['id' => $article->id]) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-group">
                                <label for="title" class="col-md-2 control-label">标题：</label>
                                <div class="col-md-6">
                                    <input type="text" name="title" class="form-control" id="title" value="{{ $article->title }}" placeholder="请输入标题" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">简介：</label>
                                <div class="col-md-6">
                                    <input type="text" name="desc" class="form-control" value="{{ $article->desc }}" id="desc" placeholder="请输入简介" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-danger">提交</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection