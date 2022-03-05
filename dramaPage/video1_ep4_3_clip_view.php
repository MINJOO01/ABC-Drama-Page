<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>드라마 홈페이지</title>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/video1.css">
</head>
<body>
<header>
    <?php include "header.php";?>
</header>
<section>
<div id="main_img_bar">
    <img src="./img/main_img.png">
</div>
<div class="video_content_area">
    <h2>클립</h2>
    <div class="player_area" id="video_wrap" style="height:400px;">
        <video height="380" width="680" controls>
            <source src="./video/clip/ep4/ep4_3.mp4" type="video/mp4">
            동영상 기능을 지원하지 않는 브라우저입니다. 다시 시도해주십시오.
        </video>
    </div>
</div>
<div class="video_info">
    <div class="vod-sub">
        <span class="date">2022.03.22</span>
    </div>
    <h4 class="vod-title">4화 세번째 클립</h4>
</div>
</section>
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>