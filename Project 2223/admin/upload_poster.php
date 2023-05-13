<?php
    require_once('adminModel.php');
    require_once('upload.php');

    $error = '';
    $message = '';
    $name = '';
    $position = '';

    if (isset($_POST['name']) && isset($_POST['position']))
    {
        $name = $_POST['name'];
        $position = $_POST['position'];

        if (empty($name)) {
            $error = 'Please enter the name of poster';
        }
        else if (empty($position)) {
            $error = 'Please enter the position of poster';
        }
        else if ($_FILES['image']['error'] != UPLOAD_ERR_OK) {
            $error = 'Please upload the image of movie you want display';
        }
        else {
            if(!check_exist_name($name, 'poster')) {
                upload_poster($name, $_FILES['image']['name'], $position);
                $result = upload_poster_image($_FILES['image']);
                if($result['code'] == 0) {
                    $message = 'Adding Successful';
                } else {
                    $error = $result['error'];
                }
            } else {
                $error = 'The poster title is existed, please enter the name of poster again';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding posters</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fil.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <div class="container-fluid main-header pl-4">
        <div class="row">
            <a class="col-xl-1 col-md-1 col-sm-1 col-xs-1 navbar-brand mr-5" href="#">
                <img src="https://www.cgv.vn/skin/frontend/cgv/default/images/cgvlogo.png" alt="CGV Cinema">
            </a>
            
            <ul class="col-xl-8 col-md-7 col-sm-6 col-xs-5 nav justify-content-center">
                <li class="nav-item my-auto mx-2"><a href="#">THEATERS</a></li>
                <li class="nav-item my-auto mx-4" style="color: rgb(129, 129, 129);">|</li>
                <li class="nav-item my-auto mx-2"><a href="#">MOVIES</a></li>
                <li class="nav-item my-auto mx-4" style="color: rgb(129, 129, 129);">|</li>
                <li class="nav-item my-auto mx-2"><a href="#">PROMOTION</a></li>
            </ul>
                
            <a class="col-xl-1 col-md-1 col-sm-1 col-xs-1 navbar-brand" href="#">
                <img src="https://www.cgv.vn/media/wysiwyg/2019/AUG/kenhcine.gif" alt="Cine">
            </a>
        
            <a class="col-xl-1 col-md-1 col-sm-1 col-xs-1 navbar-brand" href="#">
                <img src="https://www.cgv.vn/media/wysiwyg/news-offers/mua-ve_ngay.png" alt="Sale Ticket">
            </a>
        </div>
    </div>

    <hr class="mt-1 mb-0">
    
    <div class="tilte-login" style="background-color: #EFEBDB;">
        <h5 class="text-center my-auto pt-2 pb-2"><strong>ADD THE POSTER OF MOVIE </strong></h5>
    </div>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-3"></div>
            <div class="col-lg-4 col-md-5 form-poster mt-4 mb-4 pl-5 pr-5 pt-4 pb-2">
                <p class="mb-4"><a href="../admin.php">Back</a></p>
                <form method="post" novalidate enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name"><strong>Poster name</strong></label>
                        <input value="<?= $name ?>" name="name" required class="form-control" type="text" placeholder="Name of movie poster" id="name">
                    </div>

                    <div class="form-group">
                        <label for="time"><strong>Position</strong></label>
                        <input value="<?= $position ?>" name="position" required class="form-control" type="text" placeholder="Postion of top movie" id="position">
                    </div>
                   
                    <div class="form-group">
                        <label for="name"><strong>Image background</strong></label>
                        <div class="custom-file">
                            <input name="image" type="file" class="custom-file-input" id="customFile" accept="image/gif, image/jpeg, image/png, image/bmp">
                            <label class="custom-file-label" for="customFile">Poster image</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php
                            if (!empty($error)) {
                                echo "<div class='text-danger'><p>$error</p></div>";
                            } else if (!empty($message)) {
                                echo "<div class='text-success'><p>$message</p></div>";
                            }
                        ?>
                        <button type="submit" class="button-login">Add Now</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-md-3"></div>
        </div>
    </div>
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>

    <hr class="mt-1 mb-0">

</body>

<footer>
    <div class="container-fluid content-footer">
        <div class="row">
            <div class="col-xl-2 col-md-2 col-sm-12">
                <a href="#">
                    <img class="mx-auto d-block" height="150" width="150" src="../image/logo/cgv-footer.png" alt="CGV Cinemas logo">
                </a>
            </div>
            <div class="col-xl-10 col-md-10 col-sm-12">
                <ul style="color: gray; font-size: 14px;">
                    <li><strong>COMPANY CJ CGV VIETNAM</strong></li>
                    <li>Business registration certificate: 0303675393, registered for the first time on 31/7/2008,issued by HCMC Department of Planning and Investment.</li>
                    <li>Address: Floor 2, Rivera Park Saigon - No. 7/28 Thanh Thai street, Ward 14, District 10, HCMC.</li>
                    <li>Hotline: 1900 9999</li>
                    <li>COPYRIGHT &copy; 2023 CJ CGV - TeamDC</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer"></div>
</footer>
</html>

