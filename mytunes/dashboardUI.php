<?php
   session_start();
   include("connection.php");
   if(!isset($_SESSION["role"])){
    header("Location:loginUI.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="dashboard.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Navigation -->
    <div class="sidebar">
         <div class="close-btn"><ion-icon name="close" id="close-icon"></ion-icon>

         </div>
         <div class="menu">
            <a href="#overview"><ion-icon name="desktop"></ion-icon> Home</a>
            <a href="UsersList"><ion-icon name="people"></ion-icon> Users</a>
            <a href="#music"><ion-icon name="list-box"></ion-icon> Products</a>
            <a href="editProfile.php"><ion-icon name="settings"></ion-icon></i> Edit Profile</a>
            <a href="#"><ion-icon name="ribbon"></ion-icon> About us</a>
         </div>
    </div>
    <div class="menu-btn"><ion-icon name="menu" id="menu-icon"></ion-icon>
    </div>
    <!-- Overview -->
    <section id="overview">
      <div class="profile-section">
          <header>
             <div class="profile">
                 <img src="/CSS/profile.png" alt="profile">
             </div>
             <h2>Hi&nbsp;<?php echo $_SESSION["username"]?></h2>
             <h4 align="center"><?php echo $_SESSION["role"]?></h4>
             <form action="logout" method="POST">
                  <input type="submit" id="submit" name="logout" value="Logout">
             </form>        
          </header>
       </div> 
        <div class="content">
            <h2>my Tunes</h2>
            <h5>Your music, movies, and TV shows take center stage.</h5>
            <p class="overview_con">myTunes is the best way to organize and enjoy the music, movies, and TV shows you already have — and shop for the ones you want. Enjoy all the entertainment myTunes has to offer on your Mac and PC.</p>
        </div>
    </section>
    <!-- Music -->
    <section id="music">
        <div class="music-content">
             <h2><i class="fas fa-music"></i>&nbsp;Music</h2>
             <h2>45 million songs. Zero ads.</h2>
             <p class="music_con">Stream over 45 million songs, ad-free. Or download albums and tracks to listen to offline. All the music in your personal myTunes library — no matter where it came from — lives right alongside the Orange Music catalog. Start your free three-month trial with no commitment, and cancel anytime.</p>
             <button value="Start your trail now" id="music-btn">Start your trail now</button>
             <p class="music_con2">Orange Music is available in myTunes, and for iOS and Android devices.</p>
             <figure class="mobile">
                <img src="/CSS/mobile.png" alt="mobile image">
             </figure>
        </div>
    </section>

    <!-- Movie -->
    <section id="movie">
        <div class="movie-content">
            <h2>The movie and TV collection you always wished for. Granted.<h2>
            <p class="movie_con">With over 100,000 movies and TV shows to choose from, there is always something great to watch on myTunes and if you watch on Orange TV 4K, you will be able to enjoy a tremendous selection of your favorite content in 4K HDR. So get ready to enjoy episodes of your favorite TV shows or hit movies you have been waiting to see — anytime, anywhere. Just tap to play, or even download if you are going somewhere you wonld not have Wi-Fi.</p>
            <button value="Read more" id="movie-btn">Read more</button>
            <figure class="movie-screen">
                <img src="/CSS/myTunes.png" alt="mytunes site">
            </figure>
        </div>
    </section>

    <!-- Entertainment -->
    <section id="entertainment">
        <div class="enter-content">
            <h2>A world of entertainment. Available wherever you are.</h2>
            <p class="enter_con">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem veniam nobis, nisi ut expedita, doloribus reprehenderit explicabo non velit repellat alias saepe inventore repellendus? Molestias suscipit eos tempora? Quae quaerat cumque in veritatis impedit dolorum sapiente recusandae minima quo aperiam quam, excepturi quasi totam ad quas? Ipsam laudantium soluta delectus!</p>
        </div>
    </section>

    <!-- GiftCards -->
    <?php if(($_SESSION["role"]=="admin") || ($_SESSION["role"]=="manager")) {?>
    <section id="Gift-card">
       <div class="gift-content">
          <figure class="card">
             <img src="/CSS/cards.png" alt="cards">
          </figure>
          <div class="gift-inner-con">
             <h3>Gift Cards</h3>
             <p class="inner-con2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque expedita tempore quasi omnis a aut et totam illo fuga accusamus dolorum vero, ut harum consectetur. Minima molestias officiis culpa non sed dicta itaque. Et aliquam illo obcaecati molestias veritatis porro. </p>
             <p>Already have an Orange MyTunes Music Gift Card?</p>
             <hr>
             <a href="#" id="redeem">> Redeem</a>
          </div>
       </div>
    </section>
    <?php }?>

    <!-- Footer -->
    <?php if($_SESSION["role"]=="admin"){ ?>
    <section id="footer">
        <div class="footer-box">
           <div class="footer-1 box">
               <h3>Shop & Learn</h3>
               <hr>
               <ul>
                  <li><a href="#">Music</a></li>
                  <li><a href="#">Movies</a></li>
                  <li><a href="#">Apps</a></li>
                  <li><a href="#">Shows</a></li>
                  <li><a href="#">Gift Cards</a></li>
                </ul>
          </div>
          <div class="footer-2 box">
              <h3>Orange store</h3>
              <hr>
              <ul>
                  <li><a href="#">Find a Store</a></li>
                  <li><a href="#">Today at Orange</a></li>
                  <li><a href="#">Orange Camp</a></li>
                  <li><a href="#">Financing</a></li>
                  <li><a href="#">Order Status </a></li>
              </ul>
          </div>
          <div class="footer-3 box">
             <h3>Education & Business</h3>
             <hr>
             <ul>
                 <li><a href="#">Orange & Education</a></li>
                 <li><a href="3">Shop For College</a></li>
                 <li><a href="#">Orange & Business</a></li>
                 <li><a href="#">Shop For Business</a></li>
                 <li><a href="#">Jobs</a></li>
              </ul>
           </div>
           <div class="footer-4 box">
              <h3>About Orange</h3>
              <hr>
              <ul>
                  <li><a href="#">Newsroom</a></li>
                  <li><a href="#">Orange Leadership</a></li>
                  <li><a href="#">Investors</a></li>
                  <li><a href="#">Events</a></li>
                  <li><a href="#">Contact Orange</a></li>
              </ul>
           </div>
        </div>
    </section>
  <?php  }?>
    <script src="dashboard.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
</html>