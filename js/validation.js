const form = document.getElementById('registrationForm');
const emailInput = document.getElementById('email');
const loginInput = document.getElementById('login');
const passwordInput = document.getElementById('password');
const repeatPasswordInput = document.getElementById('repeatpassword');


form.addEventListener('submit', (event) => {
    event.preventDefault();

    if (validateForm()) {
      form.submit();
    }
  });


  function validateForm() {
    let isValid = true;

    if (!isValidEmail(emailInput.value)) {
      isValid = false;
      emailInput.classList.add('error');
      document.getElementById('email-error').textContent = 'Неправильный формат E-mail';
    } else {
      emailInput.classList.remove('error');
      document.getElementById('email-error').textContent = '';
    }

    if (loginInput.value.trim() === '') {
      isValid = false;
      loginInput.classList.add('error');
      document.getElementById('login-error').textContent = 'Некоректний логін';
    } else if ( loginInput.value.length < 6){
      loginInput.classList.add('error');
      document.getElementById('login-error').textContent = 'Логін занадто короткий';
    } else if ( loginInput.value.length > 20 ){
      loginInput.classList.add('error');
      document.getElementById('login-error').textContent = 'Логін занадто довгий';
    } else {
      loginInput.classList.remove('error');
      document.getElementById('login-error').textContent = '';
    }

    if (passwordInput.value.length < 6) {
        isValid = false;
        passwordInput.classList.add('error');
        document.getElementById('password-error').textContent = 'Пароль надто короткий';
    } else if(passwordInput.value.length > 32) {
        isValid = false;
        passwordInput.classList.add('error');
        document.getElementById('password-error').textContent = 'Пароль занадто довгий';
    } else {
        passwordInput.classList.remove('error');
        document.getElementById('password-error').textContent = '';
    }

    
    if (passwordInput.value !== repeatPasswordInput.value) {
      isValid = false;
      repeatPasswordInput.classList.add('error');
      document.getElementById('password-error').textContent = 'Паролі не співпадають';
    } else {
      repeatPasswordInput.classList.remove('error');
      document.getElementById('password-error').textContent = '';
    }

    return isValid;
  }


  function isValidEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
  }