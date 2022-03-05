<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";
    if (isset($_SESSION["usernick"])) $usernick = $_SESSION["usernick"];
    else $usernick = "";

?>		
        <div id="top">
            <h2>
                <a href="index.php">드라마</a>
            </h2>
            <ul id="top_menu">  
<?php
    if(!$userid) {
?>                
                <li><a href="mem_regist_form.php">회원 가입</a> </li>
                <li> | </li>
                <li><a href="mem_login_form.php">로그인</a></li>
<?php
    } else {
                $logged = $usernick."님 환영합니다. | ".$userlevel." 레벨 | ".$userpoint." 포인트";
?>
                <li><?=$logged?> </li>
                <li> | </li>
                <li><a href="mem_logout.php">로그아웃</a> </li>
                <li> | </li>
                <li><a href="mem_modify_form.php">내 정보</a></li>
                <li> | </li>
                <li><a href="message_form.php">쪽지함</a></li>
<?php
    }
?>
<?php
    if($userlevel=='관리자') {
?>
                <li> | </li>
                <li><a href="admin.php">관리자 모드</a></li>
<?php
    }
?>
            </ul>
        </div>
        <div id="menu_bar">
            <ul>  
                <li><a href="index.php">HOME</a></li> 
                <li><a href="intro_form.php">프로그램 정보</a></li>
                <li><a href="video1_form.php">클립 영상</a></li>
                <li><a href="video2_form.php">다시보기</a></li>
                <li><a href="viewer_board_list.php">시청자 게시판</a></li>
            </ul>
        </div>