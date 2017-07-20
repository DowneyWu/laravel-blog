@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.validator')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        添加文章
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="{{ url('admin/article') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title" class="col-md-2 control-label">标题：</label>
                                <div class="col-md-6">
                                    <input type="text" name="title" class="form-control" id="title"
                                           value="{{ old('title') }}" placeholder="请输入标题" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">简介：</label>
                                <div class="col-md-6">
                                    <input type="text" name="desc" class="form-control" id="desc"
                                           value="{{ old('desc') }}" placeholder="请输入简介" required>
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