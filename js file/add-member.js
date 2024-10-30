
document.getElementById("update").addEventListener("submit", function (event) {
    
    
    
    
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const confirm_password = document.getElementById("confirmpassword").value;
    const email = document.getElementById("email").value;
    const mobilenumber = document.getElementById("mobilenumber").value;
    const city = document.getElementById("city").value;
    const state = document.getElementById("state").value;
    // const country = document.getElementById("country").value;
    const pincode = document.getElementById("pincode").value;
    const address = document.getElementById("address").value;
  
    if (username == '') {
        document.getElementById('name').innerHTML = "name is required."
    } else if (username.length < 2) {
        document.getElementById('name').innerHTML = 'Name must be at least 2 character long.'
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

    if (mobilenumber == '') {
        document.getElementById('number').innerHTML = "mobilenumber is required."
    } 
    else {
        document.getElementById('number').innerHTML = '';
    }

    if (address == '') {
        document.getElementById('addresse').innerHTML = "address is required."
    } 
    else {
        document.getElementById('addresse').innerHTML = '';
    }
    if (city == '') {
        document.getElementById('citye').innerHTML = "city is required."
    } 
    else {
        document.getElementById('citye').innerHTML = '';
    }
    if (state == '') {
        document.getElementById('statee').innerHTML = "state is required."
    } 
    else {
        document.getElementById('statee').innerHTML = '';
    }
    // if (country == '') {
    //     document.getElementById('countrye').innerHTML = "country is required."
    // } 
    // else {
    //     document.getElementById('countrye').innerHTML = '';
    // }
    if (pincode == '') {
        document.getElementById('pincodee').innerHTML = "pincode is required."
    } 
    else {
        document.getElementById('pincodee').innerHTML = '';
    }


    if (username == '' || password == '' || confirm_password == '' || email == ''|| password.length < 8 || confirm_password != password ||pincode == '' ||mobilenumber == '' ||city == '' |state == '' ||address == '') {
        event.preventDefault();
        }
});