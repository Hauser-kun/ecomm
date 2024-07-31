  <?php

    include '../dbcon.php';
    ?>

  <?php

    if (isset($_SESSION['login'])) {
        $user_id = $_SESSION['user_id'];
    } else {

        if (isset($skipLogin)) {
        } else {
            header('location:userlogin.php');
        }
    }
    ?>





  <!-- Start Header Style -->
  <header id="htc__header" class="htc__header__area header--one">
      <!-- Start Mainmenu Area -->
      <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
          <div class="container">
              <div class="row">
                  <div class="menumenu__container clearfix">
                      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                          <div class="logo">
                              <a href="index.php"><img src="images/logo/4.png" alt="logo images"></a>
                          </div>
                      </div>
                      <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                          <nav class="main__menu__nav hidden-xs hidden-sm">
                              <ul class="main__menu">
                                  <li class="drop"><a href="index.php">Home</a></li>
                                  <li class="drop"><a href="category_page.php">Category</a>
                                      <ul class="dropdown mega_dropdown">
                                          <!-- Start Single Mega MEnu -->
                                          <li><a class="mega__title" href="product_grid.php">Shop Pages</a>
                                              <ul class="mega__item">
                                                  <li><a href="product_grid.php">Product Grid</a></li>
                                                  <li><a href="cat_category.php">cart</a></li>
                                                  <li><a href="checkout.php">checkout</a></li>
                                                  <li><a href="card.php">wishlist</a></li>
                                              </ul>
                                          </li>
                                          <!-- End Single Mega MEnu -->
                                          <!-- Start Single Mega MEnu -->
                                          <li><a class="mega__title" href="product_grid.php">Variable Product</a>
                                              <ul class="mega__item">
                                                  <li><a href="#">Category</a></li>
                                                  <li><a href="#">My Account</a></li>
                                                  <li><a href="cart.php">Wishlist</a></li>
                                                  <li><a href="cart.html">Shopping Cart</a></li>
                                                  <li><a href="checkout.php">Checkout</a></li>
                                              </ul>
                                          </li>
                                          <!-- End Single Mega MEnu -->
                                          <!-- Start Single Mega MEnu -->
                                          <li><a class="mega__title" href="product_grid.php">Product Types</a>
                                              <ul class="mega__item">
                                                  <li><a href="#">Simple Product</a></li>
                                                  <li><a href="#">Variable Product</a></li>
                                                  <li><a href="#">Grouped Product</a></li>
                                                  <li><a href="#">Downloadable Product</a></li>
                                                  <li><a href="#">Simple Product</a></li>
                                              </ul>
                                          </li>
                                          <!-- End Single Mega MEnu -->
                                      </ul>
                                  </li>

                                  <li class="drop"><a href="#">Product</a>
                                      <ul class="dropdown">
                                          <li><a href="product_grid.php">Product Grid</a></li>
                                          <li><a href="product_details.php">Product Details</a></li>
                                      </ul>
                                  </li>
                                  <!-- <li class="drop"><a href="blog.html">blog</a>
                                            <ul class="dropdown">
                                                <li><a href="blog.html">Blog Grid</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                            </ul>
                                        </li> -->
                                  <li class="drop"><a href="#">Pages</a>
                                      <ul class="dropdown">
                                          <li><a href="blog.html">Blog</a></li>
                                          <li><a href="blog-details.html">Blog Details</a></li>
                                          <li><a href="cart.html">Cart page</a></li>
                                          <li><a href="checkout.php">checkout</a></li>
                                          <li><a href="contact.php">contact</a></li>
                                          <li><a href="product_grid.php">product grid</a></li>
                                          <li><a href="product_details.php">product details</a></li>
                                          <li><a href="card.php">wishlist</a></li>
                                      </ul>
                                  </li>
                                  <li><a href="contact.php">contact</a></li>
                              </ul>
                          </nav>

                          <div class="mobile-menu clearfix visible-xs visible-sm">
                              <nav id="mobile_dropdown">
                                  <ul>
                                      <li><a href="index.php">Home</a></li>
                                      <li><a href="blog.html">blog</a></li>
                                      <li><a href="#">pages</a>
                                          <ul>
                                              <li><a href="blog.html">Blog</a></li>
                                              <li><a href="blog-details.html">Blog Details</a></li>
                                              <li><a href="cart.html">Cart page</a></li>
                                              <li><a href="checkout.php">checkout</a></li>
                                              <li><a href="contact.php">contact</a></li>
                                              <li><a href="product_grid.php">product grid</a></li>
                                              <li><a href="product_details.php">product details</a></li>
                                              <li><a href="card.php">wishlist</a></li>
                                          </ul>
                                      </li>
                                      <li><a href="contact.php">contact</a></li>





                                  </ul>
                              </nav>
                          </div>
                      </div>
                      <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                          <div class="header__right">

                              <div class="header__search search search__open">
                                  <a href="#"><i class="icon-magnifier icons"></i></a>
                              </div>
                              <div class="header__account">
                                  <a href="login.php"><i class="icon-user icons"></i></a>
                              </div>
                              <div class="header__account">
                                  <a href="userlogout.php?logout=<?= $user_id ?>"><i class="icon-logout icons"></i></a>
                              </div>
                              <div class="header__account">



                                  <?php
                                    if (isset($_SESSION['login'])) {
                                        $select_user = mysqli_query($conn, "SELECT * from users where id=$user_id");
                                        if (mysqli_num_rows($select_user) > 0) {
                                            $fetch = mysqli_fetch_assoc($select_user);
                                        }
                                    ?>

                                      <a href="#"><i class=""> <?= $fetch['name'] ?></i></a>
                                  <?php
                                    }

                                    ?>





                              </div>
                              <div class="htc__shopping__cart">
                                  <a class="cart__menu" href="#"><i class="icon-handbag icons"></i></a>
                                  <a href="#"><span class="htc__qua">2</span></a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="mobile-menu-area"></div>
          </div>
      </div>
      <!-- End Mainmenu Area -->
  </header>
  <!-- End Header Area -->