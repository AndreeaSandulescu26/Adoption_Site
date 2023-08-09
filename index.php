<?php

//start session
session_start();

require_once('php/CreateDb.php');
require_once ('./php/component.php');

//create instance of CreateDb class
$db=new CreateDb(dbname:"Petdb",tablename:"Pettb");

if (isset($_POST['add'])){
 ///  print_r($_POST['pet_id']);
     if(isset($_SESSION['cart'])){
         
         $item_array_id = array_column($_SESSION['cart'], "pet_id");
         
         if(in_array($_POST['pet_id'], $item_array_id)){
            echo "<script>alert('The pet is already added in the cart!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{
              $count = count($_SESSION['cart']);
            $item_array = array(
                'pet_id' => $_POST['pet_id']
            );

            $_SESSION['cart'][$count] = $item_array;
             print_r($_SESSION['cart']);
         }
         
     }else{
         $item_array = array(
                'pet_id' => $_POST['pet_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
     }
}

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["pet_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'index.php'</script>";
          }
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
    <title>FOREVERHome</title>
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel = "stylesheet" href = "bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel = "stylesheet" href = "css/main.css">
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-customclass  py-4 fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="index.php">
                <img src="images/logo.png" alt="site icon" width="120" >
                <span class = "text-uppercase fw-lighter ms-2" >ForeverHome</span>
            </a>
            <div class="order-lg-2 nav-btns">
                <button type="button" class="btn position-relative">
                   <a href="#shopping-cart" class="nav-item nav-link active">
                    <i class = "fas fa-shopping-cart"></i>
                    
                    <?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-dark\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-warning bg-dark\">0</span>";
                        }

                        ?>
                    
                    </a>
                </button>

            </div>
            <button class = "navbar-toggler border-0" type="button" data-bs-toggle = "collapse" data-bs-target = "#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse order-lg-1" id="navMenu">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link" href="#header">HOME</a>
                    </li>
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link" href="#aboutus">ABOUT US</a>
                    </li>
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link" href="#dogs">DOGS and CATS</a>
                    </li>
                  
                    <li class="nav-item px-2 py-2 border-0">
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->  
  
  <!-- header -->
  
  <header id = "header" class = "vh-100 carousel slide" data-bs-ride = "carousel" style = "padding-top: 104px;">
        <div class = "container h-75 d-flex align-items-center carousel-inner">
         <div class="text-center carousel-item active">
          <h2 class="text-capitalize mb-5 text-black">No better option than adoption</h2>

      </div>
      <div class="text-center carousel-item">
             <a class="btn mb-5 text-uppercase" href="#dogs"><b>Adopt Now</b></a>
          
      </div>
      </div>
      
      <button class = " h-75 carousel-control-prev" type = "button" data-bs-target="#header" data-bs-slide = "prev">
      <span class = "carousel-control-prev-icon"></span>
        </button>
        
        <button class = " h-75 carousel-control-next" type = "button" data-bs-target="#header" data-bs-slide = "next">
            <span class = "carousel-control-next-icon"></span>
        </button>
      
  </header>
  
  <!-- end of header -->
  
  
  <!-- AboutUs -->
  
  <section id="aboutus" class="container" style = "padding-top: 204px;">
    <div class="text-center">
         <h2 class="text-capitalize mb-5 text-black">About Us</h2>
     </div>
    <div class="row">
            <div class="col-md-6 text-center text-md-left align-self-center content">
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quia facere, aspernatur porro quas fuga culpa, beatae sed illo neque consequuntur quos voluptatum? Soluta tempora blanditiis, quisquam tempore quam delectus.</p> 
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error velit perferendis possimus incidunt quaerat repudiandae assumenda obcaecati praesentium, iusto nisi qui voluptatum dolore nesciunt laboriosam ducimus, distinctio adipisci. Sequi, asperiores.</p>
               
                <a class="btn mb-5 text-uppercase" href="#dogs"><b>Adopt Now</b></a>
            </div>
            
            <div class="col-md-6 image">
                <img src="images/about.png" alt="">
            </div>
        
    </div>
    
    
</section>
  
  <!-- end of AboutUs -->
  
  
  
  <!-- Dogs and Cats -->
   <section id="dogs" class="container" style = "padding-top: 204px;">
    <div class="text-center">
         <h2 class="text-capitalize mb-5 text-black">Dogs and Cats</h2>
     </div>
     <?php require_once ("index.php"); ?>
     <div class="row text-center py-5">
       <?php
                $result = $db->getData();
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['pet_name'], $row['pet_price'], $row['pet_image'], $row['id']);
                }
            ?>
         
     </div>
   
    </section>
     
      <!-- end of Dogs and Cats-->
      
    
    
    <!-- My Cart -->

    
    <section id="shopping-cart" class="container" style = "padding-top: 204px;">
    <div class="text-center">
         <h2 class="text-capitalize mb-5 text-black">My Cart</h2>
     </div>
     <div class="row text-center py-5">
      
        <hr>
                    
             <?php

                $total = 0;
                    if (isset($_SESSION['cart'])){
                        $pet_id = array_column($_SESSION['cart'], 'pet_id');

                        $result = $db->getData();
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($pet_id as $id){
                                if ($row['id'] == $id){
                                    cartElement($row['pet_image'], $row['pet_name'],$row['pet_price'], $row['id']);
                                    $total = $total + (int)$row['pet_price'];
                                }
                            }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }

                ?>

     
      <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25" >

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>AMOUNT PAYABLE</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>$<?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>$<?php
                            echo $total;
                            ?></h6>
                    </div>
                </div>
                 <a class="btn mb-5 text-uppercase" href="#success"><b>Adopt Now</b></a>
            </div>
         </div>
              
                
        </div>
     
       
   
    </section>
    
    
    <!-- end of my cart -->
  
  
  <!-- SUCCESS -->
  
  <section id="success" class="container" style = "padding-top: 350px;">
    <div class="text-center">
         <h2 class="text-success mb-5 text-black">We will contact you for more details!</h2>
         <h2 class="text-success mb-5 text-black">Thank you!</h2>
     </div>
  
    </section>
  <!-- end of SUCCESS -->
  
  

   
   <!-- jquery -->
    <script src="js/jquery-3.6.0.js"></script>
       
   
   <!-- bootstrap js -->
   <script src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
   
   <!-- custom js -->
   <script src="js/script.js"></script>
    
</body>
</html>