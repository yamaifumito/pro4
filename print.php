<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no,width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="app.js"></script>
    <title>MeiTell replica</title>
</head>
<body>
    <?php
    session_start();
    header('Expires:-1');
    header('Cache-Control:');
    header('Pragma:');



	$option = array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	);
	$conn = new PDO("mysql:host=localhost;dbname=meitell;charset=utf8",
		"root", "test", $option);
	$row = null;
    $userid = $_SESSION['user_id'];

	$sql = "SELECT * FROM user_info WHERE User_ID = '$userid'";
	$stmt = $conn -> query($sql);
	$row = null;

	foreach ($stmt as $row){}

	if($row == null){
		$sql_insert=$conn->prepare("INSERT INTO user_info(User_ID,Name,Birth,Sex,Tel,address,School,Faculty,Career_His1,Career_His2,Career_His3,certificate1,certificate2,certificate3,certificate4,certificate5,past_epi,hobby,skill,workplace,advantage,disadvantage,research,research_content,Preferred_job_type,development,url,appeal,motto)
		VALUES('{$userid}','','','','','',null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,'',null,null,null,'')");
		$sql_insert->execute();
	}
?>
    <div id="page-all">
        <div id="header">
            <input type="button" value="ログアウト" id="logout" onClick="location.href='logout.php';">
        </div>
        <div id="menu_contents_wrap">
            <div id="contents_wrap">

                <div id="contents_area">
                    <input type="button" value="ホームへ戻る" id="back_home" onClick="location.href='home.php';">



                                    <!-- disabledにしているものは既に登録しているデータを引っ張ってくる想定 -->
									<p>名前:<?php echo $row['Name']; ?> </p>
									<p>電話番号:<?php echo $row['Tel']; ?>" </p>
									<p>メールアドレス: <?php echo $row['address']; ?></p>
									<p>学校名:<?php echo $row['School']; ?></p>
									<p>学部・学科<?php echo $row['Faculty']; ?></p>


										<br>

									</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
