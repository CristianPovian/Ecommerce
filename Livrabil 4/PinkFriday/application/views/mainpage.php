<?php

$connect = mysqli_connect("127.0.0.1", "root", '');
mysqli_select_db($connect, "Pink Friday");

$sqlQuery = "select item.name, item.image, item.price, discount.discount_percent, item.price-item.price*(discount.discount_percent*(0.01)), item.description, item.id from discount,item where discount.main_id = item.id";
$sqlExecQuery = mysqli_query($connect, $sqlQuery);  
$sqlQueryResult = mysqli_fetch_all($sqlExecQuery, $resulttype = MYSQLI_NUM);
$sqlQueryResult = array_values($sqlQueryResult);

$popularItemsSqlQuery = "select item.name, item.image, item.price, item.description, discount.discount_percent,
item.price-item.price*(discount.discount_percent*(0.01)), item.id
from item left join discount on item.id = discount.main_id
order by units_sold desc";
$popularItemsSqlExecQuery = mysqli_query($connect, $popularItemsSqlQuery);
$popularItemsSqlQueryResult = mysqli_fetch_all($popularItemsSqlExecQuery, $resulttype = MYSQLI_NUM);
$popularItemsSqlQueryResult = array_values($popularItemsSqlQueryResult);


?>

<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta content="utf-8" http-equiv="encoding" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/mainpage.css" />

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <title>Pink Friday - UVT 2020</title>

    <link rel="shortcut icon" href="<?php echo base_url(); ?>img/profile.png" />
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

              echo anchor($profilepage, '<li><i class="fas fa-user"></i></li>', '');

          ?>
          <!-- <li><i class="fas fa-star"></i></li> -->
          <a href="CartController">
          <li><i class="fas fa-shopping-cart"></i></li>
          </a>
        </ul>
      </div>
    </nav>

    <div class="footer">
      <ul class="footercontent">
      <!--
        <li><i class="fab fa-facebook"></i></li>
        <li><i class="fas fa-envelope-open-text"></i></li>
        <li><i class="fab fa-twitter"></i></li>
      -->
      </ul>
    </div>

    <nav class="main-menu">
      <ul>
        
      <li>        
      <?php echo anchor('searches/' , '<i class="fas fa-search"></i>
      <span class="nav-text">All Items</span>' , ''); ?>                           
      </li>    
        
      <li class="darkerlishadow">
      <?php echo anchor('searches/flower' , '<span class="iconify" data-icon="mdi-flower" data-inline="false"></span>
        <span class="nav-text1">Flowers</span>' , ''); ?>
      </li>
        
      <li class="darkerli">
      <?php echo anchor('searches/tree' , '<i class="fas fa-tree"></i>
      <span class="nav-text">Trees</span>' , ''); ?>
      </li>
        
      <li class="darkerli">
      <?php echo anchor('searches/seeds' , '<i class="fas fa-seedling"></i>
      <span class="nav-text">Seeds</span>' , ''); ?>
      </li>
        
      
      <li class="darkerli">
      <?php echo anchor('searches/tool' , '<i class="fas fa-tools"></i>
      <span class="nav-text">Gardening Tools</span>' , ''); ?>
      </li>
        
      <li class="darkerli">
      <?php echo anchor('searches/clothing' , '<i class="fas fa-tshirt"></i>
      <span class="nav-text">Gardening Clothes, Shoes</span>' , ''); ?>
      </li>

      <li class="darkerli">
      <?php echo anchor('searches/gift' , '<i class="fas fa-gifts"></i>
        <span class="nav-text">Gifts</span>' , ''); ?>
        </li>

      </ul>

      </nav>
        


    <div class="maincontent">
      
      <img src="<?php echo base_url(); ?>img/gardening.jpg" alt="garden">




    </div>

    

    <div class="container-fluid">
      <div class="px-lg-5">  
        
        <div class="row py-5">
          <div class="col-md-11 mx-auto">
            <div class="text-black p-4 shadow-lg rounded banner border border-dark">
              <h1 class="display-3">Deals of the Week</h1>
              <!-- <p class="lead">Discounts up to 70% (Hurry up, they only last until Sunday 23:59!)</p> -->
              <p class="lead">Discounts up to 70%</p>
              </p>
            </div>
          </div>
        </div>

        <div class="row">

          
        <?php for ($i = 0; $i < 4; $i++) {
          if (isset($sqlQueryResult[$i][0])) { ?>
              
              <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="bg-white rounded shadow-lg border border-dark">
                  <!-- <img src="<?php echo base_url().'ItemPictures/'.$sqlQueryResult[$i][1]; ?>" alt="" class="img-fluid card-img-top"> -->
                  <?php echo anchor('product/'.$sqlQueryResult[$i][6] , "<img src=".base_url()."ItemPictures/".$sqlQueryResult[$i][1]." alt='' class='img-fluid card-img-top'>", ''); ?>
                  <div class="p-4">
                    <h5> <?php echo anchor('product/'.$sqlQueryResult[$i][6] , $sqlQueryResult[$i][0] , 'class="text-dark"'); ?></h5>
                    <p class="small text-muted mb-0"><?php echo $sqlQueryResult[$i][5]?></p>
                    <div class="badge badge-danger px-3 rounded-pill font-weight-normal"><?php echo $sqlQueryResult[$i][3]?>%</div>
                    <div class="badge badge-danger px-3 rounded-pill font-weight-normal"><?php echo $sqlQueryResult[$i][2]?>Lei</div>
                    <div class="badge badge-success px-3 rounded-pill font-weight-normal"><?php echo $sqlQueryResult[$i][4]?>Lei</div>
                  </div>
                </div>
              </div>
              
              
          <?php }
         } ?>
          
        </div>
        <div class="py-5 text-right"><a href="searches/ALL/discount" class="btn btn-warning border border-dark px-5 py-3 text-uppercase">Show me more discounted items.</a></div>
      </div>

    </div>

    <div class="container-fluid">
      <div class="px-lg-5">
        
        <div class="row py-5">
          <div class="col-md-11 mx-auto">
            <div class="text-black p-4 shadow-lg rounded banner1 border border-dark">
              <h1 class="display-3">Popular items</h1>
              <!-- <p class="lead">Most viewed items</p> -->
              <p class="lead">Best selling items</p>
            </div>
          </div>
        </div>

        <div class="row">

          <?php for ($i = 0; $i < 4; $i++) {
            if (isset($popularItemsSqlQueryResult[$i][0])) { ?>
              <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="bg-white rounded shadow-lg border border-dark">
                  <!-- <img src="<?php echo base_url().'ItemPictures/'.$popularItemsSqlQueryResult[$i][1]; ?>" alt="" class="img-fluid card-img-top"> -->
                  <?php echo anchor('product/'.$popularItemsSqlQueryResult[$i][6] , "<img src=".base_url()."ItemPictures/".$popularItemsSqlQueryResult[$i][1]." alt='' class='img-fluid card-img-top'>", ''); ?>
                  <div class="p-4">
                    <h5> <?php echo anchor('product/'.$popularItemsSqlQueryResult[$i][6] , $popularItemsSqlQueryResult[$i][0] , 'class="text-dark"'); ?></h5>
                    <p class="small text-muted mb-0"><?php echo $popularItemsSqlQueryResult[$i][3] ?></p>
                    <?php if (isset($popularItemsSqlQueryResult[$i][4])) { ?>
                      <div class="badge badge-danger px-3 rounded-pill font-weight-normal"><?php echo $popularItemsSqlQueryResult[$i][4] ?>%</div>
                      <div class="badge badge-danger px-3 rounded-pill font-weight-normal"><?php echo $popularItemsSqlQueryResult[$i][2] ?>Lei</div> 
                      <div class="badge badge-success px-3 rounded-pill font-weight-normal"><?php echo $popularItemsSqlQueryResult[$i][5] ?>Lei</div>
                    <?php } else { ?>
                      <div class="badge badge-success px-3 rounded-pill font-weight-normal"><?php echo $popularItemsSqlQueryResult[$i][2] ?>Lei</div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            <?php }
          } ?>

          <h1>&nbsp;</h1>
        </div>

      </div>
    </div>



    <div class="switchcontainer">
      <div class="one-quarter" id="switch">
        <input type="checkbox" class="checkboxswitch" id="chk" />
        <label class="label" for="chk">
          <i class="fas fa-moon"></i>
          <i class="fas fa-sun"></i>
          <div class="ball"></div>
        </label>
      </div>
    </div>
  </body>

  <script>
    const chk = document.getElementById("chk");
    const quick_find_btn = document.getElementById("quick_find_btn");
    const keyword = document.getElementById("keyword");

    keyword.addEventListener("keyup", function(event) {
      if (event.code === 'Enter') {
        event.preventDefault();
        quick_find_btn.click();
      }
    });

    chk.addEventListener("change", () => {
      document.body.classList.toggle("dark");
    });
    
    quick_find_btn.addEventListener("click", () => {
      
      console.log("Search button pressed.");
      window.location = 'searches/ALL/nodiscount/'.concat(keyword.value);

    });
  </script>
</html>
