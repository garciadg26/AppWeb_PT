var ordenarTabla = function (target, data, css) {
  // (A) FUNCIÓN PARA ORDENAR LA TABLA
  target = document.getElementById(target);
  let sflag = { key: null, direction: true }, // LLAVE PARA ORDENAR
      sorder = [], // ORDEN DE CLASIFICACIÓN
      trgtformat = data != null ? "data" : ( target.tagName == "TABLE" ? "table" : "" ) // FORMATO DEL APUNTADOR
      ;
  let tsort = function () {
      // (A1) ORDEN INVERSO
      let skey = this.innerHTML;
      if (sflag.key == skey) {
        sflag.direction = !sflag.direction;
      } else {
        sflag.key = skey;
        sflag.direction = true;
      }
    
    // (A2) MATRÍZ DE MAPA PARA ORDENAR
    var mapped = data[this.innerHTML].map(function(v, i) {
      return { i: i, v: v };
    });

    // (A3) ORDENAR MATRIZ - CONSERVAR POSICIONES DE ÍNDICE
    if (sflag.direction) {
      mapped.sort(function(a, b) {
        if (a.v > b.v) { return 1; }
        if (a.v < b.v) { return -1; }
        return 0;
      });
    } else {
      mapped.sort(function(a, b) {
        if (a.v < b.v) { return 1; }
        if (a.v > b.v) { return -1; }
        return 0;
      });
    }
    
    // (A4) NUEVO ORDEN DE CLASIFICACIÓN
    sorder = [];
    for (var idx in mapped) { sorder.push(mapped[idx].i); }
    
    // (A5) REDIBUJAR LA TABLA 
    if (trgtformat != ""){}
      tdraw();
  };
  
  // (B) TRABAJAR CON LA TABLA HTML
  let etable = null,
      ehead = null,
      ehrow = null,
      ebody = null;

  if (trgtformat == "table") {
    // ADAPTAR ELEMENTOS
    etable = target;
    ehead = etable.getElementsByTagName("thead")[0];
    ehrow = ehead.getElementsByTagName("tr")[0];
    ebody = etable.getElementsByTagName("tbody")[0];
    
    // ADAPTANDO LOS DATOS - OBTENER LAS CLAVES + CLIC PARA ORDENAR
    data = {};
    let keys = [];
    for (let i of ehead.getElementsByTagName("th")) {
      keys.push(i.innerHTML);
      data[i.innerHTML] = [];
      i.addEventListener("click", tsort);
    }
    
    // ADAPTAR DATOS - OBTENER VALORES
    let j = 0;
    for (let i of ebody.getElementsByTagName("td")) {
      if (j >= keys.length) { j = 0; }
      data[keys[j]].push( (i.innerHTML == i.innerHTML+"" && parseFloat(i.innerHTML)+"" == i.innerHTML ) ? parseFloat(i.innerHTML) : i.innerHTML );
      j++;
    }
  }
  
  // (C1) COLOCAR FILAS A LA TABLA
  let tdraw = function () {
    // (C1-1) REMOVER VIEJOS ELEMENTOS
    ebody.innerHTML = "";
    
    // (C1-2) COLOCAR NUEVO ORDEN DE CLASIFICACIÓN
    let row = null, cell = null;
    for (let i=0; i<sorder.length; i++) {
      row = document.createElement("tr");
      ebody.appendChild(row);
      for (let key in data) {
        cell = document.createElement("td");
        cell.innerHTML = data[key][sorder[i]];
        row.appendChild(cell);
      }
    }
  };
};