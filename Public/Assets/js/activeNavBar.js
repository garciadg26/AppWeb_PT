
        

// Script to hide/show menu
var button = document.querySelector('#menu-button');
var menu = document.querySelector('#submenu');
button.addEventListener('click', function (event) {
      if (menu.style.display === "" || menu.style.display === "none") {
          menu.style.display = "block";
      } else {
          menu.style.display = "none";
      }
    }
  );