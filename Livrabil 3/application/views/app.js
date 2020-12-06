const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const sign_up_submit = document.querySelector("#sign-up-submit");
const container = document.querySelector(".container");

alert("a");
console.log("Szopj LOT");
  function signUp() {

    alert("a");
    console.log("Szopj LOT");
    /*
    var req = new XMLHttpRequest();
    req.onload = function() {
    }
    req.open("get", "http://127.0.0.1/PinkFridayCodeigniter/jsPhp/signup.php", true);
    req.send();
    */

  }






sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

sign_up_submit.addEventListener("click", () => {
  signUp();
});
