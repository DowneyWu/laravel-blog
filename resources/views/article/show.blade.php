@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-success">
            <div class="panel-heading">文章详情</div>
            <div class="panel-body">
                <h3 class="text-center">{{ $article->title }}</h3>
                <hr/>
                <p class="text-center">
                    {{ $article->desc }}
                </p>
            </div>
        </div>
    </div>
@endsection