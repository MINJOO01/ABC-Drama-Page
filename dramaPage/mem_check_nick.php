<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>닉네임 확인</title>
<link rel="stylesheet" type="text/css" href="./css/member.css">
<style>
h3 {
   padding-left: 5px;
   border-left: solid 5px #729c97;
}
#close {
   margin:20px 0 0 80px;
   cursor:pointer;
}
</style>
</head>
<body>
<h3>닉네임 중복체크</h3>
<p>
<?php
   $nick = $_GET["nick"];

   if(!$nick) 
   {
      echo("<li>닉네임을 입력해 주세요.</li>");
   }
   else
   {
      $con = mysqli_connect("localhost", "root", "", "dramaproject");

 
      $sql = "select * from members where nick='$nick'";
      $result = mysqli_query($con, $sql);

      $num_record = mysqli_num_rows($result);

      if ($num_record)
      {
         echo "<li>".$nick."닉네임은 이미 존재하는 닉네임입니다.</li>";
         echo "<li>다른 닉네임을 사용해 주세요.</li>";
      }
      else
      {
         echo "<li>".$nick." 닉네임은 사용 가능합니다.</li>";
      }
    
      mysqli_close($con);
   }
?>
</p>
<div id="close">
    <input type=button value="닫기" id="check_close_button" onclick="javascript:self.close()" style="cursor:pointer">
</div>
</body>
</html>

