@if (count($errors) > 0)
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h2 class="panel-title">エラー</h2>
        </div>
        <div class="panel-body">
            下記のエラーメッセージを確認してください。
        </div>
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
