
 <?php
    $dsn='mysql:dbname=Q_trade2;host=localhost;charset=utf8';//;が無いだけで表示が真っ白になってしまう。
    $user='root';
    $pass='root';
    try{
        $db=new PDO($dsn,$user,$pass);
        echo"接続OKdayo";
        $sql='SELECT * FROM shomo';//ここにデータベース名（Q_trade2）を間違えて入れていて苦戦。rowcountの文を入力すると画面が真っ白になる。
        $sth=$db->query($sql);//queryメソッドを使ってsqlを実行
        $count = $sth->rowCount();//行数を確認できる
        //$db=null;//データベースの切断（最後にデータベースとは切断しておく）
    }catch(PDOException $e){
        echo'DBエラー'.$e->getMessage();
    }
?>
 <!DOCTYPE html>
 <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>Qtrade</title>
    </head>
     <body>
        <div class="header">
            <a class="Qtrade" href='index.php'>Q-trade</a>
            <span class = "home">ホーム画面</span>
            <div></div>
            <div class="syo">消防署としてログイン</div>
        </div>
        <div class="main">
            <div class="tap">
                <a href="seikyu.html" class="btn b1">消耗品請求<!-- facebookマークでない --><!-- <span class="fa fa-facebook"></span>  --></a>
                <a href="seikyu.html" class="btn b2">資機材貸し借り</a>
                <a href="seikyu.html" class="btn b3">在庫調査</a>
            </div>
            <div class="container">
                <div class="right-box">
                <p>【貸し出し中資機材】</p>
                <div class="box"><?php echo $count; ?></div>
                </div>
                <div class="left-box">
                <p>【借用中資機材】</p>
                <div class="box">
                    <?php
                 foreach($db->query($sql) as $row){
                    echo($row['id']);
                    echo($row['name']);
                    echo($row['keyword'].'<br>');//brで改行しながらechoとforeachで出力
                }
                ?> 
            </div>
                </div>
            </div>
        </div>
     </body>
     <footer>

        



     </footer>
</html> 

<?php
$db=null;//データベースの切断（最後にデータベースとは切断しておく）
?>
