<?php 
    function remove_image_film($name_image, $folder_name) {
        $root = $_SERVER['DOCUMENT_ROOT'];
        $path_image = $root . '/image/' . $folder_name . '/';
        $imgpath = $path_image . $name_image;
        unlink( $imgpath );
    }
?>