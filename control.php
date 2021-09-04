<?php
    $name = $_POST["file_name"];
    $file_name = $_FILES['icc_excel']['name'];
    $file_tmp =$_FILES['icc_excel']['tmp_name'];

    $file_ext=strtolower(end(explode('.', $_FILES['icc_excel']['name'])));
    
    move_uploaded_file($file_tmp, "files/".$name);
    echo json_encode(array("success"=>true));
?>
