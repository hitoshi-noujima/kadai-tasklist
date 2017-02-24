@if (count($errors) > 0)
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h2 class="panel-title">下記のエラーメッセージを確認してください</h2>
        </div>
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
