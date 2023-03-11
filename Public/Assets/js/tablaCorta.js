var current_page = 1;
let records_per_page = 5;
var l = document.getElementById("tabla_panel_admin").rows.length;
var vacio = document.getElementById("Error_filtro_vacio");




// function prevPage()
// {

//     if (current_page > 1) {
//         current_page--;
//         changePage(current_page);
//         vacio.style.display = 'none';
//     }
// }

// function nextPage()
// {
//     if (current_page < numPages()) {
//         current_page++;
//         changePage(current_page);
//         vacio.style.display = 'none';
//     }
// }

function changePage(page)
{
    var listing_table = document.getElementById("tabla_panel_admin");
    var page_span = document.getElementById("page");
 
    // Validate page
    if (page < 1) page = 1;
    if (page > numPages()) page = numPages();

    [...listing_table.getElementsByTagName('tr')].forEach((tr)=>{
        tr.style.display='none'; // reset all to not display
    });
    listing_table.rows[0].style.display = ""; // display the title row

    for (var i = (page-1) * records_per_page + 1; i < (page * records_per_page) + 1; i++) {
        if (listing_table.rows[i]) {
            listing_table.rows[i].style.display = ""
        } else {
            continue;
        }
    }
    
    // page_span.innerHTML = page + "/" + numPages();




}

function numPages()
{
    return Math.ceil((l - 1) / records_per_page);
}

window.onload = function() {
    changePage(current_page);
};


