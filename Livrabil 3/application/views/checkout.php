<html>
  <head>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta content="utf-8" http-equiv="encoding" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/mainpage.css" />

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

    <link rel="shortcut icon" href="<?php echo base_url(); ?>img/profile.png" />
  </head>
  <link rel="stylesheet" href="<?php echo base_url(); ?>CSS/checkout.css" />
  <body>
    <nav class="nav1">
      <div class="logosearch">
        <div class="navlogo">
          <a href="MainPageController" title="Pink Friday - UVT 2020"
            ><img src="<?php echo base_url(); ?>img/cover.png" alt="logo"
          /></a>
        </div>
        <div class="navsearch">
          <form
            id="quick_find"
            name="quick_find"
            onsubmit="cauta();return false;"
          >
            <input
              id="keyword"
              size="10"
              maxlength="50"
              value=""
              placeholder="Introduceți numele produsului..."
              type="text"
              autocomplete="off"
            />
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

    <div class="row">
      <div class="collarge">
        <div class="container">
          <form action="/action_page.php">
            <div class="row">
              <div class="colnormal">
                <h3>Billing/Shipping Address</h3>
                <label for="fname">Full Name*</label>
                <input type="text" id="fname" name="firstname" required />
                <label for="email">Email</label>
                <input type="text" id="email" name="email" />
                <label for="city">Phone number*</label>
                <input type="text" id="phone" name="phone" required />
                <label for="adr">Address*</label>
                <input type="text" id="adr" name="address" required />
                <label for="county">County*</label>
                <input type="text" id="county" name="county" required />
                <label for="city">City*</label>
                <input type="text" id="city" name="city" required />
                <label for="zip">Zip*</label>
                <input type="text" id="zip" name="zip" required />

              </div>

              <div class="colnormal">
                <h3>Payment</h3>
                <label for="fname">Accepted Cards</label>
                <div class="icon-container">
                  <i class="fab fa-cc-visa" style="color: navy"></i>
                  <i class="fab fa-cc-mastercard" style="color: red"></i>
                  <i class="fab fa-cc-paypal" style="color: blue"></i>
                </div>
                <label for="cname">Name on Card*</label>
                <input type="text" id="cname" name="cardname" required />
                <label for="ccnum">Credit card number*</label>
                <input type="text" id="ccnum" name="cardnumber" required />
                <label for="expmonth">Exp. Month*</label>
                <input type="text" id="expmonth" name="expmonth" required />

                <div class="row">
                  <div class="colnormal">
                    <label for="expyear">Exp. Year*</label>
                    <input type="text" id="expyear" name="expyear" required />
                  </div>
                  <div class="colnormal">
                    <label for="cvv">CVV*</label>
                    <input type="text" id="cvv" name="cvv" required />
                  </div>
                </div>
              </div>
            </div>
            <input type="submit" value="Continue the payment" class="btn" />
          </form>
        </div>
      </div>

      <div class="colsmall">
        <div class="container">
          <h4>Cart</h4>
          <p><a href="#">Lettuce Seeds</a> <span class="price">5 RON</span></p>
          <hr />
          <p>
            Total <span class="price" style="color: black"><b>5 RON</b></span>
          </p>
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
