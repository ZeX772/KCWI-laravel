const passwordInput = document.querySelector("#password");
const eye = document.querySelector("#eye");

eye.addEventListener("click", function(){
  this.classList.toggle("fa-eye-slash");
  const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
  passwordInput.setAttribute("type", type);
});

const passwordInput2 = document.querySelector("#password-1");
const eye2 = document.querySelector("#eye-1");

eye2.addEventListener("click", function(){
  this.classList.toggle("fa-eye-slash");
  const type2 = passwordInput2.getAttribute("type") === "password" ? "text" : "password";
  passwordInput2.setAttribute("type", type2);
});
