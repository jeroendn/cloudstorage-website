<?php
include_once __DIR__ . '../../php/session.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Cloud Storage - Your documents</title>
    <meta name="description" content=""/>
    <?php include_once __DIR__ . '../../php/head.php' ?>
  </head>

  <body>
    <!-- header -->
    <?php include_once __DIR__ . '../../php/header.php' ?>

    <main id="documents" class="page-content">
      documents<?php var_dump($_SESSION['user_id']); ?>
      <a href="../../uploads/file_icon.png" download>download</a>

      <img src="php/getimg.php?name=file_icon.png" />

      <?php
      // get a img outside root folder
      $img = 'https://www.how2shout.com/wp-content/uploads/2018/03/download-Instagram-videos-using-a-Chrome-Plugin-on-PC.jpg';


      $root = dirname($_SERVER['DOCUMENT_ROOT']) . '/'; # Outside  the public web folder.

      // require $root . 'foler/file.php';


      // $imgString = realpath('/uploads/file_icon.png');
      // $img = $root . 'uploads/file_icon.png';

      // $img = file_get_contents($imgString);

      echo '<img src="' . $img . '">';
      ?>
    </main>

    <!-- footer -->
    <?php include_once __DIR__ . '../../php/footer.php' ?>

    <!-- scripts -->
    <?php include_once __DIR__ . '../../php/js_include.php' ?>
  </body>
</html>
