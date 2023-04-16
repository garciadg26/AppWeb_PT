const itemsPerPage = 3; // número de etiquetas <div> por página
const maxButtons = 3; // número máximo de botones a mostrar en la paginación

const divs = document.querySelectorAll('#cont_card_cover > div'); // obtenemos todas las etiquetas <div>
const numPages = Math.ceil(divs.length / itemsPerPage); // calculamos el número total de páginas

let currentPage = 1; // página actual, inicialmente la primera

function showPage(page) {
  // función para mostrar las etiquetas <div> de la página indicada
  const startIndex = (page - 1) * itemsPerPage;
  const endIndex = startIndex + itemsPerPage;

  for (let i = 0; i < divs.length; i++) {
    if (i >= startIndex && i < endIndex) {
      divs[i].style.display = 'block';
    } else {
      divs[i].style.display = 'none';
    }
  }

  // actualizar botones de la paginación
  updatePagination(page);
}

function createButton(text, page) {
  // función para crear un botón de la paginación
  const button = document.createElement('button');
  button.textContent = text;
  button.addEventListener('click', () => showPage(page));
  button.classList.add('pageButton');
  return button;
}

function updatePagination(page) {
  // función para actualizar los botones de la paginación
  const pagination = document.querySelector('#botones');
  pagination.innerHTML = '';

  // botón para ir a la primera página
  pagination.appendChild(createButton('<<', 1));

  // botones intermedios
  let start, end;
  if (numPages <= maxButtons) { // si el número total de páginas es menor o igual al número máximo de botones
    start = 1;
    end = numPages;
  } else {
    if (page <= Math.ceil(maxButtons / 2)) {
      start = 1;
      end = maxButtons;
    } else if (page > numPages - Math.floor(maxButtons / 2)) {
      start = numPages - maxButtons + 1;
      end = numPages;
    } else {
      start = page - Math.floor(maxButtons / 2);
      end = page + Math.ceil(maxButtons / 2) - 1;
    }
  }

  for (let i = start; i <= end; i++) {
    const button = createButton(i, i);
    if (i === page) {
      button.classList.add('active_pagination');
    }
    pagination.appendChild(button);
  }

  // botón para ir a la última página
  pagination.appendChild(createButton('>>', numPages));
}

// mostrar la primera página al cargar la página
showPage(1);