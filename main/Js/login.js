Toast = (message,color) => {
    var value = Toastify({
        theme: "dark",
        text: message,
        duration: 5000,
        progressBar: true,
        // close:true,
        // gravity:"bottom",
        // position:"right",
        backgroundColor: color,
       })
 value.showToast();
}

Login = (e) => {
    e.preventDefault();

    var savedemail = sessionStorage.getItem("email");
    var savedpassword = sessionStorage.getItem("password");
    var email = document.getElementById("lemail").value;
    var password = document.getElementById("lpassword").value;
    if ((savedemail = email) && (savedpassword = password)) {
      Toast('Sucssess','green');
      setTimeout(()=>{
        Toast('Login sucessfully','green');
        window.location.href = "dashboard.html";
      },1000)
    } else {
      Toast('Login Failed','red')
    }
  };
document.getElementById('form').addEventListener('submit', Login)
  
// function add(){
//   a = 1
//   b = 2
//   return console.log(a+b);
// }
// add()
// const calc  = {
// name:"calc",
// adds : add(),
// }
// calc.adds
// console.log(calc.name);