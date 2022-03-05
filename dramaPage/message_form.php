<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>드라마 홈페이지</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/msg.css">
<script>
  function check_input() {
  	  if (!document.message_form.rv_id.value)
      {
          alert("상대의 닉네임을 입력하세요.");
          document.message_form.rv_id.focus();
          return;
      }
      if (!document.message_form.subject.value)
      {
          alert("제목을 입력하세요.");
          document.message_form.subject.focus();
          return;
      }
      if (!document.message_form.content.value)
      {
          alert("내용을 입력하세요.");    
          document.message_form.content.focus();
          return;
      }
      document.message_form.submit();
   }
</script>
</head>
<body> 
<header>
    <?php include 
	"header.php";
	if($userlevel=='새싹' or $userlevel=='잎새')
	{
		echo("
		<script>
		alert('열매 레벨부터 쪽지 기능을 이용할 수 있습니다. 쪽지 기능을 이용하시려면, 게시글 작성 후 등업 신청 바랍니다.');
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
   	<div id="message_box">
	    <h3 id="write_title">
	    		쪽지 보내기
		</h3>
		<ul class="top_buttons">
				<li><span><a href="message_box.php?mode=rv">수신 쪽지함 </a></span></li>
				<li><span><a href="message_box.php?mode=send">송신 쪽지함</a></span></li>
		</ul>
	    <form  name="message_form" method="post" action="message_insert.php?send_id=<?=$usernick?>">
	    	<div id="write_msg">
	    	    <ul>
				<li>
					<span class="col1">보내는 이 : </span>
					<span class="col2"><?=$usernick?></span>
				</li>	
				<li>
					<span class="col1">받는 이: </span>
					<span class="col2"><input name="rv_id" type="text"></span>
				</li>	
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text"></span>
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2">
	    				<textarea name="content"></textarea>
	    			</span>
	    		</li>
	    	    </ul>
	    	    <button type="button" onclick="check_input()">보내기</button>
	    	</div>	    	
	    </form>
	</div>
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
