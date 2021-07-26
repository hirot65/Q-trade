<?php
    $dsn='mysql:dbname=Q_trade2;host=localhost;charset=utf8';//;が無いだけで表示が真っ白になってしまう。
    $user='root';
    $pass='root';
    try{
        $db=new PDO($dsn,$user,$pass);
        echo"接続OKdayo";
      
        //setting-signup.phpから受け取る
        $name =$_POST["name"];//POSTをpostと小文字で作成して苦戦。絶対大文字で！！
        $keyword=$_POST["keyword"];
        $unit=$_POST["unit"];
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

    header("Location:setting.php");//ここで処理を行った後に、すぐにsetting.phpに遷移する。


$db=null//データベースの切断
?>

</html> 

