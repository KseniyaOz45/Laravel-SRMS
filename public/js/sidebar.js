document.addEventListener("DOMContentLoaded", function () {
    const menu_btn = document.getElementById('show-hide-sidebar');
    const sidebar = document.getElementById('nav-sidebar');
    
   menu_btn.addEventListener('click', function () {
       sidebar.classList.toggle('hidden-sidebar');
    });
});