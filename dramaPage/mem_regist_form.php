<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>드라마 게시판</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/member.css">
<script>
   function check_input()
   {
      if (!document.mem_regist_form.id.value) {
          alert("아이디를 입력하세요.");    
          document.mem_regist_form.id.focus();
          return;
      }

      if (!document.mem_regist_form.pass.value) {
          alert("비밀번호를 입력하세요.");    
          document.mem_regist_form.pass.focus();
          return;
      }

      if (!document.mem_regist_form.pass_confirm.value) {
          alert("비밀번호 확인을 입력하세요.");    
          document.mem_regist_form.pass_confirm.focus();
          return;
      }

      if (!document.mem_regist_form.name.value) {
          alert("이름을 입력하세요.");    
          document.mem_regist_form.name.focus();
          return;
      }

      if (!document.mem_regist_form.email1.value) {
          alert("이메일 주소를 입력하세요.");    
          document.mem_regist_form.email1.focus();
          return;
      }

      if (!document.mem_regist_form.email2.value) {
          alert("이메일 주소를 입력하세요.");    
          document.mem_regist_form.email2.focus();
          return;
      }

      if (document.mem_regist_form.pass.value != 
            document.mem_regist_form.pass_confirm.value) {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요.");
          document.mem_regist_form.pass.focus();
          document.mem_regist_form.pass.select();
          return;
      }

      if (!document.mem_regist_form.nick.value) {
          alert("닉네임을 입력하세요.");
          document.mem_regist_form.nick.focus();
          return;
      }

      document.mem_regist_form.submit();
   }

   function reset_form() {
      document.mem_regist_form.id.value = "";  
      document.mem_regist_form.pass.value = "";
      document.mem_regist_form.pass_confirm.value = "";
      document.mem_regist_form.name.value = "";
      document.mem_regist_form.email1.value = "";
      document.mem_regist_form.email2.value = "";
      document.mem_regist_form.nick.value = "";
      document.mem_regist_form.id.focus();
      return;
   }

   function check_id() {
     window.open("mem_check_id.php?id=" + document.mem_regist_form.id.value,
         "IDcheck",
          "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
   }

   function check_nick() {
    window.open("mem_check_nick.php?nick=" + document.mem_regist_form.nick.value,
         "NICKcheck",
          "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
   }
</script>
</head>
<body> 
	<header>
    	<?php include "header.php";?>
    </header>
	<section>
		<div id="main_img_bar">
            <img src="./img/main_img.png">
        </div>
        <div id="main_content">
      		<div id="join_box">
          	<form  name="mem_regist_form" method="post" action="mem_insert.php">
			    <h2>회원 가입</h2>
    		    	<div class="form id">
				        <div class="col1">아이디</div>
				        <div class="col2">
							<input type="text" name="id">
				        </div>  
				        <div class="col3">
                            <input type="button" value="중복확인" onclick="check_id()" style="cursor:pointer">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>

			       	<div class="form">
				        <div class="col1">비밀번호</div>
				        <div class="col2">
							<input type="password" name="pass">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">비밀번호 확인</div>
				        <div class="col2">
							<input type="password" name="pass_confirm">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>

                       <div class="form nick">
				    <div class="col1">닉네임</div>
				    <div class="col2">
						<input type="text" name="nick">
				    </div>  
				    <div class="col3">
                        <input type="button" value="중복확인" onclick="check_nick()" style="cursor:pointer">
				    </div>                 
			       	</div>
			       	<div class="clear"></div> 
                       
			       	<div class="form">
				        <div class="col1">이름</div>
				        <div class="col2">
							<input type="text" name="name">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
                    
                    
                       
			       	<div class="form email">
				        <div class="col1">이메일</div>
				        <div class="col2">
							<input type="text" name="email1">@<input type="text" name="email2">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="bottom_line"> </div>
			       	<div class="buttons">
                        <input type="button" value="가입하기" onclick="check_input()" style="cursor:pointer">&nbsp;
                        <input type="button" value="초기화" id="reset_button" onclick="reset_form()" style="cursor:pointer">      
	           		</div>
           	</form>
        	</div> <!-- join_box -->
        </div> <!-- main_content -->
	</section> 
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>

