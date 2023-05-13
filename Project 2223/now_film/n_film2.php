<?php 
    $server_host = $_SERVER['HTTP_HOST'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Now Showing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/film_n.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    
    <div class="sub-header p-2">
        <ul class="nav justify-content-end">
            <li class="nav-item my-auto"><a href="../login.php">Login</a></li>/
            <li class="nav-item my-auto"><a href="../register.php">Register</a></li>
            <li class="nav-item my-auto mx-3"><a href="../my_ticket.php">My Tickets</a></li>
        </ul>
    </div>

    <div class="container-fluid main-header pl-4">
        <div class="row">
            <a class="col-xl-1 col-md-1 col-sm-1 col-xs-1 navbar-brand mr-5" href="../home.php">
                <img src="https://www.cgv.vn/skin/frontend/cgv/default/images/cgvlogo.png" alt="CGV Cinema">
            </a>
            
            <ul class="col-xl-8 col-md-7 col-sm-6 col-xs-5 nav justify-content-center">
                <li class="nav-item my-auto mx-2"><a href="../theater_system.php">THEATERS</a></li>
                <li class="nav-item my-auto mx-4" style="color: rgb(129, 129, 129);">|</li>
                <li class="nav-item my-auto mx-2"><a href="../film.php">MOVIES</a></li>
                <li class="nav-item my-auto mx-4" style="color: rgb(129, 129, 129);">|</li>
                <li class="nav-item my-auto mx-2"><a href="../promotion.php">PROMOTION</a></li>
            </ul>
                
            <a class="col-xl-1 col-md-1 col-sm-1 col-xs-1 navbar-brand" href="">
                <img src="https://www.cgv.vn/media/wysiwyg/2019/AUG/kenhcine.gif" alt="Cine">
            </a>
        
            <a class="col-xl-1 col-md-1 col-sm-1 col-xs-1 navbar-brand" href="">
                <img src="https://www.cgv.vn/media/wysiwyg/news-offers/mua-ve_ngay.png" alt="Sale Ticket">
            </a>
        </div>
    </div>

    <hr class="mt-1 mb-0">
    
    <div class="tilte-information" style="background-color: #EFEBDB;">
        <h5 class="text-center my-auto pt-2 pb-2"><strong>NOW SHOWING</strong></h5>
    </div>
</head>

<body>
    </style>
    <div style="background-color:#3b3b3b;" class="pb-4 pt-4">
        <div class="embed-responsive embed-responsive-16by9 ">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/UGO_i2tf1BM" title="PHIM ANH EM SUPER MARIO | Trailer D | Dự Kiến Khởi Chiếu: 07.04.2023" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>        </div>
        
    </div>
    <div class="container-fluid background">
        <div class="row">
            <div class="col-xl-3 col-md-3 col-sm-12 pb-4 pt-4" height="304" width="175" >
                <div>
                    <img class="mx-auto d-block pb-3" height="275" width="175" src="https://media.lottecinemavn.com/Media/MovieFile/MovieImg/202303/11056_103_100002.jpg">
                </div>    
                <div>
                    <a href="http://<?= $server_host ?>/booking.php?title_movie=ANH EM SUPER MARIO"><button class="button-film mx-auto d-block" height="44" width="175" >Đặt vé</button></a>
                </div>
            </div>
            <div class="col-xl-8 col-md-8 col-sm-12 pb-4 pt-4"> 
                <ul style=" font-size: 15px;">
                    <li>
                    <h4><strong>PHIM ANH EM SUPER MARIO</strong></h4>
                        <strong>Đánh giá:
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            10.0
                        </strong>
                    </li>
                    <li><Strong>Đạo diễn: </Strong>Aaron Horvath, Michael Jelenic</li>
                    <li><Strong>Diễn viên: </Strong>Chris Pratt, Anya Taylor-Joy, Charlie Day, …</li>
                    <li><Strong>Khởi chiếu: </Strong>07/04/2023</li>
                    <li><Strong>Thời lượng: </Strong>93 phút</li>
                    <li class="pt-4">
                        <h5><STRONG>Tóm tắt</STRONG></h5>
                        <p>Dự án chuyển thể từ trò chơi điện tử huyền thoại gắn liền với tuổi thơ của hàng triệu fan trên toàn thế giới và là sự kết hợp đặc biệt giữa hai “ông lớn” Nintendo và Illumination, Phim Anh Em Super Mario sẽ đưa khán giả quay trở lại từ nguồn gốc về cuộc phiêu lưu đến Vương quốc Nấm của anh chàng thợ sửa ống nước Mario và quá trình anh vươn lên trở thành một huyền thoại. Tràn ngập những Easter Egg thú vị từ game vào phim, cùng sự khác biệt hấp dẫn mà câu chuyện trên màn ảnh rộng mang lại, bộ phim hứa hẹn sẽ thu hút cả những khán giả chưa từng biết về Mario và cả fan “cứng” của trò chơi này.</p>
                    </li>
                </ul>
            </div>
        </div>    
    </div>
    <hr class="mt-1 mb-0">
</body>

<footer>
    <div class="container-fluid content-footer">
        <div class="row">
            <div class="col-xl-2 col-md-2 col-sm-12">
                <a href="../home.php">
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