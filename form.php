 <?php
 //参考サイト　http://php.dori-mu.net/session.html
 //pho manual http://php.net/manual/ja/index.php
 //



//関数ファイルを読み込む
require_once("function.php");

//初期設定関数の呼び出し
init();

//エラーで戻ってきた場合、保存していた値をフォームに表示する
$name = htmlspecialchars($_SESSION["name"],ENT_QUOTES);
$mail = htmlspecialchars($_SESSION["mail"],ENT_QUOTES);
$comment = htmlspecialchars($_SESSION["comment"],ENT_QUOTES);

//エラー情報をクリアする
$error_mes = $_SESSION["error_mes"];
$_SESSION["error_mes"] = "";


//mysqlとコネクト　変更
$link = mysql_connect('localhost', 'root' '19930721');
$link = mysql_connect('127.0.0.1:3307', 'root', '19930721');


// HTMLを出力する（フォーム）
print <<<EOF
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"
charset="EUC-JP">
<title>掲示板書き込みフォーム</title>
<style type="text/css">
    * { margin: 0px; padding: 0px; }
    body { margin-left: 10%; margin-right: 10%; 
padding-bottom: 1em; color: #333333; background-color: #E0E0E0;}
    h1 { padding: 10px; border: 1px solid #BDBDBD; 
font-size: 1.2em; color: #545454; background-color: #FFFFFF; }
    hr { display: none; }
    table { margin-bottom: 1em;  }
    dt { clear: left; float: left; width: 5em; 
margin-bottom: 5px; }
    dd { margin-bottom: 5px; }
    form {margin-bottom: 1em; padding: 10px; 
border-left: 1px solid #BDBDBD; border-bottom: 1px solid #BDBDBD; 
border-right: 1px solid #BDBDBD; color: #333333; 
background-color: #EAEAEA; }
    #name, #mail { width: 15em; }
    #submit { font-size: 1em; margin-left: 5em; }
    .message { padding: 10px; margin-bottom: 1em; 
border: 1px solid #CBCBCB; color: #333333; 
background-color: #F9F9F9;}
    .msg-label { color: #666666; background-color: transparent; }
    .msg-body {margin-left: 5em; }
    #navigation { text-align: right; }
</style>
</head>
<body>
<h1>掲示板</h1>
<form action="conf.php" method="post">
<dl>
    <dd><font color="#FF0000">$error_mes</font></dd>
</dl>
<dl>
    <dt><label for="name">名前</label></dt>
    <dd><input type="text" id="name" name="name" value="$name">
</dd>
    <dt><label for="title">メール</label></dt>
    <dd><input type="text" id="mail" name="mail" value="$mail">
</dd>
    <dt><label for="body">コメント</label></dt>
    <dd><textarea id="body" name="body" cols="40" rows="10">$body
</textarea></dd>
</dl>
<input type="submit" id="submit" value="確認">
</form>
EOF;



// HTML出力する（表示）
for($i=0;$i<10;$i++){

$data[$i]["name"] 
  = htmlspecialchars($data[$i]["name"],ENT_QUOTES);
$data[$i]["mail"] 
  = htmlspecialchars($data[$i]["mail"],ENT_QUOTES);
$data[$i]["comment"] 
  = nl2br(htmlspecialchars($data[$i]["comment"],ENT_QUOTES));

print <<<EOF
<hr>
<dl class="message">
        <dt class="msg-label">投稿日時</dt>
        <dd class="msg-date">{$data[$i]["date"]}</dd>
        <dt class="msg-label">名前</dt>
        <dd class="msg-name">{$data[$i]["name"]}</dd>
        <dt class="msg-label">メールアドレス</dt>
        <dd class="msg-title">{$data[$i]["mail"]}</dd>
        <dt class="msg-label">コメント</dt>
        <dd class="msg-body">{$data[$i]["comment"]}</dd>
</dl>


EOF;
}

print "<hr>\n";





//100件の
    if($page["next"]) {
    print "<a href=\"./form.php?p={$page["next"]}\">過去の100件を見る</a>";
   
    for($i=0;$i<100s;$i++){
    $data[$i]["name"] 
      = htmlspecialchars($data[$i]["name"],ENT_QUOTES);
    $data[$i]["mail"] 
      = htmlspecialchars($data[$i]["mail"],ENT_QUOTES);
    $data[$i]["comment"] 
      = nl2br(htmlspecialchars($data[$i]["comment"],ENT_QUOTES));
}



// HTMLを出力する（終わり）
print <<<EOF
</body>
</html>
EOF;
?> 