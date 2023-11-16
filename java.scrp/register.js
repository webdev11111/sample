function redirecttocorrectlink() {
  const username = document.querySelector("#username").value;
  const password = document.querySelector("#password").value;
  const email = document.querySelector("#email").value;
  const link = document.querySelector("#link").value;

  if (username === "Admin" && password === "password1" && email=== "johndoe11@gmail.com") {
    window.location.href = link;
  } 
  else if (username === "Tpo" && password === "password2" && email=== "johndoe11@gmail.com") {
    window.location.href = link;
  }  
  else if (username === "student" && password === "password3" && email=== "johndoe11@gmail.com") {
    window.location.href = link;
  }
  else {
    // Show an error message to the user
    alert("Invalid username or password. Please try again.");
  }
}
