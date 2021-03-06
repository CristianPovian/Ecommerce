<html>
  <head>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta content="utf-8" http-equiv="encoding" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/profile.css" />

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
          <a href="loginsignup.html">
          <li><i class="fas fa-user"></i></li>
        </a>
          <li><i class="fas fa-star"></i></li>
          <a href="cart.html">
        <li><i class="fas fa-shopping-cart"></i></li>
      </a>
        </ul>
      </div>
    </nav>


    <div class="container">
        <div class="main-body">
        
                  <div class="card">
                    <div class="card-body">
                        <div class="row" style="text-align: center;padding:0;">
                            <h2>Personal Info</h2>
                        </div>

                      <div class="row">
                        <div class="col">
                          <h3>Username</h3>
                        </div>
                        <div class="colsmall">
                          <p>user1</p>
                        </div>
                      </div>
                      <div class="row" contenteditable="true">
                        <div class="col">
                            <h3>Full Name</h3>
                          </div>
                          <div class="colsmall">
                            <p>name1</p>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col">
                            <h3>Password</h3>
                          </div>
                          <div class="colsmall">
                            <p>*********</p>
                          </div>
                        </div>

                      <div class="row">
                        <div class="col">
                            <h3>E-mail</h3>
                          </div>
                          <div class="colsmall" contenteditable="true">
                            <p>mail@gmail.com</p>
                      </div>

                      <div class="row">
                        <div class="col">
                            <h3>Phone</h3>
                          </div>
                          <div class="colsmall" contenteditable="true">
                            <p>02851</p>
                          </div>              
                      </div>

                      <div class="row">
                        <div class="col">
                            <h3>Address</h3>
                          </div>
                          <div class="colsmall" contenteditable="true">
                            <p>adress</p>
                          </div>              
                      </div>

                  </div>
                  <input type="button" class="btn" value="Save my edits"/>
                  <input type="button" class="btn" value="Change my Password"/>
                  <form action= "logout">
                    <input type="submit" class="btn" value="Logout"/>
                  </form>
                  <?php anchor('logout', '<input type="button" class="btn" value="Logout"/>', ''); ?>
                </div>
        </div>
    </div>
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
