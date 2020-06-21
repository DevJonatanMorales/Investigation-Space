<?php 
if (isset($_GET['publicacion'])) {  
  header("content-type: application/pdf");
  readfile('../../file/'. $_GET['publicacion']);
}
?>