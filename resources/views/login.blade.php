<!DOCTYPE html>
<html>
<head>
    <title>ログイン</title>
</head>
<body>
    <h2>ログイン</h2>

@if ($errors->has('login_error'))
    <div style="color:red">{{ $errors->first('login_error') }}</div>
@endif

<form method="POST" action="/login">
    @csrf
    <input type="text" name="user_id" placeholder="ユーザーID" required><br>
    <input type="password" name="password" placeholder="パスワード" required><br>
    <button type="submit">ログイン</button>
</form>

</body>
</html>
