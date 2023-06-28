<?php
$do = $_GET['do'] ?? 'main';
include "base.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile</title>
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/style2.css" />
  <link rel="stylesheet" href="plugins/animate/animate.css" />
  <link href="plugins/fontawesome/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Comfortaa:700|Noto+Sans+TC&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <!-- ONCONTEXTMENU="return false" onSelectStart="return false"禁止右鍵選擇複製 -->
  <div class="bar">
    <div class="bar-container">
      <div class="bar-actually" id="myBar"></div>

    </div>
  </div>
  <nav id="side-nav" class="navbar navbar-expand-lg navbar-dark bg-dark p-4 p-lg-5 fixed-top">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#about">關於我<br />About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#experience">經歷<br />Experience</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#skill">技能<br />Skill</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#portfolio">作品<br />Portfolio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">後台</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Member Login Modal Page  -->
  <div class="modal fade" id="loginModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="exampleModalCenterTitle">
            管理員登入
          </h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class=" flex-column">
            <form method="POST" action="./api/login.php">

              <div class="form-group">
                <label for="member_login_email">Email</label>
                <input type="text" class="form-control" id="member_login_email" name="acc" placeholder="請輸入Email" />
              </div>
              <div class="form-group">
                <label for="member_login_password">密碼</label>
                <input type="password" class="form-control" id="member_login_password" name="pw" placeholder="請輸入密碼" />
              </div>
              <div class="text-right d-flex">
                <button type="submit" class="btn btn-primary w-100">
                  登入
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Member Login Modal Page  -->


  <section id="about" class="section-content d-flex flex-column justify-content-center">
    <div class="container">
      <h2 class="text-blue">About 關於我</h2>
      <div class="row">
        <div class="col-4">
          <img src="./images/porfolio/info.jpg" class="img-fluid rounded" alt="">
        </div>



        <div class="about col-6">
          <ul>
            <li>Name: 黃莉婷</li>
            <li>Age: 30 </li>
            <li>Email:k2453540@gmail.com</li>
            <li>Phone:0985-470-337</li>
            <li>Education:逢甲大學應用數學系</li>
            <li class="social-icon">
              <a href="https://github.com/Wangtim4">
                <i class="fab fa-github"></i>
              </a>
            </li>
            <li class="social-icon" data-toggle="tooltip" data-placement="right" title="履歷下載">
              <a href="">
                <i class="fas fa-download"></i>
              </a>
            </li>
          </ul>
          </ul>
        </div>

      </div>

    </div>


  </section>
  <!--  -->
  <section id="experience" class="section-content d-flex flex-column justify-content-center">
    <h2 class="text-blue">Experience 經歷</h2>
    <ul class="timeline">
      <?php
      $news = $News->all(['sh' => 1]);
      foreach ($news as $new) {

      ?>
        <li>
          <div class="wow fadeInRight" data-wow-delay="0.5s">
            <h5 class="text-blue"><?= $new['text']; ?></p>
            </h5>
            <h6><?= $new['time']; ?></h6>
            <div class="row d-flex flex-column flex-lg-row">
              <div class="col-12 col-lg-9 order-2 order-lg-1">
                <p>
                  <?= $new['content']; ?></p>
              </div>

            </div>
          </div>
        </li>
      <?php
      }
      ?>
    </ul>
  </section>

  <section id="skill" class="section-content d-flex flex-column justify-content-center">
    <h2 class="text-blue">Skill 技能</h2>
    <div class="wow fadeIn" data-wow-delay="0s">
      <h4 class="text-blue mt-4">Fronted 前端技術</h4>
      <div class="skill-fronted ml-4">
        <img src="images/logo/html.jpg" alt="html" title="html" width="100px" />
        <img src="images/logo/css.jpg" alt="css" title="css" width="100px" />
        <img src="images/logo/js.jpg" alt="js" title="js" width="100px" />
        <img src="images/logo/jq.jpg" alt="jq" title="jq" width="100px" />
        <img src="images/logo/bs.jpg" alt="bs" title="bs" width="100px" />
      </div>
    </div>
    <div class="wow fadeIn" data-wow-delay="1s">
      <h4 class="text-blue mt-4">Backend 後端技術</h4>
      <div class="skill-backend ml-4">
        <img src="images/logo/php.jpg" alt="php" title="php" width="100px" />
        <img src="images/logo/mysql.jpg" alt="mysql" title="mysql" width="100px" />
      </div>
    </div>
    <div class="wow fadeIn" data-wow-delay="2s">
      <h4 class="text-blue mt-4">Design 視覺設計</h4>
      <div class="skill-backend ml-4">
        <img src="images/logo/ps.jpg" alt="ps" title="ps" width="100px" />
        <img src="images/logo/ai.jpg" alt="ai" title="ai" width="100px" />
      </div>
    </div>


  </section>
  <section id="portfolio" class="section-content d-flex flex-column justify-content-center slide">
    <h2 class="text-blue">Portfolio 網頁作品集</h2>
    <ul class="list-unstyled">
      <?php
      $mvims = $Mvim->all(['sh' => 1], "ORDER BY id desc");
      foreach ($mvims as $mvim) {
      ?>
        <li class="media flex-column flex-md-row my-4 wow fadeIn" data-wow-delay="0.5s">
          <img src="./img/<?= $mvim['img']; ?>" class="mr-3 img-fluid" width="500px" />
          <div class="media-body ">
            <h5 class="mx-0 my-2 font-weight-bold"><?= $mvim['title']; ?>
              <a href="<?= $mvim['href']; ?>" target="_blank">
                <i class="fas fa-external-link-alt mx-2"></i>
              </a>
            </h5>
            <p><?= $mvim['text']; ?></p>
          </div>
        </li>
      <?php
      }
      ?>

    </ul>
  </section>
  <section id="portfolio" class="section-content d-flex flex-column justify-content-center slide">
   
    <h2 class="text-blue my-5">PS/AI作品集</h2>
    <div class="container">
      <div class="row">
        <?php
        $imgs = $Image->all(['sh' => 1]);
        foreach ($imgs as $idx => $img) {
        ?>
            <div class="card col-3 m-3 col-md-5 col-sm-10" >
              
              <div class="card-top">
                <img src="./img/<?= $img['img']; ?>" class="img-fluid " width="100%" >
              </div>
              <div class="card-body p-0">
                <a href="<?= $img['text']; ?>" class="btn btn-primary w-100" target="_blank">全圖</a>
              </div>
            </div>
        <?php
        }
        ?>

      </div>
    </div>
  </section>

  <script src="js/jquery-3.4.1.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/all.min.js"></script>
  <script src="plugins/scroll_page/jquery.easing.min.js"></script>
  <script src="plugins/scroll_page/scrollpage.js"></script>
  <script src="plugins/wow/wow.min.js"></script>

  <script>
    new WOW().init();
  </script>
  <script>
    $(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });
    $("body").scrollspy({
      target: "#side-nav"
    });
  </script>
 
  <script>
    window.onscroll = function() {
      myFunction()
    };

    function myFunction() {
      var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
      //當下可視網頁最高點到網頁頂端的距離。
      var height = document.documentElement.scrollHeight - document.documentElement.clientHeight; //網頁總高度-使用者可視高度
      var scrolled = (winScroll / height) * 100;
      document.getElementById("myBar").style.height = scrolled + "%";
    }
  </script>
</body>

</html>