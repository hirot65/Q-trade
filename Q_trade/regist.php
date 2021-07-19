<?php
    $dsn='mysql:dbname=Q_trade2;host=localhost;charset=utf8';//;が無いだけで表示が真っ白になってしまう。
    $user='root';
    $pass='root';
    try{
        $db=new PDO($dsn,$user,$pass);
        echo"接続OKdayo";

        //setting-signup.phpから受け取る
        $name=$_post['name'];
        $keyword=$_post['keyword'];
        $unit=$_post['unit'];
        //これらを下の文法に代入する

        //ここから登録用のSQL作成//////////////////////////////////
        $stmt=$db->prepare('INSERT INTO shomo (name,keyword,unit)VALUES(:name,:keyword,:unit)');//prepare関数を使ってSQLを留めておく。最後にexcuteを実行するとsqlが実行される。
        $stmt->bindParam(':name',$name,PDO::PARAM_STR);//bindparmで:nameに対して$nameをわたす。$nameはここより先に代入しても大丈夫。:nameはSQLに渡す変数。:nameは？をつかってもよい　PDO::PARM_STRは「これはstring(文字列)だよ」の意味
        $stmt->bindParam(':keyword',$keyword,PDO::PARAM_STR);//bindvalueにすると変数じゃなく数字をそのまま挿入することもできる。
        $stmt->bindParam(':unit',$unit,PDO::PARAM_STR);
        $stmt->execute();
        //ここまで登録のSQL
        //$db=null;//データベースの切断（最後にデータベースとは切断しておく）
    }catch(PDOException $e){
        echo'DBエラー'.$e->getMessage();
    }



$db=null//データベースの切断
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
            <span class = "home">新規作成</span>
            <div></div>
            <div class="syo">消防署としてログイン
              <?php
              echo "$name";
              ?>
            </div>
        </div>
        <div class="main">
            
        </div>



        <script type="text/javascript" src="main.js"></script>
     </body>
     <footer>

        



     </footer>
</html> 
