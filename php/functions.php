<?php
function file_size_calc($doc_name) {
  $file_size = filesize($_SERVER['DOCUMENT_ROOT'] . '/uploads/' . str_replace(' ', '_', $_SESSION['user_name']) . $_SESSION['user_id'] . '/' . $doc_name);
  echo file_size_format($file_size);
}

function file_size_format($bytes) {
  if ($bytes >= 1073741824)
  {
    $bytes = number_format($bytes / 1073741824, 2) . ' GB';
  }
  elseif ($bytes >= 1048576)
  {
    $bytes = number_format($bytes / 1048576, 2) . ' MB';
  }
  elseif ($bytes >= 1024)
  {
    $bytes = number_format($bytes / 1024, 2) . ' KB';
  }
  elseif ($bytes > 1)
  {
    $bytes = $bytes . ' bytes';
  }
  elseif ($bytes == 1)
  {
    $bytes = $bytes . ' byte';
  }
  else
  {
    $bytes = ' bytes';
  }
  return $bytes;
}
