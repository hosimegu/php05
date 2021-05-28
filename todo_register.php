<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>todoリストユーザ登録画面</title>
</head>

<body>
  <form action="todo_register_act.php" method="POST">
    <fieldset>
      <legend>idパスワード発行画面</legend>
      <div>
        登録者id: <input type="text" name="username">
      </div>
      <div>
        パスワード: <input type="text" name="password">
      </div>
      <div>
        <button>登録</button>
      </div>
      <a href="todo_login.php">ログイン画面に戻る</a>
    </fieldset>
  </form>

</body>

</html>