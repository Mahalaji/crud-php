
document.getElementById("register").addEventListener("submit", function (event) {
    
    
    
    
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const confirm_password = document.getElementById("confirmpassword").value;
    const email = document.getElementById("number").value;

  
    if (username == '') {
        document.getElementById('name').innerHTML = "name is required."
    } else if (username.length < 2) {
        document.getElementById('name').innerHTML = 'Name must be at least 2 character long.'
    } else if (!namevalidation){
        document.getElementById("name").value.innerHTML = 'Integer not allowed';
    }
    else {
        document.getElementById('name').innerHTML = '';
    }
    
    if (email == '') {
        document.getElementById('mail').innerHTML = "Email is required."
    } 
    else {
        document.getElementById('mail').innerHTML = '';
    }

    if (password == '') {
        document.getElementById('pass').innerHTML = 'password is required.'
    }
    else if (password.length < 8) {
        document.getElementById('pass').innerHTML = 'Password must be at least 8 character long.'
    }
    else {
        document.getElementById('pass').innerHTML = '';
    }

    if (confirm_password == '') {
        document.getElementById('confirmpass').innerHTML = 'Please enter confirm password.'
    }
    else if (confirm_password != password) {
        document.getElementById('confirmpass').innerHTML = 'Not same as password.';
    }
    else {
        document.getElementById('confirmpass').innerHTML = '';
    }

    function myfunction1(){
        document.getElementById('name').innerHTML = '';
    }

    if (username == '' || password == '' || confirm_password == '' || email == ''|| password.length < 8 || confirm_password != password  ) {
        event.preventDefault();
        }
});