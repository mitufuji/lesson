<?php
$dsn = 'mysql:dbname=pfp_db_app;host=localhost;charset=utf8mb4';
$user = 'root';
$password ='';

try{
    $pdo = new PDO($dsn,$user,$password);
// id一致のレコード削除
    $sql_delete = 'DELETE FROM products WHERE id = :id';
    $stmt_delete = $pdo->prepare($sql_delete);
    $stmt_delete->bindValue(':id',$_GET['id'],PDO::PARAM_INT);

    $stmt_delete->execute();
    $count = $stmt_delete->rowCount();
    $message = "商品を{$count}件削除しました。";
    header("Location: read.php?message={$message}");
}catch(PDOEception $e){
    exit($e->getMessage());
}