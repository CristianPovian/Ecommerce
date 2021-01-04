const order_btn = document.querySelector("#checkout-btn");

const id = document.querySelector("#user_id");
const fname = document.querySelector("#fname");
const email = document.querySelector("#email");
const phone = document.querySelector("#phone");
const address = document.querySelector("#adr");
const county = document.querySelector("#county");
const city = document.querySelector("#city");
const zip = document.querySelector("#zip");

const cardname = document.querySelector("#cname");
const cardnumber = document.querySelector("#ccnum");
const expmonth = document.querySelector("#expmonth");
const expyear = document.querySelector("#expyear");
const cvv = document.querySelector("#cvv");

const total = document.querySelector("#total");

function getProducts(callback) {

  console.log("Getting products.");

  var req = new XMLHttpRequest();
  req.onload = function() {

    var ajaxresponse = JSON.parse(this.responseText);
    message = JSON.stringify(ajaxresponse['message']);
    payload = JSON.stringify(ajaxresponse['payload']);
    console.log(message);
    console.log(payload);
    if (callback) callback(payload);

  }
  req.open("get", "cart/".concat(userid), true);
  req.send();

}

function fieldsCheck() {
    
  //TODO 
  return true;

}

function addQuantitySold() {
  
  //TODO
  return true;

}

function placeOrder(orderData) {

    console.log("Order Button Pressed");
    
    var req = new XMLHttpRequest();
    req.onload = function() {

      console.log(this.responseText);

    }
    req.open("post", "order", true);

    var sendData = {
        id: id.value,
        name: fname.value,
        email: email.value,
        phone: phone.value,
        address: address.value,
        county: county.value,
        city: city.value,
        zip: zip.value,
        cardname: cardname.value,
        cardnumber: cardnumber.value,
        expmonth: expmonth.value,
        expyear: expyear.value,
        cvv: cvv.value,
        ordercost: total.value,
        orderinfo: orderData

    };

    req.send(JSON.stringify(sendData));
    
  }

function clearCart() {
  console.log("Clearing cart.");

  var req = new XMLHttpRequest();
  req.onload = function() {

    console.log(this.responseText);
    window.location = 'MainPageController';

  }
  req.open("delete", "cart/".concat(userid), true);
  req.send();
}

order_btn.addEventListener("click", () => {
    getProducts(function(payload) {
      if (fieldsCheck() == true) { addQuantitySold(); placeOrder(payload); clearCart(); }
    });
  });