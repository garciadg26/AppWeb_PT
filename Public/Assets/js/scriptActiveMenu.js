const menuPrincipal = document.querySelectorAll('#menu_aside a.btn_menu_aside');

if(document.URL.includes("/consulta") || document.URL.includes("/altaCurso")){

    menuPrincipal.forEach((element) => {
        element.classList.remove('active');
      });
    const curso = document.querySelector('#menu_aside a.btn_menu_aside:nth-child(6)')
    curso.classList.add('active');
}
