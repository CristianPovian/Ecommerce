<html>
  <head>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta content="utf-8" http-equiv="encoding" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/cart.css" />
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link
      rel="stylesheet"
      href="//use.fontawesome.com/releases/v5.0.7/css/all.css"
    />
    <title>Pink Friday - UVT 2020</title>

    <link rel="shortcut icon" href="<?php echo base_url(); ?>img/profile.png" />
    
  </head>

  <body>

    <nav class="nav1">
        <div class="logosearch">
          <div class="navlogo">
            <a href="MainPageController" title="Pink Friday - UVT 2020"
              ><img src="<?php echo base_url(); ?>img/cover.png" alt="logo"
            /></a>
          </div>
          <div class="navsearch">
              <form id="quick_find" name="quick_find" onsubmit="cauta();return false;">
                  <input id="keyword" size="10" maxlength="50" value="" placeholder="Introduceți numele produsului..." type="text" autocomplete="off">
              <button type="submit">Cauta</button>
            </form>
          </div>
        </div>
        <div class="navmenu">
          <ul class="navbarUL">
          <?php

             echo anchor($profilepage, '<li><i class="fas fa-user"></i></li>', '');

          ?>
            <li><i class="fas fa-star"></i></li>
            <a href="CartController">
          <li><i class="fas fa-shopping-cart"></i></li>
        </a>
          </ul>
        </div>
      </nav>
    
    <div class="container">
    
    <section id="cart">
    <?php
    
    for ($i = 0; $i < $n; $i++) {?>

        <article class="product">
        <header>
        <a class="remove">
        <img src="<?php echo base_url().'ItemPictures/'.$cart_data[$i][3]; ?>" alt="gravel">
        
        <h3>Remove product</h3>
        </a>
        </header>
        
        <div class="content in">
        
        <h1 class ="item-name"><?php echo $cart_data[$i][0]; ?></h1>
        <?php echo $cart_data[$i][4]; ?>
        </div>
        
        <footer class="content">
        <span class="qt-minus">-</span>
        <span class="qt"><?php echo $cart_data[$i][1]; ?></span>
        <span class="qt-plus">+</span>
        
        <h2 class="full-price">
        <?php echo $cart_data[$i][2]*$cart_data[$i][1]; ?> RON
        </h2>
        
        <h2 class="price">
        <?php echo $cart_data[$i][2]; ?> RON
        </h2>
        </footer>
        </article>
      
    <?php }

    ?>

    </section>
    
    </div>
    
    <div id="site-footer">
    <div class="container clearfix">
    
    <div class="left">
    <h2 class="subtotal">Subtotal: <span><?php echo $subtotal; ?></span> RON</h2>
    <h3 class="tax">Taxes (5%): <span><?php echo $taxes; ?></span> RON</h3>
    <h3 class="shipping">Shipping: <span><?php echo $shipping; ?></span> RON</h3>
    </div>
    
    <div class="right">
    <h1 class="total">Total: <span><?php echo $subtotal + $taxes + $shipping; ?></span> RON</h1>
    <a class="btn" href = "CheckoutController">Checkout</a>
    </div>
    
    </div>
    </div>

    <div class="footer1">
        <ul class="footercontent">
          <li><i class="fab fa-facebook"></i></li>
          <li><i class="fas fa-envelope-open-text"></i></li>
          <li><i class="fab fa-twitter"></i></li>
        </ul>
    </div>
    
    <script src="<?php echo base_url(); ?>/JavaScript/cart.js"></script>
  </body>
</html>
