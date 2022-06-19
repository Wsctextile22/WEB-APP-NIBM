<?php 

include("../db.php");
session_start();




echo '<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="workers-list.css">
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
     <!-- ===== Link Swiper\'s CSS ===== -->
     <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

     <!-- ===== Fontawesome CDN Link ===== -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      
          <img class="logo_design" src="../images/wsc-modified.png" alt="logo">
      
      <span class="logo_name">WSC</span>
    </div>
    <ul class="nav-links">
    <li>
      <a href="qualityCheckerDashboard.php" class="">
        <i class=" bx-grid-alt" ></i>
        <span class="links_name">Overview</span>
      </a>
    </li>
    <li>
      <a class="active">
        <i class="bx bx-user"></i>
        <span class="links_name">Profile</span>
      </a>
    </li>

    <li>
      <a href="cammera-barcode.php">
        <i class="bx bx-user"></i>
        <span class="links_name">Quality Check</span>
      </a>
    </li>
    <li>
      <a href="workers_list.php">
        <i class="bx bx-user"></i>
        <span class="links_name">Workers</span>
      </a>
    </li>
    <li>
      <a href="add-product-quality.php">
        <i class="bx bx-user" ></i>
        <span class="links_name">Production Details</span>
      </a>
    </li>

   
  </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class="bx bx-menu sidebarBtn"></i>
        <span class="dashboard">Workers</span>
      </div>
    
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        
        <section>
    
          <div class="swiper mySwiper container">
            <div class="swiper-wrapper content">';
            $SQL = "select account.firstname, account.lastname from account where usertype='Worker' ";
            $exeSQL=mysqli_query($conn, $SQL) or die(mysqli_error($conn));

            
              echo'
              <div class="swiper-slide card">
                <div class="card-content">
                  <div class="image">
                    <!--<img src="images/img1.jpg" alt="">-->
                  </div>';

                while($array=mysqli_fetch_array($exeSQL))
                {
                    echo'
                    <div class="name-profession">
                    <span class="name">'.$array['firstname'].'  '.$array['lastname'].'</span>
                    <span class="profession">worker</span>
                  </div>
      
                  <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                  </div>
      
                  <div class="button">
                    
                  </div>
                </div>
              </div>';
                }
                  
            
            
             
      echo'
            </div>
          </div>
      
          <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </section>
        <!-- Swiper JS -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 3,
      spaceBetween: 30,
      slidesPerGroup: 3,
      loop: true,
      loopFillGroupWithBlank: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>
      </div>

     
    </div>
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
      sidebar.classList.toggle("active");
      if(sidebar.classList.contains("active")){
      sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
    }else
      sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
    </script>

</body>
</html>

'; 
?>