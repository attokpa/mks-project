<?php
    if(isset($_GET["file"])){
        header("content-disposition: attachment; filename = " . basename($_GET["file"]));
        readfile($_GET["file"]);
        exit();
    }


?>