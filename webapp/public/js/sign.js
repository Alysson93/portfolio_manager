function changeForm() {
    var signin = document.getElementById('signin');
    var signup = document.getElementById('signup');
    if (signin.style.display == 'none') {
        signin.style.display = 'block';
        signup.style.display = 'none';
    } else {
        signin.style.display = 'none';
        signup.style.display = 'block';
    }
}