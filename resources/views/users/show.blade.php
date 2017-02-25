@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">プロフィール</h2>
                </div>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                          <th>名前</th>
                          <td>{{ $user->name }}</td>
                      </tr>
                      <tr>
                          <th>メールアドレス</th>
                          <td>{{ $user->email }}</td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </aside>
    </div>
@endsection