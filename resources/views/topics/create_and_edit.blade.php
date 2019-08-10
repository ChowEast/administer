@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body">
                    <h2 class="text-center">
                        <i class="glyphicon glyphicon-edit"></i>
                        @if($topic->id)
                            编辑
                        @else
                            新建
                        @endif
                    </h2>
                    <hr>
                </div>

                @include('common.error')

                <div class="panel-body">
                    @if($topic->id)
                        <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
                            <input type="hidden" name="_method" value="PUT">
                            @else
                                <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
                                    @endif

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                    <div class="form-group">
                                        <label for="title-field">姓名</label>
                                        <input class="form-control" type="text" name="title" id="title-field" value="{{ old('title', $topic->title ) }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="phone-field">电话</label>
                                        <input class="form-control" type="text" name="phone" id="phone-field" value="{{ old('phone', $topic->phone ) }}" />
                                    </div>

                                    <div class="form-group">
                                        <label for="category_id-field">门诊类别</label>
                                        <select class="form-control" name="category_id" required>
                                            <option value="" hidden disabled selected>请选择分类</option>
                                            @foreach ($categories as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="body-field">导诊</label>
                                        <textarea name="body" id="body-field" class="form-control" rows="3">{{ old('body', $topic->body ) }}</textarea>
                                    </div>


                                    <div class="well well-sm">
                                        <button type="submit" class="btn btn-primary">确定</button>
                                        <a class="btn btn-link pull-right" href="{{ route('topics.index') }}"><i class="glyphicon glyphicon-backward"></i>  返回</a>
                                    </div>
                                </form>
                        </form>
                </div>
            </div>
        </div>
    </div>

@endsection