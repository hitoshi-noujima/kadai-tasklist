@extends('layouts.app')

@section('content')

<h1>タスク新規作成ページ</h1>

<div class="row">
    <div class="col-xs-12 col-sm-offset-2 col-md-offset-2 col-sm-8 col-md-8 col-lg-offset-3 col-lg-6">
        {!! Form::model($task, ['route' => ['tasks.store'], 'class' => 'form-horizontal']) !!}
            <div class="form-group">
                {!! Form::label('content', 'タスク:', ['class' => 'col-xs-3']) !!}
                <div class="col-xs-9">
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('status', 'ステータス:', ['class' => 'col-xs-3']) !!}
                <div class="col-xs-9">
                    {!! Form::select('status', ['未完了' => '未完了', '進行中' => '進行中', '完了' => '完了'], '未完了', ['class' => 'form-control']) !!}
                </div>
            </div>
            {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>

@endsection