<meta charset="utf-8">
<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["usernick"])) $usernick = $_SESSION["usernick"];
    else $usernick = "";

    if ( !$userid )
    {
        echo("
                    <script>
                    alert('게시판 글쓰기는 로그인 후 이용해 주세요!');
                    history.go(-1)
                    </script>
        ");
                exit;
    }

    $subject = $_POST["subject"];
    $content = $_POST["content"];

	$subject = htmlspecialchars($subject, ENT_QUOTES);
	$content = htmlspecialchars($content, ENT_QUOTES);

	$registDay = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

	$con = mysqli_connect("localhost", "root", "", "dramaproject");

	$sql = "insert into board (id, nick, subject, content, registDay, hit) ";
	$sql .= "values('$userid', '$usernick', '$subject', '$content', '$registDay', 0 )";
	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

	// 포인트 부여하기
  	$point_up = 1000;

	$sql = "select point from members where id='$userid'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$new_point = $row["point"] + $point_up;
	
	$sql = "update members set point=$new_point where id='$userid'";
	mysqli_query($con, $sql);

	mysqli_close($con);               

	echo "
	   <script>
	    location.href = 'viewer_board_list.php';
	   </script>
	";
?>

  
