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
          <a href="ProfilePageController">
          <li><i class="fas fa-user"></i></li>
        </a>
          <!-- <li><i class="fas fa-star"></i></li> -->
          <a href="CartController">
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
                          <p id = "username"><?php echo $username; ?></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                            <h3>Full Name</h3>
                          </div>
                          <div class="colsmall">
                            <p id = "fullname" contenteditable="true" spellcheck="false"><?php echo $fullname;?></p>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col">
                            <h3>Password</h3>
                          </div>
                          <div class="colsmall">
                            <p><?php echo $password; ?></p>
                          </div>
                        </div>

                      <div class="row">
                        <div class="col">
                            <h3>E-mail</h3>
                          </div>
                          <div class="colsmall">
                            <!-- <p id = "email" contenteditable="true"><?php echo $email; ?></p> -->
                            <p id = "email"><?php echo $email; ?></p>
                      </div>

                      <div class="row">
                        <div class="col">
                            <h3>Phone</h3>
                          </div>
                          <div class="colsmall">
                            <p id = "phone" contenteditable="true" spellcheck="false"><?php echo $phone; ?></p>
                          </div>              
                      </div>

                      <div class="row">
                        <div class="col">
                            <h3>Address</h3>
                          </div>
                          <div class="colsmall">
                            <p id = "address" contenteditable="true" spellcheck="false"><?php echo $address; ?></p>
                          </div>              
                      </div>

                  </div>
                  <input type="button" class="btn" value="Save my edits"  id = "save_btn"/>
                  <!-- <input type="button" class="btn" value="Change my Password"/> -->
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
          <!--
            <li><i class="fab fa-facebook"></i></li>
            <li><i class="fas fa-envelope-open-text"></i></li>
            <li><i class="fab fa-twitter"></i></li>
          -->
        </ul>
      </div>

  <script>
    const quick_find_btn = document.getElementById("quick_find_btn");
    const save_btn = document.getElementById("save_btn");
    const keyword = document.getElementById("keyword");

    keyword.addEventListener("keyup", function(event) {
      if (event.code === 'Enter') {
        event.preventDefault();
        quick_find_btn.click();
      }
    });

    quick_find_btn.addEventListener("click", () => {
      
      console.log("Search button pressed.");
      window.location = 'searches/ALL/nodiscount/'.concat(keyword.value);

    });
    
    save_btn.addEventListener("click", () => {
      
      console.log("Saving Edits.");
      var req = new XMLHttpRequest();
      req.onload = function() {

        console.log(this.responseText);

      }
      req.open("post", "saveedit", true);

      formData = new FormData();
      formData.set("full_name", document.getElementById("fullname").innerHTML);
      formData.set("email", document.getElementById("email").textContent);
      formData.set("phone", document.getElementById("phone").textContent);
      formData.set("address", document.getElementById("address").textContent);
      formData.set("username", document.getElementById("username").textContent);
      console.log(document.getElementById("fullname").textContent);
      console.log(document.getElementById("phone").textContent);
      console.log(document.getElementById("address").textContent);

      req.send(formData);

    });
  </script>
  </body>
</html>
