<?php

/** @var \yii\web\View $this */
/** @var string $content */
use common\widgets\Alert;
use frontend\assets\LoginAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use common\models\Output;
use common\models\Input;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use common\models\User;
use frontend\controllers\OutputController;
use yii\helpers\Url;

LoginAsset::register($this);

$user = Yii::$app->user->identity;

?>
<?php $this->beginPage() ?>

<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Kashelok</title>

    <meta name="description" content="" />

    <link rel="stylesheet" href="asset/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="asset/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="asset/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?=Yii::getAlias('@web') ?>/asset/images/favicon.ico" />
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
  </head>
<?php $this->beginBody() ?>

  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="<?= \yii\helpers\Url::to(['/']) ?> "><img src="<?=Yii::getAlias('@web') ?>/asset/images/logo.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="<?= \yii\helpers\Url::to(['/']) ?> "><img src="<?=Yii::getAlias('@web') ?>/asset/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button >
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="<?=Yii::getAlias('@web') ?>/asset/images/faces/face1.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"> <?= $user->username ?> </p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
                <div class="dropdown-divider"></div>

                <?= Html::a('<i class="mdi mdi-logout me-2 text-primary"></i> <span class="align-middle">Sign Out</span>',
                        ['site/logout'],
                        [
                            'class' => 'dropdown-item',
                            'data' => [ 
                                'method' => 'post',
                                'params' => ['derp' => 'herp']
                            ]
                        ]) ?>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">

              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
            <?= Html::a('<i class="mdi mdi-power"></i>',
                        ['site/logout'],
                        [
                            'class' => 'nav-link',
                            'data' => [ 
                                'method' => 'post',
                                'params' => ['derp' => 'herp']
                            ]
                        ]) ?>
            </li>
            <li class="nav-item nav-settings d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-format-line-spacing"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href=" <?= \yii\helpers\Url::to(['/']) ?>" class="nav-link">
                <div class="nav-profile-image">
                  <img src="<?=Yii::getAlias('@web') ?>/asset/images/faces/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"> <?= $user['username'] ?> </span>
                  <span class="text-secondary text-small">Project Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="  <?= \yii\helpers\Url::to(['/']) ?>">
                <span class="menu-title">Menu</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=" <?= \yii\helpers\Url::to(['/category']) ?>">
                <span class="menu-title">Categories</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Data</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?= \yii\helpers\Url::to(['/input']) ?>">Inputs</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?= \yii\helpers\Url::to(['/output']) ?>">Outputs</a></li>
                </ul>
              </div>
            </li>

            
    
            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  <h6 class="font-weight-normal mb-3">Projects</h6>
                </div>
                <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>
              </span>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
        <?= Alert::widget() ?>
        <?= $content ?>
          <!-- content-wrapper ends -->
          <!-- ]partial:partials/_footer.html -->
          
          <!-- partial -->
        </div>
      </div>
      <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © Khamraev Tohir 2024</span>

            </div>
          </footer>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        const cost = [ ['Months', 'Input', 'Output'] ];
        const month = [ 'Januar', 'February', 'March', 'April ', 'May', 'June', 'July', 'August', 'September','Octomber','November', 'December'];
        <?php 
        for($i=1; $i<=12;$i++){ ?>
          cost.push([month[<?= $i-1 ?>], <?= Input::MonthCost($i)[0]['kirim'] + 0 ?>  , <?= Output::MonthCost($i)[0]['chiqim'] + 0 ?>])
        <?php } ?>
      
        var data = google.visualization.arrayToDataTable(cost);
        var options = {
          chart: {

            title: 'Balance',
            subtitle: 'Statistics of incoming and outgoing money for the month of the current year',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <script src="asset/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="asset/vendors/chart.js/Chart.min.js"></script>
    <script src="asset/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="asset/js/off-canvas.js"></script>
    <script src="asset/js/hoverable-collapse.js"></script>
    <script src="asset/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="asset/js/dashboard.js"></script>
    <script src="asset/js/todolist.js"></script>
    <!-- End custom js for this page -->
    <?php $this->endBody() ?>
  </body>
</html>
<?php $this->endPage();
