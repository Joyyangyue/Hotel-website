<?php
    require_once 'includes/config_session-inc.php';
    require_once 'includes/register_view-inc.php';
    require_once 'includes/login_view-inc.php';
    require_once 'includes/book_view-inc.php';
    include 'includes/dbh-inc.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete responsive hotel agency website design </title>

    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- custome css file link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
 
    <div class="error">
            
    </div>

    <!-- header section starts -->
    <header>
        
        <div id="menu-bar" class="fas fa-bars"></div>

        <a href="index.php" class="logo"><span>H</span>otel</a>
        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#book">book</a>
            <a href="#packages">packages</a>
            <a href="#services">services</a>
            <a href="#gallery">gallery</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a>
       </nav>

        <div class="icons">
            <i class="fas fa-search" id="search-btn"></i>
            <i class="fas fa-user" id="login-btn"></i>
        </div>
        <form action="" class="search-bar-container">
            <input type="search" id="search-bar" placeholder="search here...">
            <label for="search-bar" class="fas fa-search"></label>
        </form>
    </header>

    


    


    <!-- custume js file link -->

    <!-- login form container -->

    <div class="login-form-container">
        <i class="fas fa-times" id="login-form-close"></i>
        <form action="includes/login-inc.php" method="post">
            <h3>login</h3>
            <input type="email" name="email" class="box" placeholder="Email">
            <input type="password" name="password" class="box" placeholder="Password">
            <input type="submit" value="Login" class="btn">
            <input type="checkbox" id="remember">
            <label for="remember">Remember me</label>
            <p>forgot password? <a href="#">click here</a></p>
            <p>don't have and account? <a id="register-btn" href="#">register now</a></p>
            <?php
            check_login_errors();
            ?>
        </form>
    </div>

    <!-- register form container -->

    <div class="register-form-container">
        <i class="fas fa-times" id="register-form-close"></i>
        <form action="includes/register-inc.php" method="post">
            <h3>register</h3>
            <input type="text" name="first-name" class="box" placeholder="First Name">
            <input type="text" name="last-name" class="box" placeholder="Last Name">
            <input type="email" name="email" class="box" placeholder="Email">
            <input type="password" name="password" class="box" placeholder="Password">
            <input type="password" name="password-again" class="box" placeholder="Password again">
            <input type="submit" value="register" class="btn">            
            <p>forgot password? <a href="#">click here</a></p>
            <p>already have and account? <a id="login-btn-fromregister" href="#">login</a></p>
            <?php
            check_register_errors();
            ?>
        </form>
        
        
    </div>

    <!-- registration error container -->


    



<!-- home section starts -->

<section class="home" id="home">
    <div class="content">
        <h3>welcome to A global icon of luxury</h3>
        <p>dicover new places with us, luxury awaits</p>
        <a href="#" class="btn">discover more</a> 
    </div>

    <div class="controls">
        <span class="vid-btn active" data-src="video/vid01.mp4"></span>
        <span class="vid-btn" data-src="video/vid02.mp4"></span>
        <span class="vid-btn" data-src="video/vid03.mp4"></span>
        <span class="vid-btn" data-src="video/vid04.mp4"></span>
        <span class="vid-btn" data-src="video/vid05.mp4"></span>
    </div>    

    <div class="video-container">
        <video src="video/vid01.mp4" id="video_slider" loop autoplay muted></video>
    </div>

</section>


<!-- home section ends -->

<!-- book section starts -->

<section class="book" id="book">
    <h1 class="heading">
        <span>b</span>
        <span>o</span>
        <span>o</span>
        <span>k</span>
        <span class="space"></span>
        <span>n</span>
        <span>o</span>
        <span>w</span>
    </h1>

    <div class="row">
        <div class="img">
            <img src="img/book-img.png" alt="">
        </div>

        <form action="includes/book-inc.php" method="post">            
            <div class="inputBox">
                <h3>where to</h3>
                <select name="place-name">
                <?php
                $query = "SELECT destination_name FROM hotel WHERE available_space != 0;";
                $statement = $pdo->prepare($query);
                $statement->execute();
        
                $result = $statement->fetchAll();
                foreach($result as $place){
                    ?> <option><?=$place["destination_name"]?></option> <?php
                }
                ?>
                </select>
            </div>
            <div class="inputBox">
                <h3>how many</h3>
                <select name="guest-number" aria-placeholder="number of guests">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    
                </select>
                
            </div>
            <div class="inputBox">
                <h3>arrivals</h3>
                <input type="date" name="arrival">
            </div>
            <div class="inputBox">
                <h3>leaving</h3>
                <input type="date" name="leaving">
            </div>
            <input type="submit" class="btn" value="book now">
            <?php
            check_booking_errors();
            ?>
        </form>
    </div>
</section>
<!-- book section ends -->

<!-- packages section starts -->

<section class="packages" id="packages">
    <h1 class="heading">
        <span>p</span>
        <span>a</span>
        <span>c</span>
        <span>k</span>
        <span>a</span>
        <span>g</span>
        <span>e</span>
        <span>s</span>

    </h1>

    
    <div class="box-container">
    <?php
        $query = "SELECT destination_name, description, price, available_space, image_path FROM hotel;";
        $statement = $pdo->prepare($query);
        $statement->execute();

        $result = $statement->fetchAll();
        if($result)
        {
            foreach($result as $place)
            {                
                ?>
                
                <div class="box">                    
                    <img src="img/<?=$place["image_path"];?>" alt="">
                    <div class="content">
                        <h3><i class="fas fa-map-marker-alt"></i><?=$place['destination_name'];?></h3> 
                        <p class="normal-p"><?=$place['description'];?></p>  
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>  
                        <div class="price"><p>$<?=$place['price']-0.01;?></p><span>$150/night</span></div>
                        <?php
                            if(intval($place['available_space']) <= 3){
                                ?>
                                    <p class="low-available">Avaible space: <?=$place['available_space'];?></p>
                                <?php
                            }
                            else{
                                ?>
                                <p class="normal-p right-align">Avaible space: <?=$place['available_space'];?></p>
                                <?php
                            }
                        ?>
                        
                        <a href="#book" class="btn">book now</a>
                    </div>
                </div>  
            <?php
            }

            
        }
        else{

        }
    ?>
    </div>

    <!--<div class="box-container">
        <div class="box">
            <img src="img/p-1.jpg" alt="">
            <div class="content">
                <h3><i class="fas fa-map-marker-alt"></i> budapest </h3> 
                <p>Welcome to Budapest: The Majesty of the Danube and Cultural Richness.</p>  
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>  
                <div class="price"> $94.00 <span>$120.00</span></div>
                <a href="#" class="btn">book now</a>
            </div>
        </div>     

        <div class="box">
            <img src="img/p-2.jpg" alt="">
            <div class="content">
                <h3><i class="fas fa-map-marker-alt"></i> italy </h3> 
                <p>Italy is a beautiful country in Southern Europe, known for its rich history, culture and excellent gastronomy.</p>  
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>  
                <div class="price"> $100.00 <span>$180.00</span></div>
                <a href="#" class="btn">book now</a>
            </div>
        </div>  
        
        <div class="box">
            <img src="img/p-3.jpg" alt="">
            <div class="content">
                <h3><i class="fas fa-map-marker-alt"></i> london </h3> 
                <p>london:it is a city that combines rich history, modernity and cultural diversity</p>  
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>  
                <div class="price"> $179.00 <span>$220.00</span></div>
                <a href="#" class="btn">book now</a>
            </div>
        </div>
        
        <div class="box">
            <img src="img/p-4.jpeg" alt="">
            <div class="content">
                <h3><i class="fas fa-map-marker-alt"></i> turkey </h3> 
                <p>Turkey this is a unique country that combines a rich history,and offers visitors incredible opportunities for travel and discovery</p>  
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>  
                <div class="price"> $68.00 <span>$110.00</span></div>
                <a href="#" class="btn">book now</a>
            </div>
         </div>

         <div class="box">
            <img src="img/p-5.jpg" alt="">
            <div class="content">
                <h3><i class="fas fa-map-marker-alt"></i> morocco </h3> 
                <p>Morocco is a place where historical and cultural influences mix, including Arab, Berber and European influences</p>  
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>  
                <div class="price"> $77.00 <span>$180.00</span></div>
                <a href="#" class="btn">book now</a>
            </div>
         </div>

         <div class="box">
            <img src="img/p-6.png" alt="">
            <div class="content">
                <h3><i class="fas fa-map-marker-alt"></i> laos </h3> 
                <p>Laos is a place where influences from different cultures meet, including Hinduism, Buddhism and French colonial heritage</p>  
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>  
                <div class="price"> $85.00 <span>$140.00</span></div>
                <a href="#" class="btn">book now</a>
            </div>
        </div>  
    </div>  -->
</section>


<!-- packages section ends -->

<!-- services section starts -->

<section class="services" id="services">
    <h1 class="heading">
        <span>s</span>
        <span>e</span>
        <span>r</span>
        <span>v</span>
        <span>i</span>
        <span>c</span>
        <span>e</span>
        <span>s</span>
    </h1>

    <div class="box-container">
        <div class="box">
            <i class="fas fa-hotel"></i>
                <h3>affordable hotels</h3>
                <p>On our website you will find the ideal accommodation at an affordable price for your next trip.
                   We specialize in providing information on hotel that combine excellent quality and affordable prices.</p>
        </div>
        <div class="box">
            <i class="fas fa-utensils"></i>
                <h3>food and drinks</h3>
                <p>Our recipes will help you prepare delicious meals for family and friends.
                   We offer a variety of recipes from classic to exotic.</p>
        </div>
        <div class="box">
            <i class="fas fa-bullhorn"></i>
                <h3>safty guide</h3>
                <p>Learn how to protect yourself in everyday life.
                     We provide tips on staying safe,
                     avoiding fraud, and communicating with strangers.</p>
        </div>
        <div class="box">
            <i class="fas fa-globe-asia"></i>
                <h3>around the world</h3>
                <p>Let's explore different countries of the world together.
                    We provide advice on preparing for travel, booking tickets,
                    obtaining visas and staying safe on the road.</p>
        </div>
        <div class="box">
            <i class="fas fa-plane"></i>
                <h3>fastest travel</h3>
                <p>Various modes of transport including aviation, trains, buses,
                    and even the latest technologies that make travel even faster.</p>
        </div>
        <div class="box">
            <i class="fas fa-hiking"></i>
                <h3>advanture</h3>
                <p>Immerse yourself in a world of exciting tales of adventure around the world.
                   We share our own stories and invite you to share yours.</p>
        </div>
    </div>
</section>






<!-- services section ends -->

<!-- gallery section starts -->

<section class="gallery" id="gallery">
    <h1 class="heading">
    <span>g</span>
    <span>a</span>
    <span>l</span>
    <span>l</span>
    <span>e</span>
    <span>r</span>
    <span>y</span>
</h1>


<div class="box-container">
    <div class="box">
        <img src="img/s-1.jpg" alt="">
        <div class="content">
            <h3>amazing places</h3>
            <p>Lorem ipsum</p>
            <a href="#" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="img/s-2.jpg" alt="">
        <div class="content">
            <h3>amazing places</h3>
            <p>Lorem ipsum</p>
            <a href="#" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="img/s-3.jpeg" alt="">
        <div class="content">
            <h3>amazing places</h3>
            <p>Lorem ipsum</p>
            <a href="#" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="img/s-4.webp" alt="">
        <div class="content">
            <h3>amazing places</h3>
            <p>Lorem ipsum</p>
            <a href="#" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="img/s-5.jpg" alt="">
        <div class="content">
            <h3>amazing places</h3>
            <p>Lorem ipsum</p>
            <a href="#" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="img/s-6.jpg" alt="">
        <div class="content">
            <h3>amazing places</h3>
            <p>Lorem ipsum</p>
            <a href="#" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="img/s-7.jpg" alt="">
        <div class="content">
            <h3>amazing places</h3>
            <p>Lorem ipsum</p>
            <a href="#" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="img/s-8.jpeg" alt="">
        <div class="content">
            <h3>amazing places</h3>
            <p>Lorem ipsum</p>
            <a href="#" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="img/s-9.webp" alt="">
        <div class="content">
            <h3>amazing places</h3>
            <p>Lorem ipsum</p>
            <a href="#" class="btn">see more</a>
        </div>
    </div>
</div>
</section>

<!-- gallery section ends -->

<!-- review section start -->

<section class="review" id="review">
    <h1 class="heading">
        <span>r</span>
        <span>e</span>
        <span>v</span>
        <span>i</span>
        <span>e</span>
        <span>w</span>
    </h1>
    <div class="swiper mySwiper review-slider">
        <div class="swiper-wrapper wrapper">
            <div class="swiper-slide">
                <div class="box">
                    <img src="img/pic1.jpg" alt="">
                    <h3>Joy Yang</h3>
                    <p>Joy has over 10 years of experience in project management.
                        He holds a Master's degree in Business Management and PMP certification.
                        He is responsible for planning and executing projects, ensuring their successful completion on time and within budget.
                        He also actively interacts with clients, taking into account their needs and providing quality service.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="box">
                    <img src="img/pic2.jpg" alt="">
                    <h3>Spitz Márk  </h3>
                    <p>Márk has more than 20 years of experience in company management.
                        He has a Master's degree in Business Administration and has successfully managed several
                        Spitz Márk is a director of XYZ Company,and he is responsible for developing and implementing
                        the development strategy, managing personnel and ensuring the financial stability of the company.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="box">
                    <img src="img/pic-3.jpg" alt="">
                    <h3>Sakhidod Amonkhojaev</h3>
                    <p>I have a bachelor's degree in web development and over 2 years of experience in creating and managing websites.
                        My specialty is user experience and web design.
                        My goal is to make the Internet more informative and accessible to everyone.
                        I created this site to share knowledge and experience in various fields and to help entrepreneurs and companies expand their online presence.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="box">
                    <img src="img/pic4.jpg" alt="">
                    <h3>Maxim Curos</h3>
                    <p>Maxim is a leader in the field of information technology. It specializes
                        in software development and cloud solutions andis known for its innovation and high quality products.
                        He is our long-term partner because we share the same values ​​of innovation and accessibility.
                        He is  support our mission of making knowledge accessible to everyone.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- review section ends -->

<!-- contact section starts -->

<section class="contact" id="contact">
    <h1 class="heading">
        <span>c</span>
        <span>o</span>
        <span>n</span>
        <span>t</span>
        <span>a</span>
        <span>c</span>
        <span>t</span> 
    </h1>
    <div class="row">
        <div class="img">
            <img src="img/contact-img2.jpg" alt="">
        </div>
        <form action="">
            <div class="inputBox">
                <input type="text" placeholder="name">
                <input type="email" placeholder="email">
            </div>
            <div class="inputBox">
                <input type="number" placeholder="number">
                <input type="text" placeholder="subject">
            </div>
            <textarea placeholder="message" name="" cols="30" rows="10"></textarea>
            <input type="submit" class="btn" value="send message">
        </form>
    </div>
</section>

<!-- contact section ends -->

<!-- brand section -->

<section class="brand-container">
    <div class="swiper mySwiper brand-slider">
        <div class="swiper-wrapper wrapper">
            <div class="swiper-slider"><img src="" alt=""></div>
            <div class="swiper-slider"><img src="" alt=""></div>
            <div class="swiper-slider"><img src="" alt=""></div>
            <div class="swiper-slider"><img src="" alt=""></div>
            <div class="swiper-slider"><img src="" alt=""></div>
            <div class="swiper-slider"><img src="" alt=""></div>
        </div>
    </div>
</section>

<!-- footer section -->

<div class="footer">
    <div class="box-container">
        <div class="box">
            <h3>about us</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem commodi possimus ullam tenetur sit doloribus soluta officiis illo voluptatum.
                Quam beatae accusamus explicabo corrupti quia! Natus praesentium magnam expedita quasi?</p>
        </div>
        <div class="box">
            <h3>branch locations</h3>
            <a href="#">Budapest</a>
            <a href="#">Italy</a>
            <a href="#">Turkey</a>
            <a href="#">Morocco</a>
            <a href="#">Laos</a>
        </div>
        <div class="box">
            <h3>uick links</h3>
            <a href="#">home</a>
            <a href="#">book</a>
            <a href="#">package</a>
            <a href="#">services</a>
            <a href="#">gallery</a>
            <a href="#">review</a>
            <a href="#">contact</a>
        </div>
        <div class="box">
            <h3>follow us</h3>
            <a href="#">facebook</a>
            <a href="#">instagram</a>
            <a href="#">twitter</a>
            <a href="#">likeddin</a>
        </div>
    </div>
    <h1 class="credit">created by <span>Dailywebdesign</span> | all rights reserved!!</h1>
</div>




















<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- custome js file link -->
    <script src="App.js"></script> 
</body>
</html>