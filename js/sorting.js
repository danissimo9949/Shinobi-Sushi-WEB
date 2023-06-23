const btnAll = document.getElementById('btn-all');
const btnSushi = document.getElementById('btn-sushi');
const btnRolls = document.getElementById('btn-rolls');
const btnDrinks = document.getElementById('btn-drinks');
  
const productCards = document.getElementsByClassName('product');


  btnAll.addEventListener('click', function() {
    for (let i = 0; i < productCards.length; i++) {
      productCards[i].style.display = 'block';
    }
  });

  btnSushi.addEventListener('click', function() {
    for (let i = 0; i < productCards.length; i++) {
      if (productCards[i].dataset.category === 'Суші') {
        productCards[i].style.display = 'block';
      } else {
        productCards[i].style.display = 'none';
      }
    }
  });

  btnRolls.addEventListener('click', function() {
    for (let i = 0; i < productCards.length; i++) {
      if (productCards[i].dataset.category === 'Роли') {
        event.target.classList.add('is-active');
        productCards[i].style.display = 'block';
      } else {
        productCards[i].style.display = 'none';
      }
    }
  });

  btnDrinks.addEventListener('click', function() {
    for (let i = 0; i < productCards.length; i++) {
      if (productCards[i].dataset.category === 'Напої') {
        productCards[i].style.display = 'block';
      } else {
        productCards[i].style.display = 'none';
      }
    }
  });


  var catalogButtons = document.querySelectorAll('.catalog-nav__btn');

  catalogButtons.forEach((button) => {
    button.addEventListener('click', () => {
      catalogButtons.forEach((btn) => {
        btn.classList.remove('is-active');
      });
      button.classList.add('is-active');
    });
  });