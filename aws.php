<?php
$host = "18.178.194.65";
$dbname = "awsmysql";
$username = "admin";
$password = "Tomoharu1206";
$stmt = null;
$pdo = null;

// DB接続
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!empty($_POST["submitbottom"])) {
        // フォームが送信された場合のみ実行
        $name = $_POST["username"];
        $no = $_POST["userno"];

        // プリペアドステートメントを使用してデータを挿入
        $stmt = $pdo->prepare("INSERT INTO awstable (no, name) VALUES (:no, :name)");
        $stmt->bindParam(":no", $no, PDO::PARAM_STR);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->execute();

        echo "Data inserted successfully";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="submit" value="書き込む" name="submitbottom">
        no:
        <input type="number" name="userno"><br>
        名前:
        <input type="text" name="username"><br>
    </form>
</body>
</html>
