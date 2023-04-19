
          // Script to hide/show menu
var button1 = document.querySelector('#menu_movil');
var menu1 = document.querySelector('#cont_aside');
button1.addEventListener('click', function (event) {
      if (menu1.style.display === "" || menu1.style.display === "none") {
          menu1.style.display = "block";
      } else {
          menu1.style.display = "none";
      }
    }
  );

// Script to hide/show menu
var button2 = document.querySelector('#menu-button');
var menu2 = document.querySelector('#submenu');
button2.addEventListener('click', function (event) {
      if (menu2.style.display === "" || menu2.style.display === "none") {
          menu2.style.display = "block";
      } else {
          menu2.style.display = "none";
      }
    }
  );