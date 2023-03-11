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