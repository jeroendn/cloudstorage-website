<?php
include_once '../php/session.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Statistics - Cloud Storage</title>
    <meta name="description" content=""/>
    <?php include_once  __DIR__ . '../../php/head.php' ?>
  </head>

  <body>
    <!-- header -->
    <?php include_once  __DIR__ . '../../php/header.php' ?>

    <main id="dashboard" class="page-content">
      <section class="container mt-5">
        <h6>Shares</h6>
        <div class="card mt-3 p-2">
          <div id="shares_chart"></div>
        </div>
        <div class="card mt-3 p-2">
          <div id="chart"></div>
        </div>
        <div class="card mt-3 p-2">
          <div id=""></div>
        </div>
        <div class="card mt-3 p-2">
          <div id=""></div>
        </div>
        <div class="card mt-3 p-2">
          <div id=""></div>
        </div>
      </section>
    </main>

    <!-- footer -->
    <?php include_once  __DIR__ . '../../php/footer.php' ?>

    <!-- scripts -->
    <?php include_once  __DIR__ . '../../php/js_include.php' ?>
  </body>
</html>
