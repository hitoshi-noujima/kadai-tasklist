@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <?php $user = Auth::user(); ?>
        
        <h1>{{ $user->name }}のタスク一覧</h1>

        @if (count($tasks) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>タスク</th>
                    <th>ステータス</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($tasks as $task)
                    <tr>
                        <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>
                        <td>{{ $task->content }}</td>
                        <td>{{ $task->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        
        {!! $tasks->render() !!}
        
        {!! link_to_route('tasks.create', '新規タスク追加ページ', null, ['class' => 'btn btn-primary']) !!}
        
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>タスク管理</h1>
                {!! link_to_route('signup.get', 'ユーザー新規登録', null, ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection