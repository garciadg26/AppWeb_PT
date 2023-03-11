
function filterCategoria() {

  //INSTANCIAMOS LAS VARIABLES
  var selectCat = document.getElementById("selectCat"), 
      table = document.getElementById("tabla_panel_consultar"),
      vacio = document.getElementById("Error_filtro_vacio"),
      titTable = document.getElementById("tit_tabla"),
      tr = table.getElementsByTagName("tr");
  

  for(var i = 0; i < tr.length; i++) {

      Categoria = tr[i].getElementsByTagName("td")[3]; // use [0] as the first `td`

      if(Categoria && Categoria.innerHTML.indexOf(selectCat.value) > -1) {
        console.log("Valor on" + tr[i]);
        tr[i].style.display = "";
        titTable.style.display = "";
        vacio.style.display = 'none';
      } else {
        console.log("Valor off" + tr[i]);
        tr[i].style.display = "none";   
        titTable.style.display = "";
        vacio.style.display = 'none';
      }
  }
  if(selectCat.value == 'null'){
    console.log("Estoy vacio");
    vacio.style.display = 'block';
  }
}

function filterTipo() {

  //INSTANCIAMOS LAS VARIABLES
  var selectTipo = document.getElementById("selectTipo"), 
      table = document.getElementById("tabla_panel_consultar"),
      vacio = document.getElementById("Error_filtro_vacio"),
      titTable = document.getElementById("tit_tabla"),
      tr = table.getElementsByTagName("tr");
  

  for(var i = 0; i < tr.length; i++) {

      Tipos = tr[i].getElementsByTagName("td")[4]; // use [0] as the first `td`

      if(Tipos && Tipos.innerHTML.indexOf(selectTipo.value) > -1) {
        console.log("Valor on" + tr[i]);
        tr[i].style.display = "";
        titTable.style.display = "";
        vacio.style.display = 'none';
      } else {
        console.log("Valor off" + tr[i]);
        tr[i].style.display = "none";   
        titTable.style.display = "";
        vacio.style.display = 'none';
      }
  }
  if(selectTipo.value == 'null'){
    console.log("Estoy vacio");
    vacio.style.display = 'block';
  }
}

function filterSoftware() {

  //INSTANCIAMOS LAS VARIABLES
  var selectSoft = document.getElementById("selectSoft"), 
      table = document.getElementById("tabla_panel_consultar"),
      vacio = document.getElementById("Error_filtro_vacio"),
      titTable = document.getElementById("tit_tabla"),
      tr = table.getElementsByTagName("tr");
  

  for(var i = 0; i < tr.length; i++) {

      Software = tr[i].getElementsByTagName("td")[5]; // use [0] as the first `td`

      if(Software && Software.innerHTML.indexOf(selectSoft.value) > -1) {
        console.log("Valor on" + tr[i]);
        tr[i].style.display = "";
        titTable.style.display = "";
        vacio.style.display = 'none';
      } else {
        console.log("Valor off" + tr[i]);
        tr[i].style.display = "none";   
        titTable.style.display = "";
        vacio.style.display = 'none';
      }
  }
  if(selectSoft.value == 'null'){
    console.log("Estoy vacio");
    vacio.style.display = 'block';
  }
}




// listen to select changes
document.querySelector('#selectCat').addEventListener('change', function(e) {
  filterCategoria();
  records_per_page = 5;
});

// listen to select changes
document.querySelector('#selectTipo').addEventListener('change', function(e) {
  filterTipo();
  records_per_page = 5;
});

// listen to select changes
document.querySelector('#selectSoft').addEventListener('change', function(e) {
  filterSoftware();
  records_per_page = 5;
});