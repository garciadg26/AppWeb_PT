function buscarTabla() {
  var vacio = document.getElementById("Error_filtro_vacio");
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("buscadorINP");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabla_panel_consultar");
  tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
          vacio.style.display = 'none';
        } else {
          tr[i].style.display = "none";
          vacio.style.display = 'none';
        }
      }
    }
  }


function buscarAlumno() {
  var vacio = document.getElementById("Error_filtro_vacio");
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("buscadorINP");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabla_panel_alumnos");
  tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
          vacio.style.display = 'none';
        } else {
          tr[i].style.display = "none";
          vacio.style.display = 'none';
        }
      }
    }
  }


// function buscarCard() {
//   var vacio = document.getElementById("Error_filtro_vacio");
//   // Declare variables
//   var input, filter, div, article, i;
//   input = document.getElementById("buscadorINP");
//   filter = input.value.toUpperCase();
//   div = document.getElementById("card_cursos");
//   article = div.getElementsByTagName("article");
  
//   // Loop through all div rows, and hide those who don't match the search query
//   for (i = 0; i < article.length; i++) {
//     // td = article[i].getElementsByTagName("h4");
//     // if (td) {
//       txtValue = article[i].textContent || article[i].innerText;
      
//       if (txtValue.toUpperCase().indexOf(filter) > -1) {
//         article[i].style.display = "";
//         vacio.style.display = 'none';
//       } else {
//         article[i].style.display = "none";
//         vacio.style.display = 'none';
//       }
//     // }
//   }
// }

function searchFilter() {
  let selectedCurso = document.getElementById("filterByCurso").value;
  let selectedTipo = document.getElementById("filterByTipo").value;
  let selectedSoftware = document.getElementById("filterBySoftware").value;
  console.log(selectedCurso);
  const input = document.querySelector('.form-control');
  const cards = document.getElementsByClassName('card_curso');
  console.log(cards[1]);
  let textBox = input.value;
  for(let i = 0; i < cards.length; i++){
    let title = cards[i].querySelector('.card_body');
    if((cards[i].classList.contains(selectedCurso) || selectedCurso=="") && (cards[i].classList.contains(selectedTipo) || selectedTipo=="") && (cards[i].classList.contains(selectedSoftware) || selectedSoftware=="") && title.innerText.toLowerCase().indexOf(textBox.toLowerCase()) > -1){
      cards[i].classList.remove("d-none");
    } else{
      cards[i].classList.add("d-none");
    }
  }
}