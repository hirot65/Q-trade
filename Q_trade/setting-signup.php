
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
            <span class = "home">新規作成</span>
            <div></div>
            <div class="syo">消防署としてログイン</div>
        </div>
        <div class="main">
            <!-- formを使用してregist.phpにnameに入った文字をとばす(post使用)。そこでSQLに登録する処理をする。 -->
            <form method="post" action="regist.php">
                <p>
                    <a>資機材名<a>
                    <input type="text" name="name" placeholder="20文字以内">
                </p>
                <p>
                    <a>キーワード<a>
                    <input type="text" name="keyword" placeholder="10文字以内">
                </p>
                <p>
                    <a>単位<a>
                    <select name="unit" value="個">
                        <option>個</option>
                        <option>箱</option>
                        <option>枚</option>
                    </select>
                </p>
                <p>
                    <input type="submit" value="登録">
                </p>
            </form>
        </div>



        <script type="text/javascript" src="main.js"></script>
     </body>
     <footer>

        



     </footer>
</html> 

<?php
$db=null;//データベースの切断（最後にデータベースとは切断しておく）
?>
