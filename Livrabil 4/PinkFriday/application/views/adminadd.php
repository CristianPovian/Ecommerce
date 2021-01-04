<html>
  <head>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta content="utf-8" http-equiv="encoding" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/adminadd.css" />

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

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
        <!--  
        <a href="mainpage.php" title="Pink Friday - UVT 2020"
            ><img src="<?php echo base_url(); ?>img/cover.png" alt="logo"
          /></a> -->
        </div>
        <div class="navsearch">
          <!--
            <form id="quick_find" name="quick_find" onsubmit="cauta();return false;">
                <input id="keyword" size="10" maxlength="50" value="" placeholder="Introduceți numele produsului..." type="text" autocomplete="off">
            <button type="submit">Cauta</button>
          </form>
          -->
        </div>
      </div>
      <div class="navmenu">
        <ul class="navbarUL">
          <!--
          <a href="loginsignup.php">
          <li><i class="fas fa-user"></i></li>
        </a>
          <a href="cart.html">
        <li><i class="fas fa-shopping-cart"></i></li>
      </a>
          -->
        </ul>
      </div>
    </nav>


    <div class="container">
        <div class="main-body">
        
                  <div class="card">
                    <div class="card-body">
                        <form action="<?php echo base_url();?>index.php/adding" method="POST" id="formular" enctype="multipart/form-data">
                          <div class="row">
                            <label for="name">Product name</label><br>
                            <input type="text" id="name" name="name"><br>
                          </div>
                          <div class="row">
                            <label for="price">Product price</label><br>
                            <input type="number" id="price" name="price"><br>
                          </div>
                          <div class="row">
                            <label for="image">Product image</label><br>
                            <input type="file" id="image" name="image"><br>
                          </div>
                          <div class="row">
                            <label for="desc">Description</label><br>
                            <input type="text" id="desc" name="desc"><br>
                          </div>	
                          <div class="row">
                            <label for="category">Product category</label><br>
                            <input type="text" id="category" name="category"><br>
                          </div>
                        </form> 
                    </div>
                  </div>
				  <!-- <input type="button" form ="formular" class="btnadd" value="Add the new product" onclick="addItem()"/> -->
				  <input type="submit" form ="formular" class="btnadd" value="Add the new product"/>
                  <!-- <input type="button" class="btnimport" value="Import data from csv file" onclick="importCSV()"/> -->
                </div>
        </div>
    </div>
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

    const name = document.querySelector("#name");
    const price = document.querySelector("#price");
    const image = document.querySelector("#image");
    const desc = document.querySelector("#desc");
    const category = document.querySelector("#category");

    function addItem() {
      console.log("In addItem function");
          var req = new XMLHttpRequest();
          req.onload = function() {

            console.log(this.responseText);

          }
          req.open("post", "item", true);

          var sendData = {
            name: name.value,
            price: price.value,
            image: "NO IMAGE",
            description: desc.value,
            units_sold: 0,
            category: category.value
          };

          req.send(JSON.stringify(sendData));
    }  

  </script>

  </body>
</html>
