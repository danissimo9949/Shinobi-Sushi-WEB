const signInBtn = document.querySelector('.signIn-button');
const signUpBtn = document.querySelector('.signUp-button');
const formBox = document.querySelector('.form-box');
const body = document.body;

signUpBtn.addEventListener('click', function() {
    formBox.classList.add("active");
    body.classList.add("active");
});

signInBtn.addEventListener('click', function() {
    formBox.classList.remove("active");
    body.classList.remove("active");
});