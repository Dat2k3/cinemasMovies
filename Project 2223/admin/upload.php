<?php 
    function upload_nowfilms($file) {
        $root = $_SERVER['DOCUMENT_ROOT'];
        $path_image_nows = $root . '/image/now_films/';

        $name_image = basename($file['name']);
        
        // upload File
        $target_file =  $path_image_nows . $name_image;

        if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            return array('code' => 0, 'message' => 'Successfully added photo');
        }
        else {
            return array('code' => 1, 'error' => 'Add photo failed, please try again');
        }
    }

    function upload_futurefilms($file) {
        $root = $_SERVER['DOCUMENT_ROOT'];
        $path_image_future = $root . '/image/future_films/';

        $name_image = basename($file['name']);
        
        // upload File
        $target_file =  $path_image_future . $name_image;

        if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            return array('code' => 0, 'message' => 'Successfully added photo');
        }
        else {
            return array('code' => 1, 'error' => 'Add photo failed, please try again');
        }
    }

    function upload_poster_image($file) {
        $root = $_SERVER['DOCUMENT_ROOT'];
        $path_image_future = $root . '/image/poster/';

        $name_image = basename($file['name']);
        
        // upload Poster
        $target_file =  $path_image_future . $name_image;

        if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            return array('code' => 0, 'message' => 'Successfully added photo');
        }
        else {
            return array('code' => 1, 'error' => 'Add photo failed, please try again');
        }
    }

    function upload_event_image($file) {
        $root = $_SERVER['DOCUMENT_ROOT'];
        $path_image_future = $root . '/image/event/';

        $name_image = basename($file['name']);
        
        // upload Event
        $target_file =  $path_image_future . $name_image;

        if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            return array('code' => 0, 'message' => 'Successfully added photo');
        }
        else {
            return array('code' => 1, 'error' => 'Add photo failed, please try again');
        }
    }
?>