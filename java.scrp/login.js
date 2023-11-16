function redirecttocorrectlink() {
  const username = document.querySelector("#username").value;
  const password = document.querySelector("#password").value;
  const link = document.querySelector("#link").value;

  if (username === "Admin" && password === "password1") {
    window.location.href = link;
  } 
  else if (username === "Tpo" && password === "password2") {
    window.location.href = link;
  }  
  else if (username === "student" && password === "password3") {
    window.location.href = link;
  }
  else {
    // Show an error message to the user
    alert("Invalid username or password. Please try again.");
  }
}
