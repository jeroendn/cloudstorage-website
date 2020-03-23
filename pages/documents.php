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

      <section class="container">
        <?php
      	$sql = "SELECT * FROM document WHERE user_id = '" . $_SESSION['user_id'] . "'";
      	$stmt = $conn->prepare($sql);
      	$stmt->execute();
      	$documents = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($documents as $document) {
        ?>
        <div class="card mt-3 p-2">
          <!-- <a href="php/getimg.php?img=file_icon.png" download>download</a> -->
          <div class="data">
            <img src="php/getimg.php?img=sigma.png"/>
            <p class="card-title"><?php echo $document['document_name'] ?></p>
            <p class="file-size">1KB</p>
            <p class="date"><?php echo date("d/M/Y H:i", strtotime($document['document_date'])) ?></p>
          </div>
          <div class="buttons">
            <a href="#!" class="btn btn-primary">Download</a>
            <a href="#!" class="btn btn-info">Share</a>
            <a href="#!" class="btn btn-danger">Verwijder</a>
          </div>
        </div>
        <?php
        }
        ?>
      </section>

      <?php
      echo $_SESSION['user_id'] . $_SESSION['user_role'] . $_SESSION['user_name'];
      // get a img outside root folder
      // $img = 'https://www.how2shout.com/wp-content/uploads/2018/03/download-Instagram-videos-using-a-Chrome-Plugin-on-PC.jpg';


      // $root = dirname($_SERVER['DOCUMENT_ROOT']) . '/'; # Outside  the public web folder.

      // require $root . 'foler/file.php';


      // $imgString = realpath('/uploads/file_icon.png');
      // $img = $root . 'uploads/file_icon.png';

      // $img = file_get_contents($imgString);

      // echo '<img src="' . $img . '">';
      ?>
    </main>

    <!-- footer -->
    <?php include_once __DIR__ . '../../php/footer.php' ?>

    <!-- scripts -->
    <?php include_once __DIR__ . '../../php/js_include.php' ?>
  </body>
</html>
