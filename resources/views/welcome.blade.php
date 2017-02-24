@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h1>タスク管理</h1>
            {!! link_to_route('signup.get', 'ユーザー新規登録', null, ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
@endsection