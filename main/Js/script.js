// send = (message) =>{
//     document.getElementById('alert').style.display="flex";
//     document.getElementById('message').innerHTML = message;
//     setTimeout(()=>{
//         document.getElementById('alert').style.display="none";
//     },1000)
// }

redirecting = (link) => {
  Toast("Redirecting.....", "green");
  setTimeout(() => {
    window.location.href = link;
  }, 1000);
};
LogOut = (link) => {
  Toast("loging out", "black");
  setTimeout(() => {
    window.location.href = link;
  }, 3000);
};

Toast = (message, color) => {
  var value = Toastify({
    theme: "dark",
    text: message,
    duration: 5000,
    progressBar: true,
    backgroundColor: color,
    // close:true,
    // gravity:"bottom",
    // position:"right",
  });
  value.showToast();
};
ToastTime = (message, color, sec) => {
  var value = Toastify({
    theme: "dark",
    text: message,
    duration: sec,
    progressBar: true,
    backgroundColor: color,
    // close:true,
    // gravity:"bottom",
    // position:"right",
  });
  value.showToast();
};

Register = (e) => {
  e.preventDefault();
  const firstname = document.getElementById("firstname").value;
  const lastname = document.getElementById("lastname").value;
  const email = document.getElementById("email").value;
  const gender = document.getElementById("gender").value;
  const department = document.getElementById("department").value;
  const password = document.getElementById("password").value;
  const code = document.getElementById("code").value;
  if (code == "admin") {
    sessionStorage.setItem("email", email);
    localStorage.setItem("firstname", firstname);
    sessionStorage.setItem("lastname", lastname);
    sessionStorage.setItem("gender", gender);
    sessionStorage.setItem("department", department);
    sessionStorage.setItem("password", password);
    Toast("Sucssess", "green");
    setTimeout(() => {
      window.location.href = "login.html";
    }, 1000);
  } else {
    Toast("Incorrect company code", "red");
  }
};
document.getElementById("signup").addEventListener("submit", Register);

Login = (el) => {
  el.preventDefault();

  var savedemail = sessionStorage.getItem("email");
  var savedpassword = sessionStorage.getItem("password");
  var email = document.getElementById("lemail").value;
  var password = document.getElementById("lpassword").value;
  if (email == savedemail && password == savedpassword) {
    Toast("Sucssess", "green");
    setTimeout(() => {
      Toast("Login sucessfully", "green");
      window.location.href = "signup.html";
    }, 1000);
  } else {
    Toast("Login Failed", "red");
  }
};
document.getElementById("logins").addEventListener("submit", Login());

function toggleFullScreen() {
  if (!document.fullscreenElement) {
    document.documentElement.requestFullscreen();
    ToastTime("Focus mode is Active", "#25769b", 2000);
  } else {
    if (document.exitFullscreen) {
      ToastTime("Existing focus mode", "#c43235", 2000);
      setTimeout(() => {
        document.exitFullscreen();
      }, 1000);
    }
  }
}

function toggleMenu() {
  document.getElementById("menus").style.display = "block";
}
document.getElementById("user").addEventListener("click", toggleMenu);
function CloseMenu() {
  document.getElementById("menus").style.display = "none";
}

function move(link) {
  window.location.href = link;
}

function toggledisplay() {
  var recent = document.getElementById("recent-chat");
  var alluser = document.getElementById("all-user");
  var button = document.getElementById("that-button");

  if (recent.style.display == "none") {
    alluser.style.display = "none";
    recent.style.display = "block";
    button.style.backgroundColor = "#f4f1f1";
  } else {
    recent.style.display = "none";
    alluser.style.display = "block";
    button.style.backgroundColor = "#25769b";
  }
}

function updateTime() {
  var now = new Date();
  var hours = now.getHours();
  var minutes = now.getMinutes();
  var seconds = now.getSeconds();
  document.getElementById("clock").innerHTML =
    hours + ":" + minutes + ":" + seconds;
}
setInterval(updateTime(), 1000);

function report() {
  var recent = document.getElementById("task-page");
  var alluser = document.getElementById("report-page");
  var button = document.getElementById("report-botton");

  if (recent.style.display == "none") {
    alluser.style.display = "none";
    recent.style.display = "block";
    button.style.backgroundColor = "#f4f1f1";
  } else {
    recent.style.display = "none";
    alluser.style.display = "block";
    button.style.backgroundColor = "#25769b";
    button.style.color = "white";
  }
}
function toggleMenu() {
  document.getElementById("menus").style.display = "block";
}
document.getElementById("user").addEventListener("click", toggleMenu);
function CloseMenu() {
  document.getElementById("menus").style.display = "none";
}
