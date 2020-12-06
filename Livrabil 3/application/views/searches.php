<html>
  <head>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta content="utf-8" http-equiv="encoding" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/searches.css" />

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="//use.fontawesome.com/releases/v5.0.7/css/all.css"
    />
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <title>Pink Friday - UVT 2020</title>

    <link rel="shortcut icon" href="img/profile.png" />
  </head>

  <body>
    <nav class="nav1">
      <div class="logosearch">
        <div class="navlogo">
        <?php echo anchor('MainPageController', '<img src=" '.base_url().'img/cover.png " />', ''); ?>
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
          <?php echo anchor('SignController', '<li><i class="fas fa-user"></i></li>', ''); ?>
          <li><i class="fas fa-star"></i></li>
          <a href="cart.html">
        <li><i class="fas fa-shopping-cart"></i></li>
      </a>
        </ul>
      </div>
    </nav>


  <div class="container">

      <hgroup>
        <h1>Search Results</h1>
       <h5><?php echo $i; ?> results were found for the search <?php echo $search; ?></h5>								
      </hgroup>
  
    <section class="results">

      <?php

        for ($j = 0; $j < $i; $j++) { ?>

          <article class="row">
            <div class="image">
              <a href="#" title="Lettuce Seeds" class="thumbnail">
                <img src="<?php echo base_url().'ItemPictures/'.$image[$j]; ?>" width="60%" alt="lettuce" />
              </a>
            </div>
            <div class="desc">
              <h3><?php echo anchor('product/'.$id[$j] , $name[$j] , ''); ?></h3>
              <p><?php echo $description[$j]; ?></p>						
              <p><?php echo $price[$j]; ?> RON</p>
              <input type="button" class="btn" value="Add to cart" onclick="addToCart()"/>
            </div>
          </article>
          <hr>

        <?php }
      
      ?>

    </section>
  </div>
    <div class="footer">
        <ul class="footercontent">
          <li><i class="fab fa-facebook"></i></li>
          <li><i class="fas fa-envelope-open-text"></i></li>
          <li><i class="fab fa-twitter"></i></li>
        </ul>
      </div>


  </body>
</html>
