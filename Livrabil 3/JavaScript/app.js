const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_in_submit = document.querySelector("#sign-in-submit");
const sign_in_username = document.querySelector("#sign-in-username");
const sign_in_password = document.querySelector("#sign-in-password");
const sign_up_btn = document.querySelector("#sign-up-btn");
const sign_up_submit = document.querySelector("#sign-up-submit");
const sign_up_username = document.querySelector("#sign-up-username");
const sign_up_email = document.querySelector("#sign-up-email");
const sign_up_password = document.querySelector("#sign-up-password");
const sign_up_confirm_password = document.querySelector("#sign-up-confirm-password");
const container = document.querySelector(".container");

  function redirectToSignIn() {
    container.classList.remove("sign-up-mode");
    sign_in_username.value = sign_up_username.value;
    sign_in_password.value = sign_up_password.value;
  }

  function redirectToMainPage() {
    console.log("Redirecting to the main page");
    window.location.replace("MainPageController");
  }

  function signUp() {

    console.log("Sign Up Button pressed");
    
    var req = new XMLHttpRequest();
    req.onload = function() {

      console.log(this.responseText);
      if (this.responseText == "Registered") {
        redirectToSignIn();
      }

    }
    req.open("post", "signup", true);

    formData = new FormData();
    formData.set("username", sign_up_username.value);
    formData.set("email", sign_up_email.value);
    formData.set("password", sign_up_password.value);
    formData.set("confirmPassword", sign_up_confirm_password.value);

    req.send(formData);
    

  }

  function signIn() {

    console.log("Sign In Button pressed");
    
    var req = new XMLHttpRequest();
    req.onload = function() {

      console.log(this.responseText);
      if (this.responseText == "User Found") {
        redirectToMainPage();
      }

    }
    req.open("post", "signin", true);

    formData = new FormData();
    formData.set("username", sign_in_username.value);
    formData.set("password", sign_in_password.value);

    req.send(formData);
    

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

sign_in_submit.addEventListener("click", () => {
  signIn();
});

