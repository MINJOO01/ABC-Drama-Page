<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>드라마 홈페이지</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/viewer.css">
</head>
<body> 
<header>
    <?php 
    include "header.php";

	if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";

    if ( !$userid )
    {
        echo("
                    <script>
                    alert('회원만 이용 가능합니다. 로그인 후 이용 부탁드립니다.');
                    history.go(-1)
                    </script>
        ");
                exit;
    }
	
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";

    if ( $userlevel == '새싹' )
    {
        echo("
                    <script>
                    alert('잎새 레벨부터 게시글 내용을 볼 수 있습니다. 다른 사람의 게시글을 보려면, 게시글 작성 후 등업 신청해주세요.');
                    history.go(-1)
                    </script>
        ");
                exit;
    }
    ?>
</header> 

<section>
	<div id="main_img_bar">
        <img src="./img/main_img.png">
    </div>

   	<div id="board_box">
	    <h3 class="title">
			시청자 게시판 > 내용보기
		</h3>
<?php
	$num = $_GET["num"];
	$page = $_GET["page"];

	$con = mysqli_connect("localhost", "root", "", "dramaproject");
	$sql = "select * from board where num=$num";
	$result = mysqli_query($con, $sql);

	$row = mysqli_fetch_array($result);
	$id = $row["id"];
	$nick = $row["nick"];
	$registDay = $row["registDay"];
	$subject = $row["subject"];
	$content = $row["content"];
	$hit = $row["hit"];

	$content = str_replace(" ", "&nbsp;", $content);
	$content = str_replace("\n", "<br>", $content);

	$new_hit = $hit + 1;
	$sql = "update board set hit=$new_hit where num=$num";   
	mysqli_query($con, $sql);
?>		
	    <ul id="view_content">
			<li>
				<span class="col1"><b>제목 :</b> <?=$subject?></span>
				<span class="col2"><?=$nick?> | <?=$registDay?></span>
			</li>
			<li>
				<?=$content?>
			</li>		
	    </ul>
	    <ul class="buttons">
			<?php
			if($userid == $id)
			{
				?>
				<li><button onclick="location.href='viewer_board_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button></li>
				<li><button onclick="location.href='viewer_board_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button></li>
				<?php
			}
			?>
				<li><button onclick="location.href='viewer_board_list.php?page=<?=$page?>'">목록</button></li>
				<li><button onclick="location.href='viewer_board_form.php'">새로운 글쓰기</button></li>
		</ul>
	</div>
	
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
