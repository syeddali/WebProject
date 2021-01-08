<?php

// if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $con= mysqli_connect('localhost','root','','crud_with_login');

    if (!$con) {
        die("Database connection failed due to".mysqli_connect_error());
    }else{
        // echo "Database sucessfully Connected.";
    }

// }
?>
<html>
<head>
    <title>Products</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <!-- Boootstrap links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- javascript links -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <style>
        .fa:hover {
            opacity: 0.7;
        }
        
        .bg {
            background-image: url(img/header3.jpg);
        }
        
        .bg2 {
            background-image: url(img/bg4.jpg);
        }
    </style>
</head>

<body>


    <!-- Icon and Search Bar -->

    <div class="container-fluid">
        <div class="row bg">

            <div class="col-lg-2 col-md-2 mt-3 mb-2">
                <img src="img/logo.png" style="height: 80px;width: 80px">
            </div>
            <div class="col-lg-7 col-md-7 ">
            </div>
            <div class="col-lg-3 col-md-3" style="margin-top:15px">

                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </form>

                <div class="row" style="margin-top: 10px">
                    <a href="https://www.facebook.com/"><img class="fa ml-4" src="img/facebook-icon.png" height="30px" width="30px"></a>
                    <a href="https://www.gmail.com/"><img class="fa" src="img/gmail.png" height="30px" width="30px" style="margin-left: 15px "></a>
                    <a href="https://www.twitter.com/"><img class="fa" src="img/twitter.png" height="30px" width="30px" style="margin-left: 15px "></a>
                    <a href="https://www.instagram.com/"><img class="fa" src="img/instagram.png" height="30px" width="30px" style="margin-left: 15px "></a>

                </div>
            </div>
        </div>

    </div>





    <!-- Navbar -->


    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark nav-fill">
        <a class="navbar-brand" href="main.php"><b>Shing Pong</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="main.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="main.php">About Us</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="Products.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ContactUs.html">Contact Us</a>
                </li>

            </ul>
        </div>
    </nav>


   <section class="container- my-5 ">

        <div class="cards col-sm-12 col-md-12 col-lg-12 " >
        <h2 class="section-header__title">Our Products</h2>
        <div class="row text-center dresscard ">

            <?php
                $sqli="SELECT  * FROM `crud_with_login`.`products`  ORDER BY id ASC";
                $result=mysqli_query($con,$sqli);

                if(mysqli_num_rows($result)>0){
                    while ($row=mysqli_fetch_array($result)){       
              ?>

            <div class="col-sm-3 col-md-3 col-lg-3">
                <form action="products.php?action=add&id=<?php echo $row["id"] ?>" method="POST">
                    <div class="card shadow">
                        <a href="Products Details.html"><img src="./img/uploads/<?=$row['image']?>" width=200px height=300px></a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title" name="product_name"><?php echo $row["name"]; ?></h5>
                        <p><h5 class="price">
                                <span name="product_price">$<?php echo $row["price"]; ?></span>
                            </h5></p>
                       
                        <button class="btn btn-warning" type="submit" name="add">Add to Cart </button>
                    </div>
                </form>
            </div>
            <?php
                    }
                }
            ?>
        
        </div>
        </div>
        
    </section>




    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>



    <hr>
    <!-- Footer -->

    <!-- Footer -->
    <footer>

        <!-- Footer Links -->
        <div class="container-fluid">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-lg-5 col-md-5 col-sm-5 mx-auto">

                    <!-- Content -->
                    <h5 class=" mt-3 mb-4 ml-3"><b>ABOUT US</b></h5>
                    <p class="ml-3">At ShingPong.com, we only sell genuine, authentic and brand new mobile phones with company warranty along with a 7 day replacement policy, same day delivery in Lahore and urgent shipping to Karachi, Islamabad, Peshawar and all across
                        Pakistan. With our safe and secured payment methods and easy returns you can always trust us for secured transactions.</p>

                </div>

                <div class="col-lg-1 col-md-1 col-sm-1 "></div>
                <!-- Grid column -->

                <hr>

                <!-- Grid column -->
                <div class="col-md-2 col-md-2 col-sm-2 mx-auto">

                    <!-- Links -->
                    <h5 class=" mt-3 mb-4"><b>How To</b></h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Order</a>
                        </li>
                        <li>
                            <a href="#!">Pay</a>
                        </li>
                        <li>
                            <a href="#!">Return</a>
                        </li>
                        <li>
                            <a href="#!">Buy More</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <hr>

                <!-- Grid column -->
                <div class="col-md-2 col-md-2 col-sm-2 mx-auto">

                    <!-- Links -->
                    <h5 class="mt-3 mb-4"><b>Back To</b></h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Home</a>
                        </li>
                        <li>
                            <a href="#!">Products</a>
                        </li>
                        <li>
                            <a href="#!">Contact Us</a>
                        </li>
                        <li>
                            <a href="#!">About Us</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <hr>

                <!-- Grid column -->
                <div class="col-md-2 col-md-2 col-sm-2 mx-auto">

                    <!-- Links -->
                    <h5 class="mt-3 mb-4"><b>Products</b></h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Iphone</a>
                        </li>
                        <li>
                            <a href="#!">Samsung</a>
                        </li>
                        <li>
                            <a href="#!">Huawei</a>
                        </li>
                        <li>
                            <a href="#!">Sony</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <hr>




        <!-- Social buttons -->
        <div class="text-center mx-auto">
            <a href="https://www.facebook.com/"><img class="fa" src="img/facebook-icon.png" height="50px" width="50px"></a>
            <a href="https://www.gmail.com/"><img class="fa" src="img/gmail.png" height="30px" width="30px" style="margin-left: 15px "></a>
            <a href="https://www.twitter.com/"><img class="fa" src="img/twitter.png" height="50px" width="50px" style="margin-left: 15px "></a>
            <a href="https://www.instagram.com/"><img class="fa" src="img/instagram.png" height="50px" width="50px" style="margin-left: 15px "></a>

        </div>




        <!-- Copyright -->
        <div class="footer-copyright text-center mt-2">© 2019 Copyright :
            <a href="main.php"> ShingPong.com</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->







    <!-- Javascript Files -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>