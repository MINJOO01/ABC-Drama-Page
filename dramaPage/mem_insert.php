<?php
    $id   = $_POST["id"];
    $pass = $_POST["pass"];
    $nick = $_POST["nick"];
    $name = $_POST["name"];
    $email1  = $_POST["email1"];
    $email2  = $_POST["email2"];
    
    $email = $email1."@".$email2;
    $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

              
    $con = mysqli_connect("localhost", "root", "", "dramaproject");

	$sql = "insert into members(id, pw, nick, name, email, registDay, level, point) ";
	$sql .= "values('$id', '$pass', '$nick', '$name', '$email', '$regist_day', '새싹', 0)";

	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>

   
