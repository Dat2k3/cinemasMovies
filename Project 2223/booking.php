<?php 
    $title_movie = $_GET['title_movie']; 
    
    session_start();
    require_once 'homeModel.php';
    require_once 'bookingModel.php';

    $day_films = get_film_day($title_movie);
    $theater_film1 = get_film_theater($title_movie, 'CGV Giga Mall Thủ Đức');
    $theater_film2 = get_film_theater($title_movie, 'CGV Vivo City');
    $theater_film3 = get_film_theater($title_movie, 'CGV Sư Vạn Hạnh');
    $theater_film4 = get_film_theater($title_movie, 'CGV Crescent Mall');
    $theater_film5 = get_film_theater($title_movie, 'CGV Vincom Đồng Khởi');

    $chair_row_A = get_film_chair($title_movie, 'A');
    $chair_row_B = get_film_chair($title_movie, 'B');
    $chair_row_C = get_film_chair($title_movie, 'C');
    $chair_row_D = get_film_chair($title_movie, 'D');
    $chair_row_E = get_film_chair($title_movie, 'E');

    $error = '';
    $message = '';
    $user = '';
    $user_name = '';
    $day_film = '';
    $time_film = '';
    $chair_film = '';

    if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $information = get_information($_SESSION['user']);
        $user_name =  $information['firstname'] . ' ' . $information['lastname'];

        if(isset($_POST['timeFilm']) && isset($_POST['chairFilm'])  && isset($_POST['dayFilm'])) {
            $day_film = $_POST['dayFilm'];
            $time_film = $_POST['timeFilm'];
            $chair_film = $_POST['chairFilm'];

            if (empty($day_film)) {
                $error = 'Please choose a movie day';
            }
            else if (empty($time_film)) {
                $error = 'Please choose a movie time of the cinemas';
            }
            else if (empty($chair_film)) {
                $error = 'Please choose a number of chair';
            }
            else{
                $result = insertTicket($user_name, $user, $title_movie, $day_film, $time_film, $chair_film);
                if($result['code'] == 0) {
                    updateChair($title_movie, $chair_film);
                    $message = "You have successfully booked your ticket";
                } else {
                    $error = 'Error! An error occurred. Please try again later. Try later!';
                } 
            }
        } else {
            $error = 'Please choose information of the ticket';
        }
    }
    else {
        $error = 'Please login before booking the ticket';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Ticket</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/booking.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <div class="sub-header p-2">
        <ul class="nav justify-content-end">
            <li class="nav-item my-auto"><a href="login.php">Login</a></li>/
            <li class="nav-item my-auto"><a href="register.php">Register</a></li>
            <li class="nav-item my-auto mx-3"><a href="my_ticket.php">My Tickets</a></li>
    <?php 
        if (!empty($user_name)) {
    ?>
            <li class="nav-item my-auto mr-2" style="color:black;"><strong>Hello </strong><a href="information.php"><?= $user_name ?></a></li>
            <a href="account/logout.php"><i class="bi bi-power" style="font-size: 18px;"></i></a>
    <?php
        }
    ?>
        </ul>
    </div>

    <div class="container-fluid main-header pl-4">
        <div class="row">
            <a class="col-xl-1 col-md-1 col-sm-1 col-xs-1 navbar-brand mr-5" href="home.php">
                <img src="https://www.cgv.vn/skin/frontend/cgv/default/images/cgvlogo.png" alt="CGV Cinema">
            </a>
            
            <ul class="col-xl-8 col-md-7 col-sm-6 col-xs-5 nav justify-content-center">
                <li class="nav-item my-auto mx-2"><a href="theater_system.php">THEATERS</a></li>
                <li class="nav-item my-auto mx-4" style="color: rgb(129, 129, 129);">|</li>
                <li class="nav-item my-auto mx-2"><a href="film.php">MOVIES</a></li>
                <li class="nav-item my-auto mx-4" style="color: rgb(129, 129, 129);">|</li>
                <li class="nav-item my-auto mx-2"><a href="promotion.php">PROMOTION</a></li>
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
    
    <div class="tilte-film" style="background-color: #EFEBDB;">
        <h5 class="text-center my-auto pt-2 pb-2"><strong>BOOKING TICKETS</strong></h5>
    </div>
</head>

<body>
    <form method="post">
        <div class="container-fluid pb-4 ">
            <input class="d-none form-input-medium ml-2" id="day_film" name="dayFilm"></input>
            <input class="d-none form-input ml-2" id="time_film" name="timeFilm"></input>
            <input class="d-none form-input-small ml-2" id="chair_film" name="chairFilm"></input>
            <div class="pt-4 pb-4 text-center ">
            <?php
            foreach($day_films as $day) {
            ?>   
                <input onfocus="focusDay(this)" class="button-day my-auto mx-4"  type="button" value="<?= $day['day'] ?>">
            <?php
            }
            ?>
            </div>
                <div class="row">
                    <div class="col-xl-6 col-xm-6">
                        <hr class="mt-0 mb-2">    
                        <div >
                            <li>CGV Giga Mall Thủ Đức (2D)</li>
                            <?php
                            foreach($theater_film1 as $time) {
                            ?>
                                <input onfocus="focusTime(this, 'CGV Giga Mall Thủ Đức')" class="movie-time mx-3 my-2" type="button" value="<?= $time['time'] ?>">
                            <?php
                            }
                            ?>
                        </div>

                        <hr class="mt-2 mb-2">    
                        <div >
                            <li>CGV Vivo City (2D)</li>
                            <?php
                            foreach($theater_film2 as $time) {
                            ?>
                                <input onfocus="focusTime(this, 'CGV Vivo City')" class="movie-time mx-3 my-2" type="button" value="<?= $time['time'] ?>">
                            <?php
                            }
                            ?>
                        </div>

                        <hr class="mt-2 mb-2">    
                        <div >
                            <li>CGV Sư Vạn Hạnh (STARIUM)</li>
                            <?php
                            foreach($theater_film3 as $time) {
                            ?>
                                <input onfocus="focusTime(this, 'CGV Sư Vạn Hạnh')" class="movie-time mx-3 my-2" type="button" value="<?= $time['time'] ?>">
                            <?php
                            }
                            ?>
                        </div>

                        <hr class="mt-2 mb-2">    
                        <div >
                            <li>CGV Crescent Mall (GOLD CLASS)</li>
                            <?php
                            foreach($theater_film4 as $time) {
                            ?>
                                <input onfocus="focusTime(this, 'CGV Crescent Mall')" class="movie-time mx-3 my-2" type="button" value="<?= $time['time'] ?>">
                            <?php
                            }
                            ?>
                        </div>

                        <hr class="mt-2 mb-2">    
                        <div >
                            <li>CGV Vincom Đồng Khởi (Lamour)</li>
                            <?php
                            foreach($theater_film5 as $time) {
                            ?>
                                <input onfocus="focusTime(this, 'CGV Vincom Đồng Khởi')" class="movie-time mx-3 my-2" type="button" value="<?= $time['time'] ?>">
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="theater col-xl-6 col-xm-6 pt-4 pb-4">
                        <div class="screen text-center pt-2 pb-2"><a>SCREEN</a></div>
                        <div class="pt-4 pb-4 "></div>
                        <!-- 8x5 = 40 ghế -->
                        <div class="row pt-4 pb-4 text-center">
                            <div class="col-xl-11 ">
                                <a class="mx-4">A</a>
                                <?php
                                foreach($chair_row_A as $chair) {
                                    if($chair['selected'] == 0) {
                                ?>
                                        <input onfocus="focusChair(this)" class="chair mx-2 my-2" type="button" value="<?= $chair['num_chair'] ?>">
                                <?php
                                    } else {
                                ?>
                                        <input class="chair mx-2 my-2 bg-secondary" type="button" value="<?= $chair['num_chair'] ?>" disabled>
                                <?php
                                    }
                                }
                                ?>               
                            </div>  
                            <div class="col-xl-11">
                                <a class="mx-4">B</a>
                                <?php
                                foreach($chair_row_B as $chair) {
                                    if($chair['selected'] == 0) {
                                ?>
                                        <input onfocus="focusChair(this)" class="chair mx-2 my-2" type="button" value="<?= $chair['num_chair'] ?>">
                                <?php
                                    } else {
                                ?>
                                        <input class="chair mx-2 my-2 bg-secondary" type="button" value="<?= $chair['num_chair'] ?>" disabled>
                                <?php
                                    }
                                }
                                ?>                           
                                </div>

                                <div class="col-xl-11">
                                    <a class="mx-4">C</a>
                                <?php
                                foreach($chair_row_C as $chair) {
                                    if($chair['selected'] == 0) {
                                ?>
                                        <input onfocus="focusChair(this)" class="chair mx-2 my-2" type="button" value="<?= $chair['num_chair'] ?>">
                                <?php
                                    } else {
                                ?>
                                        <input class="chair mx-2 my-2 bg-secondary" type="button" value="<?= $chair['num_chair'] ?>" disabled>
                                <?php
                                    }
                                }
                                ?>                 
                                </div>      

                                <div class="col-xl-11">
                                    <a class="mx-4">D</a>
                                <?php
                                foreach($chair_row_D as $chair) {
                                    if($chair['selected'] == 0) {
                                ?>
                                        <input onfocus="focusChair(this)" class="chair mx-2 my-2" type="button" value="<?= $chair['num_chair'] ?>">
                                <?php
                                    } else {
                                ?>
                                        <input class="chair mx-2 my-2 bg-secondary" type="button" value="<?= $chair['num_chair'] ?>" disabled>
                                <?php
                                    }
                                }
                                ?>             
                                </div>  

                                <div class="col-xl-11">
                                    <a class="mx-4">E</a>
                                <?php
                                foreach($chair_row_E as $chair) {
                                    if($chair['selected'] == 0) {
                                ?>
                                        <input onfocus="focusChair(this)" class="chair mx-2 my-2" type="button" value="<?= $chair['num_chair'] ?>">
                                <?php
                                    } else {
                                ?>
                                        <input class="chair mx-2 my-2 bg-secondary" type="button" value="<?= $chair['num_chair'] ?>" disabled>
                                <?php
                                    }
                                }
                                ?>          
                                </div>
                        </div>
                        <!-- detail chair -->
                        <div class="row">
                            <a class="mx-2 ml-5 detail-chair-selecting"></a>
                            <a>Selected</a>
                            <a class="mx-2 ml-3 detail-chair-selected"></a>
                            <a>Sold</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mb-4">
            <?php
                if (!empty($error)) {
                    echo "<div class='text-danger'><p>$error</p></div>";
                }
                else if (!empty($message)){
                    echo "<div class='text-success'><p>$message</p></div>";
                }
            ?>
            <button class="button-login">Booking Now</button>
        </div>
    </form>

    <hr class=" mt-2 mb-2">    
</body>

<footer>
    <div class="container-fluid content-footer">
        <div class="row">
            <div class="col-xl-2 col-md-2 col-sm-12">
                <a href="home.php">
                    <img class="mx-auto d-block" height="150" width="150" src="image/logo/cgv-footer.png" alt="CGV Cinemas logo">
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

<script>
    const btnListDay = document.querySelectorAll('.button-day');
    const btnListChair = document.querySelectorAll('.chair');
    const btnListTime = document.querySelectorAll('.movie-time');
    
    btnListDay.forEach(btnL => {
        btnL.addEventListener('click', () => {
            document.querySelector('.button-day-after')?.classList.remove('button-day-after');
            btnL.classList.add('button-day-after');
        })
    });

    btnListChair.forEach(btnL => {
        btnL.addEventListener('click', () => {
            document.querySelector('.chair-after')?.classList.remove('chair-after');
            btnL.classList.add('chair-after');
        })
    });
    
    btnListTime.forEach(btnL => {
        btnL.addEventListener('click', () => {
            document.querySelector('.movie-time-after')?.classList.remove('movie-time-after');
            btnL.classList.add('movie-time-after');
        })
    });
</script>

<script>
    function focusDay(day) {
        let choose = day.value

        let input_film = document.getElementById('day_film');
        input_film.value = choose;

        return choose;
    }

    function focusTime(time, theater) {
        let choose = time.value

        let input_film = document.getElementById('time_film');
        input_film.value = theater + ' ' + choose;

        return choose;
    }

    function focusChair(chair) {
        let choose = chair.value

        let input_film = document.getElementById('chair_film');
        input_film.value = choose;

        return choose;
    }
</script>