<?php




?>

<html>
  <head>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta content="utf-8" http-equiv="encoding" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/adminview.css" />

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <link
      rel="stylesheet"
      href="//use.fontawesome.com/releases/v5.0.7/css/all.css"
    />
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <title>Pink Friday - UVT 2020</title>

    <link rel="shortcut icon" href="<?php echo base_url(); ?>img/profile.png" />
  </head>

  <body>
    <nav class="nav1">
      <div class="logosearch">
        <div class="navlogo">
          <!--
          <a href="mainpage.html" title="Pink Friday - UVT 2020"
            ><img src="<?php echo base_url(); ?>img/cover.png" alt="logo"
          /></a> -->
        </div>
        <div class="navsearch">
          <!--
            <form id="quick_find" name="quick_find" onsubmit="cauta();return false;">
                <input id="keyword" size="10" maxlength="50" value="" placeholder="Introduceți numele produsului..." type="text" autocomplete="off">
            <button type="submit">Cauta</button>
          </form> -->
        </div>
      </div>
      <div class="navmenu">
        <ul class="navbarUL">
          <!--
          <a href="loginsignup.html">
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
        <!-- TODO: View Items 
      -->
                  <div class="card">
                    <div class="card-body">

                    <?php for ($j = 0; $j < $i - 1; $j++) { ?>
                        <div class="row">
                          <img src="<?php echo base_url()."img/".$image[$j]; ?>" alt="" class="img-fluid card-img-top" width='50px'>
                          <h5><?php echo $name[$j]; ?></h5>
                          <p><?php echo $description[$j]; ?></p>
                          <p><?php echo $price[$j]; ?></p>
                        </div>
						            <hr>
                    <?php } 
                      if ($i != 0) { 
                    ?>
                        <div class="row">
                          <img src="<?php echo base_url()."img/".$image[$i - 1]; ?>" alt="" class="img-fluid card-img-top" width='50px'>
                          <h5><?php echo $name[$i - 1]; ?></h5>
                          <p><?php echo $description[$i - 1]; ?></p>
                          <p><?php echo $price[$i - 1]; ?></p>
                        </div>
						        <?php } ?>

				  </div>
				</div>		 
         </div>
		 <input type="button" class="btn1" value="Export data to csv file" onclick="getCSVData()"/>
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
      function getCSVData() {
          console.log("In getCSVData function");
          var req = new XMLHttpRequest();
          req.onload = function() {

            var ajaxresponse = JSON.parse(this.responseText);
            payload = JSON.stringify(ajaxresponse['payload']);
            console.log(ajaxresponse);
            exportCSVData(payload);


          }
          req.open("get", "item", true);
          req.send();

        }

        function exportCSVData(payload) {
          console.log("In exportCSVData function");
          var req = new XMLHttpRequest();
          req.onload = function() {

            console.log(this.responseText);
            var baseurl = "<?php echo base_url(); ?>";
            download(baseurl.concat("CSV/items.csv"));

          }
          req.open("post", "csv", true);
          req.send(payload);
        }

        function download(url) {
        document.getElementById('csv_download_iframe').src = url;
         }
  </script>
  <iframe id="csv_download_iframe" style="display:none;"></iframe>
  </body>
 
  
</html>
