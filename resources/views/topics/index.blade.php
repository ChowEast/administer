@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>
                        <i class="glyphicon glyphicon-align-justify" style="top: 4px;"></i> 列表
                        <a class="btn btn-success pull-right" href="{{ route('topics.create') }}"><i class="glyphicon glyphicon-plus"></i> 新建</a>
                    </h1>
                </div>

                <div class="panel-body">
                    @if($topics->count())
                        <table class="table table-condensed table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>姓名 </th> <th>电话</th> <th>门诊类别</th> <th>导诊</th>
                                <th class="text-right">操作</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($topics as $topic)
                                <tr>
                                    <td class="text-center"><strong>{{$topic->id}}</strong></td>

                                    <td>{{$topic->title}}</td> <td>{{$topic->phone}}</td> <td>{{ $topic->category->name }}</td> <td>{{$topic->body}}</td>
                                    <td class="text-right">
                                        <a class="btn btn-xs btn-primary" href="{{ route('topics.show', $topic->id) }}">
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                        </a>

                                        <a class="btn btn-xs btn-warning" href="{{ route('topics.edit', $topic->id) }}">
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </a>

                                        <form action="{{ route('topics.destroy', $topic->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('确认删除?');">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE">

                                            <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $topics->render() !!}
                    @else
                        <h3 class="text-center alert alert-info">空!</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection