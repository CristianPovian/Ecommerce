var check = false;

function changeVal(el) {
  var qt = parseFloat(el.parent().children(".qt").html());
  var price = parseFloat(el.parent().children(".price").html());
  var eq = Math.round(price * qt * 100) / 100;
  
  el.parent().children(".full-price").html( eq + " RON" );
  
  changeTotal();
}

function changeTotal() {
  
  var price = 0;
  
  $(".full-price").each(function(index){
    price += parseFloat($(".full-price").eq(index).html());
  });
  
  price = Math.round(price * 100) / 100;
  var tax = Math.round(price * 0.05 * 100) / 100
  var shipping = parseFloat($(".shipping span").html());
  var fullPrice = Math.round((price + tax + shipping) *100) / 100;
  
  if(price == 0) {
    fullPrice = 0;
  }
  
  $(".subtotal span").html(price);
  $(".tax span").html(tax);
  $(".total span").html(fullPrice);
}

$(document).ready(function(){
  
  $(".remove").click(function(){
    var el = $(this);
    el.parent().parent().addClass("removed");
    window.setTimeout(
      function(){
        el.parent().parent().slideUp('fast', function() { 
          el.parent().parent().remove(); 
          if($(".product").length == 0) {
            if(check) {
              window.location.replace("cart.html");
            } else {
              $("#cart").html("<h1>No products!</h1>");
              $("#shipping").html("Shipping: <span>0</span> RON");
              $("#chckout_btn").html("No items in cart.");
              $("#chckout_btn").removeAttr("href");

            }
          }
          changeTotal(); 
        });
      }, 200);

      var req = new XMLHttpRequest();
      req.onload = function() {

        console.log(this.responseText);

      }
      req.open("post", "remove", true);

      formData = new FormData();
      formData.set("item_name", $(this).parent().parent().children(".in").children(".item-id").text());

      req.send(formData);
  });
  
  $(".qt-plus").click(function(){
    $(this).parent().children(".qt").html(parseInt($(this).parent().children(".qt").html()) + 1);
    
    $(this).parent().children(".full-price").addClass("added");
    
    var el = $(this);
    window.setTimeout(function(){el.parent().children(".full-price").removeClass("added"); changeVal(el);}, 150);

    var req = new XMLHttpRequest();
    req.onload = function() {

      console.log(this.responseText);

    }
    req.open("post", "add", true);

    formData = new FormData();
    formData.set("item_name", $(this).parent().parent().children(".in").children(".item-id").text());

    req.send(formData);

  });
  
  $(".qt-minus").click(function(){
    
    child = $(this).parent().children(".qt");
    
    if(parseInt(child.html()) > 1) {
      child.html(parseInt(child.html()) - 1);
    }
    
    $(this).parent().children(".full-price").addClass("minused");
    
    var el = $(this);
    window.setTimeout(function(){el.parent().children(".full-price").removeClass("minused"); changeVal(el);}, 150);

    var req = new XMLHttpRequest();
    req.onload = function() {

      console.log(this.responseText);

    }
    req.open("post", "subtract", true);

    formData = new FormData();
    formData.set("item_name", $(this).parent().parent().children(".in").children(".item-id").text());

    req.send(formData);
  });
  
  window.setTimeout(function(){$(".is-open").removeClass("is-open")}, 1200);
  
});
