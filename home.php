<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>ホーム画面</title>
    <?php
        session_start();
        header('Expires:-1');
        header('Cache-Control:');
        header('Pragma:');

		$userid = isset($_POST['userid'])?
        $_POST['userid']: null;
        $password = isset($_POST['password'])?
        $_POST['password']: null;

        if(!empty($userid) && !empty($password)){
            $option = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            $conn = new PDO("mysql:host=localhost;dbname=meitell;charset=utf8",
                "root", "test", $option);
            $sql = "SELECT * FROM user "
                ."WHERE User_ID ='{$userid}' AND "
                ."Password='{$password}'";
            $result = $conn->query($sql);
            $u = $result->fetch();
            if(!empty($u)){
                $_SESSION['user_id'] = $userid;
                echo "ようこそ、".$_SESSION['user_id']."さん";
            }else{
                echo '認証できませんでした';
            }
        }else{
            header("location: ./title.html");
        }
    ?>
</head>
<body>
<div id="page_all">
    <div id="header"></div>
    <div id="menu_contents_wrap">
        <div id="contents_wrap">
            <!-- 左に表示させるメニュー(予定なのでまだ追加していません)
            <div id="menu_area">
                <div id="menu_wrap">
                    <ul id="menu">
                        <li id="menu_top">トップへ戻る</li>
                        <li id="menu_registration">名刺を登録する</li>
                        <li id="menu_check">名刺を確認する</li>
                        <li id="menu_notice">運営からのお知らせ</li>
                        <li id="menu_help">ヘルプ</li>
                        <li id="menu_inquiry">お問い合わせ</li>
                    </ul>
                </div>
            </div>
            -->
            <div id="contents_area">
                <input type="button" value="ログアウト" id="logout" onClick="location.href='logout.php';">
                <p class="desc">プロフィールの確認・登録はこちら</p>
                <input type="button" value="確認" onClick="location.href='create.php'">
                <p class="desc">名刺の印刷はこちら</p>
                <input type="button" value="確認" onClick="location.href='print.php'">
                <!-- <p class="desc">制作した名刺の確認はこちら</p>
                <input type="button" value="確認する" onClick="window.open('https://toarise.tales-ch.jp/');">
                <p class="desc">個人情報の確認・変更はこちら</p>
                <input type="button" value="確認する" id="Change" onClick="location.href='form.php';"> -->
            </div>
        </div>
    </div>
</div>
</body>
</html>
