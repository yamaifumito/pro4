<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登録しました</title>
</head>

<body>
<?php
	$option = array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	);
	$conn = new PDO("mysql:host=localhost;dbname=meitell;charset=utf8",
		"root", "test", $option);

	session_start();
    $userid = $_SESSION['user_id'];

	$name = isset($_POST['name'])?
		$_POST['name']: null;
	$date = isset($_POST['date'])?
		$_POST['date']: null;
	$sex = isset($_POST['sex'])?
		$_POST['sex']: null;
	$tel = isset($_POST['tel'])?
		$_POST['tel']: null;
	$address = isset($_POST['email'])?
		$_POST['email']: null;
	$school = isset($_POST['school'])?
		$_POST['school']: null;
	$department = isset($_POST['department'])?
		$_POST['department']: null;
	$career1 = isset($_POST['career1'])?
		$_POST['career1']: null;
	$career2 = isset($_POST['career2'])?
		$_POST['career2']: null;
	$career3 = isset($_POST['career3'])?
		$_POST['career3']: null;
	$certificate1 = isset($_POST['certificate1'])?
		$_POST['certificate1']: null;
	$certificate2 = isset($_POST['certificate2'])?
		$_POST['certificate2']: null;
	$certificate3 = isset($_POST['certificate3'])?
		$_POST['certificate3']: null;
	$certificate4 = isset($_POST['certificate4'])?
		$_POST['certificate4']: null;
	$certificate5 = isset($_POST['certificate5'])?
		$_POST['certificate5']: null;
	$past_epi = isset($_POST['past_epi'])?
		$_POST['past_epi']: null;
	$hobby = isset($_POST['hobby'])?
		$_POST['hobby']: null;
	$skill = isset($_POST['skill'])?
		$_POST['skill']: null;
	$workplace = isset($_POST['workplace'])?
		$_POST['workplace']: null;
	$advantage = isset($_POST['advantage'])?
		$_POST['advantage']: null;
	$disadvantage = isset($_POST['disadvantage'])?
		$_POST['disadvantage']: null;
	$research = isset($_POST['research'])?
		$_POST['research']: null;
	$research_content = isset($_POST['research_content'])?
		$_POST['research_content']: null;
	$preferred_job_type = isset($_POST['job'])?
		$_POST['job']: null;
	$development = isset($_POST['development'])?
		$_POST['development']: null;
	$url = isset($_POST['url'])?
		$_POST['url']: null;
	$appeal = isset($_POST['appeal'])?
		$_POST['appeal']: null;
	$motto = isset($_POST['motto'])?
		$_POST['motto']: null;

	if(!empty($userid)){
		$sql_update = $conn->prepare("UPDATE user_info SET Name=:name,Birth=:date,Sex=:sex,Tel=:tel,address=:address,School=:school,Faculty=:department,Career_His1=:career1,Career_His2=:career2,Career_His3=:career3,certificate1=:certificate1,certificate2=:certificate2,certificate3=:certificate3,certificate4=:certificate4,certificate5=:certificate5,past_epi=:past_epi,hobby=:hobby,skill=:skill,workplace=:workplace,advantage=:advantage,disadvantage=:disadvantage,research=:research,research_content=:research_content,Preferred_job_type=:preferred_job_type,development=:development,url=:url,appeal=:appeal,motto=:motto WHERE User_ID = '$userid'");

		$sql_update->execute(array(':name' => $name,':date' => $date,':sex' => $sex,':tel' => $tel,':address' => $address,':school' => $school,':department' => $department,':career1' => $career1,':career2' => $career2,':career3' => $career3,':certificate1' => $certificate1,':certificate2' => $certificate2,':certificate3' => $certificate3,':certificate4' => $certificate4,':certificate5' => $certificate5,':past_epi' => $past_epi,':hobby' => $hobby,':skill' => $skill,':workplace' => $workplace,':advantage' => $advantage,':disadvantage' => $disadvantage,':research' => $research,':research_content' => $research_content,'preferred_job_type' => $preferred_job_type,':development' => $development,':url' => $url,':appeal' => $appeal,':motto' => $motto));


		//$sql_update->execute(array(':name' => $name,':date' => $date,':sex' => $sex,':tel' => $tel,':address' => $address,':school' => $school,':department' => $department,':career1' => $career1,':career2' => $career2,':career3' => $career3,':certificate1' => $certificate1,':certificate2' => $certificate2,':certificate3' => $certificate3,':certificate4' => $certificate4,':certificate5' => $certificate5,':past_epi' => $past_epi,':hobby' => $hobby,':skill' => $skill,':workplace' => $workplace,':advantage' => $advantage,':disadvantage' => $disadvantage,':research' => $research,':research_content' => $research_content,':preferredjobtype' => $preferredjobtype,':development' => $development,':url' => $url,':appeal' => $appeal,':motto' => $motto));
		echo "登録完了";
	}

?>
    <br />
	<a href="logout.php">ログアウトする</a>

</body>
</html>
