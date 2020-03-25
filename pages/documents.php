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
      <section class="container mt-3">
        <div class="card">
          <!-- <input type="file" name="file_upload" id="file_upload">
          <input type="submit" value="Upload" name="upload" class="btn btn-primary"> -->
          <form action="php/ajax/save_file.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file_upload" id="file_upload">
            <input type="submit" value="Upload" name="upload">
          </form>
        </div>
      </section>

      <section class="container mt-3">
        <?php
      	$sql = "SELECT * FROM document WHERE user_id = '" . $_SESSION['user_id'] . "'";
      	$stmt = $conn->prepare($sql);
      	$stmt->execute();
      	$documents = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($documents as $document) {
        ?>
        <div class="card mt-3 p-2">
          <div class="data">
            <?php
            // get image from secure location
            $doc_name = pathinfo($document['document_name']);
            if ($doc_name['extension'] == 'png' || $doc_name['extension'] == 'jpg' || $doc_name['extension'] == 'jpeg' || $doc_name['extension'] == 'gif' || $doc_name['extension'] == 'jfif') {
              echo '<img src="php/getfile.php?file=' . $document['document_name'] . '"/>';
            }
            else if ($doc_name['extension'] == 'mp4') {
              echo '<video src="php/getfile.php?file=' . $document['document_name'] . '" type="mp4" controls></video>';
            }
            else {
              echo '<img src="design/no_image.png"/>';
            }
            ?>
            <p class="card-title"><?php echo $document['document_name'] ?></p>
            <p class="file-size"><?php file_size_calc(get_file_dir($document['document_name'])); ?></p>
            <p class="date"><?php echo date("d/M/Y H:i", strtotime($document['document_date'])); ?></p>
          </div>
          <div class="buttons">
            <a href="php/getfile.php?file=<?php echo $document['document_name'] ?>" class="btn btn-primary" download="<?php echo $document['document_name'] ?>">Download</a>
            <a href="#!" class="btn btn-info btn-share">Share</a>
            <a href="#!" class="btn btn-danger btn-delete">Verwijder</a>
          </div>
          <input type="hidden" name="document_id" value="<?php echo $document['document_id'] ?>">
        </div>
        <?php
        }
        ?>
      </section>
    </main>

    <!-- footer -->
    <?php include_once __DIR__ . '../../php/footer.php' ?>

    <!-- scripts -->
    <?php include_once __DIR__ . '../../php/js_include.php' ?>
  </body>
</html>
