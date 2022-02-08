<?php
$nickname = htmlspecialchars($_POST['nickname']);
$email = htmlspecialchars($_POST['email']);
$content = htmlspecialchars($_POST['content']);

// DBとの連携
// 1. データベースに接続する
// 接続するデータベースの情報
$dsn = 'mysql:dbname=phpkiso;host=localhost';

// mysqlのサーバーにログインするという記述
$user = 'root';
$password = '';

// PDO = PHPでデータベース作成(接続)する際に必要な技(インスタンス)
$dbn = new PDO($dsn, $user, $password);
$dbn->query('SET NAMES ut8');

// 2. SQL文を実行する
// SQL文を用意する
$sql = 'INSERT INTO `survey`(`nickname`, `email`, `content`) VALUES ("' . $nickname . '", "' . $email . '", "' . $content . '")';

// phpからsql文を発行する時に使用する関数 -> prepare = 準備、execute = 実行
// -> = アロー演算子、「〜の」という意味
$stmt = $dbn->prepare($sql);
$stmt->execute();

// 3. データベースを切断する
// null = 「なにもない」プログラミング用語としてよく使うs
$dbn = null;

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <title>送信完了</title>
  <meta charset="utf-8">
</head>

<body>
  <h1>お問い合わせありがとうございました！</h1>
  <p>ニックネーム：<?php echo $nickname; ?></p>
  <p>メールアドレス：<?php echo $email; ?></p>
  <p>お問合わせ内容：<?php echo $content; ?></p>

  <a href="view.php">お問合せ内容一覧</a>
</body>

</html>