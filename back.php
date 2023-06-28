<?php
$do = $_GET['do'] ?? 'mvim';
include "base.php";
if(!isset($_SESSION['login'])){
    to("index.php");
}
$DB = new DB($do);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>後台系統</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="./js/jquery-1.9.1.min.js"></script>
    <script src="./js/js.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div id="cover" style="display:none; ">
        <div id="coverr">
            <a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl('#cover')">X</a>
            <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;">

            </div>
        </div>
    </div>
    <div id="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-2">
                    <div class="sidebar">
                        <div class="d-flex flex-column  p-3 text-white bg-dark" style=" height:100vh;">

                            <span class="fs-4 text-center">後台管理</span>

                            <hr>
                            <ul class="nav nav-pills flex-column">
                              
                                <li class="nav-item mb-3">
                                    <a href="?do=mvim" class="nav-link btn btn-secondary text-white">
                                    網頁作品管理
                                    </a>
                                </li>
                                <li class="nav-item mb-3">
                                    <a href="?do=image" class="nav-link btn btn-secondary text-white">
                                    PS/AI作品管理
                                    </a>
                                </li>
                                <li class="nav-item mb-3">
                                    <a href="?do=news" class="nav-link btn btn-secondary text-white">
                                        履歷管理
                                    </a>
                                </li>
                                <hr>
                                <li class="nav-item mb-3 ">
                                    <a href="./api/logout.php" class="nav-link btn btn-danger text-white">
                                        登出
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div id="ms">

                        <div class="di">
                            <!--正中央-->

                            <?php

                            $file = "./back/" . $do . ".php";
                            if (file_exists($file)) {
                                include $file;
                            } else {
                                include "./back/mvim.php";
                            }

                            ?>
                        </div>
                        <div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
                        </div>
                        <script>
                            $(".sswww").hover(
                                function() {
                                    $("#alt").html("" + $(this).children(".all").html() + "").css({
                                        "top": $(this).offset().top - 50
                                    })
                                    $("#alt").show()
                                }
                            )
                            $(".sswww").mouseout(
                                function() {
                                    $("#alt").hide()
                                }
                            )
                        </script>
                    </div>
                </div>
            </div>
        </div>


    </div>

</body>

</html>