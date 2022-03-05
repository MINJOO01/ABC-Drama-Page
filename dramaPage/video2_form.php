<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>드라마 홈페이지</title>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
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
    
        if ( $userlevel != '나무' and $userlevel !='관리자' )
        {
            echo("
                        <script>
                        alert('나무 레벨이 아닙니다. 풀 영상은 나무 레벨만 이용 가능합니다.');
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
    <?php include "video2_view.php";?>
</section>
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>