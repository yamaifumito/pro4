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

    echo "ようこそ、".$_SESSION['user_id']."さん";

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
                    <input type="button" value="ホームへ戻る" id="back_home" onClick="location.href='home.php';">
                    <!-- <p class="desc">どっちを作る？</p> -->
                    <div class="tabs">
                        <input type="radio" id="student" name="tab" checked>
                        <label class="tab" for="student">学生用</label>
                        <!--<input type="radio" id="society" name="tab">
                        <label class="tab" for="society">社会人用</label>-->
                        <div class="tab_contents" id="student_contents">
                            <div class="description">
                                <form method="POST" action="tourokukari.php">
                                    <!-- disabledにしているものは既に登録しているデータを引っ張ってくる想定 -->
									<p>名前:<input type="text" name="name" value="<?php echo $row['Name']; ?>" ></p>
									<p>生年月日:<input type="date" name="date" value="<?php echo $row['Birth']; ?>" ></p>
									<p>性別:<select name="sex"><option value="">-</option><option value="man">男性</option><option value="woman">女性</option></select>
									<!-- or <input type="text" name="sex" value="<//?php echo $row['Sex']; ?>"></p>-->
									<p>電話番号:<input type="tel" name="tel" value="<?php echo $row['Tel']; ?>" ></p>
									<p>メールアドレス: <input type="email" name="email" value="<?php echo $row['address']; ?>" ></p>
									<p>学校名: <input type="text" name="school" value="<?php echo $row['School']; ?>"></p><!-- 登録するときは学校区分あったほうがいいかも -->
									<p>学部・学科: <input type="text" name="department" value="<?php echo $row['Faculty']; ?>"></p>
									<!-- プロフィール写真は略 -->
									<p class="desc">欲しい機能にチェックを入れて追加してください。</p>
									<div class="sel_opts">
										<label for="sel_opt1"><input type="checkbox" name="check1" id="sel_opt1" autocomplete="off">保有資格</label>
										<div class="detail" id="detail1">
											<textarea name="certificate1" cols="80" rows="1" ><?php echo $row['certificate1'] ?></textarea> <!--チェックボックスでの登録は未実装です -->
											<textarea name="certificate2" cols="80" rows="1"><?php echo $row['certificate2'] ?></textarea>
											<textarea name="certificate3" cols="80" rows="1"><?php echo $row['certificate3'] ?></textarea>
											<textarea name="certificate4" cols="80" rows="1"><?php echo $row['certificate4'] ?></textarea>
											<textarea name="certificate5" cols="80" rows="1"><?php echo $row['certificate5'] ?></textarea>
										</div>
										<br>
										<label for="sel_opt2"><input type="checkbox" name="check2" id="sel_opt2" autocomplete="off">あなたの過去エピソード</label>
										<div class="detail" id="detail2">
											<textarea name="past_epi" class="write" cols="80" rows="10"><?php echo $row['past_epi'] ?></textarea>
										</div>
										<br>
										<label for="sel_opt3"><input type="checkbox" name="check3" id="sel_opt3" autocomplete="off">趣味</label>
										<div class="detail" id="detail3">
											<textarea name="hobby" cols="80" rows="1"><?php echo $row['hobby'] ?></textarea>
										</div>
										<br>
										<label for="sel_opt4"><input type="checkbox" name="check4" id="sel_opt4" autocomplete="off">特技</label>
										<div class="detail" id="detail4">
											<textarea name="skill" cols="80" rows="1"><?php echo $row['skill'] ?></textarea>
										</div>
										<br>
										<label for="sel_opt5"><input type="checkbox" name="check5" id="sel_opt5" autocomplete="off">希望勤務地</label>
										<div class="detail" id="detail5">
											<textarea name="workplace" cols="80" rows="1"><?php echo $row['workplace'] ?></textarea>
										</div>
										<br>
										<label for="sel_opt6"><input type="checkbox" name="check6" id="sel_opt6" autocomplete="off">長所</label>
										<div class="detail" id="detail6">
											<textarea name="advantage" class="write" cols="80" rows="10"><?php echo $row['advantage'] ?></textarea>
										</div>
										<br>
										<label for="sel_opt7"><input type="checkbox" name="check7" id="sel_opt7" autocomplete="off">短所</label>
										<div class="detail" id="detail7">
											<textarea name="disadvantage" class="write" cols="80" rows="10"><?php echo $row['disadvantage'] ?></textarea>
										</div>
										<br>
										<label for="sel_opt8"><input type="checkbox" name="check8" id="sel_opt8" autocomplete="off">研究テーマ</label>
										<div class="detail" id="detail8">
											<p class="sel_p">研究テーマ:</p><textarea name="research" cols="80" rows="1"><?php echo $row['research'] ?></textarea>
											<p class="sel_p">研究内容:</p><textarea name="research_content" class="write" cols="80" rows="10"><?php echo $row['research_content'] ?></textarea>
										</div>
										<br>
										<label for="sel_opt9"><input type="checkbox" name="check9" id="sel_opt9" autocomplete="off">希望職種</label>
										<div class="detail" id="detail9">
											<textarea name="job" cols="80" rows="1"><?php echo $row['Preferred_job_type'] ?></textarea>
										</div>
										<br>
										<label for="sel_opt10"><input type="checkbox" name="check10" id="sel_opt10" autocomplete="off">開発経験</label>
										<div class="detail" id="detail10">
											<p class="sel_p">開発したもの1:</p><textarea name="development" cols="80" rows="1"><?php echo $row['development'] ?></textarea>
											<p class="sel_p">外部URL (GitHubなど開発ツール)があれば</p><textarea name="url" cols="50" rows="1"><?php echo $row['url'] ?></textarea>
										</div>
										<br>
										<label for="sel_opt11"><input type="checkbox" name="check11" id="sel_opt11" autocomplete="off">自分の特徴・アピールポイント</label>
										<div class="detail" id="detail11">
											<textarea name="appeal" class="write" cols="80" rows="10"><?php echo $row['appeal'] ?></textarea>
										</div>
										<br>
										<label for="sel_opt12"><input type="checkbox" name="check12" id="sel_opt12" autocomplete="off">座右の銘</label>
										<div class="detail" id="detail12">
											<textarea name="motto" cols="80" rows="1"><?php echo $row['motto'] ?></textarea>
										</div>
										<br>
										<!--<label for="sel_opt13"><input type="checkbox" name="check13" id="sel_opt13" autocomplete="off">就職活動中かどうか</label>
										<div class="detail" id="detail13">
												<select name="act"><option value="">-</option><option value="yes">有り(活動している)</option><option value="no">無し(活動終了)</option></select>
										</div>-->
									</div>
									<p><input type="submit" value="登録する"></p>
								</form>
							</div>
						</div>
                        <!--<div class="tab_contents" id="society_contents">
                            <div class="description">
                                <form method="POST" action="tourokukari.php">-->
                                    <!-- disabledにしているものは既に登録しているデータを引っ張ってくる想定 -->
                                    <!--<p>名前:<input type="text" name="name" value="<//?php echo $row['Name']; ?>" ></p>
									<p>生年月日:<input type="date" name="date" value="<//?php echo $row['Birth']; ?>" ></p>
									<p>性別:<select name="sex"><option value="">-</option><option value="man">男性</option><option value="woman">女性</option></select>-->
									<!-- or <input type="text" name="sex" value="<//?php echo $row['Sex']; ?>"></p>-->
									<!--<p>電話番号:<input type="tel" name="tel" value="<//?php echo $row['Tel']; ?>" ></p>
									<p>メールアドレス: <input type="email" name="email" value="" ></p>
                                    <p>職歴1: <input type="text" name="career1" value="<//?php echo $row['Career_His1']; ?>"></p>
                                    <p>職歴2: <input type="text" name="career2" value=""<//?php echo $row['Career_His2']; ?>""></p>
                                    <p>職歴3: <input type="text" name="career3" value=""<//?php echo $row['Career_His3']; ?>""></p>-->
                                    <!-- プロフィール写真は略 -->
                                    <!--<p class="desc">欲しい機能にチェックを入れて追加してください。</p>
                                    <div class="sel_opts">
                                        <label for="sel_opt14"><input type="checkbox" name="check14" id="sel_opt14" autocomplete="off">保有資格</label>
                                        <div class="detail" id="detail14">
                                            <textarea name="certificate1" cols="80" rows="1"><//?php echo $row['certificate1'] ?></textarea>--> <!--チェックボックスでの登録は未実装です -->
                                            <!--<textarea name="certificate2" cols="80" rows="1"><//?php echo $row['certificate2'] ?></textarea>
                                            <textarea name="certificate3" cols="80" rows="1"><//?php echo $row['certificate3'] ?></textarea>
                                            <textarea name="certificate4" cols="80" rows="1"><//?php echo $row['certificate4'] ?></textarea>
                                            <textarea name="certificate5" cols="80" rows="1"><//?php echo $row['certificate5'] ?></textarea>
                                        </div>
                                        <br>
                                        <label for="sel_opt15"><input type="checkbox" name="check15" id="sel_opt15" autocomplete="off">職務経験</label>
                                        <div class="detail" id="detail15">
                                            <textarea name="past_epi" class="write" cols="80" rows="10"><//?php echo $row['past_epi'] ?></textarea>
                                        </div>
                                        <br>
                                        <label for="sel_opt16"><input type="checkbox" name="check16" id="sel_opt16" autocomplete="off">趣味</label>
                                        <div class="detail" id="detail16">
                                            <textarea name="hobby" cols="80" rows="1"><//?php echo $row['hobby'] ?></textarea>
                                        </div>
                                        <br>
                                        <label for="sel_opt17"><input type="checkbox" name="check17" id="sel_opt17" autocomplete="off">特技</label>
                                        <div class="detail" id="detail17">
                                            <textarea name="skill" cols="80" rows="1"><//?php echo $row['skill'] ?></textarea>
                                        </div>
                                        <br>
                                        <label for="sel_opt18"><input type="checkbox" name="check18" id="sel_opt18" autocomplete="off">キャリアプラン</label>
                                        <div class="detail" id="detail18">
                                            <textarea name="careerplan" class="write" cols="80" rows="10"></textarea>
                                        </div>
                                        <br>
                                        <label for="sel_opt19"><input type="checkbox" name="check19" id="sel_opt19" autocomplete="off">開発経験</label>
                                        <div class="detail" id="detail19">
                                            <p class="sel_p">開発したもの1:</p><textarea name="development" cols="80" rows="1"><//?php echo $row['development'] ?></textarea>
                                            <p class="sel_p">外部URL (GitHubなど開発ツール)があれば</p><textarea name="url" cols="50" rows="1"><//?php echo $row['url'] ?></textarea>
                                        </div>
                                        <br>
                                        <label for="sel_opt20"><input type="checkbox" name="check20" id="sel_opt20" autocomplete="off">希望職種</label>
                                        <div class="detail" id="detail20">
                                            <textarea name="job" cols="80" rows="1"></textarea>
                                        </div>
                                    </div>
                                    <p><input type="submit" value="登録する"></p>
                                </form>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
