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
          <form id="quick_find" name="quick_find" action = "">
                <!-- <input id="keyword" size="10" maxlength="50" value="" placeholder="Introduceți numele produsului..." type="text" autocomplete="off"> -->
                <button type="submit" disabled style="display: none" aria-hidden="true"></button>
                <input id="keyword" size="10" maxlength="50" value="" placeholder="Enter product name..." type="text" autocomplete="off">
                <!-- <button type="submit">Cauta</button> -->
                <button id="quick_find_btn" type="button">Search</button>
          </form>
        </div>
      </div>
      <div class="navmenu">
        <ul class="navbarUL">
        <?php

            echo anchor(base_url().'index.php/'.$profilepage, '<li><i class="fas fa-user"></i></li>', '');

        ?>
          <!-- <li><i class="fas fa-star"></i></li> -->
          <a href="<?php echo base_url(); ?>index.php/CartController">
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
                <img src="<?php echo base_url().'img/'.$image[$j]; ?>" width="60%" alt="lettuce" />
              </a>
            </div>
            <div class="desc">
              <h3><?php echo anchor('product/'.$id[$j] , $name[$j] , ''); ?></h3>
              <p><?php echo $description[$j]; ?></p>						
              <p><?php echo $price[$j]; ?> RON</p>
              <?php if ($logged_in == true) { ?>
              <a href="<?php echo base_url(); ?>index.php/insert/<?php echo $id[$j]; ?>">
               <input type="button" class="btn" value="Add to cart" onclick="addToCart()"/>
              </a>
              <?php } else { ?>
              <a>
               <input type="button" class="btn" value="Not logged in" onclick="addToCart()"/>
              </a>
              <?php } ?>
            </div>
          </article>
          <hr>

        <?php }
      
      ?>

    </section>
  </div>
    <div class="footer">
        <ul class="footercontent">
        <!--
          <li><i class="fab fa-facebook"></i></li>
          <li><i class="fas fa-envelope-open-text"></i></li>
          <li><i class="fab fa-twitter"></i></li>
        -->
        </ul>
      </div>
    
      <script>
        const quick_find_btn = document.getElementById("quick_find_btn");
        const keyword = document.getElementById("keyword");

        keyword.addEventListener("keyup", function(event) {
          if (event.code === 'Enter') {
            event.preventDefault();
            quick_find_btn.click();
          }
        });
        
        quick_find_btn.addEventListener("click", () => {
          
          console.log("Search button pressed.");
          window.location = '<?php echo base_url(); ?>index.php/searches/ALL/nodiscount/'.concat(keyword.value);

        });
      </script>

  </body>
</html>
