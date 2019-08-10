@extends('layouts.app')

@section('content')

    <div class="container">


        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1 class="text-center">
                        {{ $topic->title }}
                    </h1>

                    <div class="article-meta text-center">
                        发布者：{{ $topic->user->name }}
                        •
                        {{ $topic->created_at->diffForHumans() }}
                        •
                        <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                        {{ $topic->category->name }}
                    </div>

                    <div class="topic-body">
                        {!! $topic->body !!}

                    </div>

                    <div class="operate">
                        <hr>
                        <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-default btn-xs" role="button">
                            <i class="glyphicon glyphicon-edit"></i> 编辑
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
