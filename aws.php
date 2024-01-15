 <?php
$host="18.178.194.65";
$dbname="awsmysql";
$username="admin";
$password="Tomoharu1206";
$stmt=null;
$pdo=null;

// DB接続
try{
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    
}catch(PDOException $e){
    echo $e->getMessage();
}
if(!empty($_POST["submitbottom"])){
    try{
        $name=$_POST["username"];
        $no=$_POST["userno"];
        $stmt=$pdo->prepare("insert into awstable(no,name) values(:no,:name)");
        $stmt->bindParam(":no",$no,PDO::PARAM_STR);
        $stmt->bindParam(":name",$name,PDO::PARAM_STR);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
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
