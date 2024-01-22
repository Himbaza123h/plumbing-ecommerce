 
   
   {/* navigations */}
    const navs = document.getElementById('Navbar__Items') ;
    const openNav = document.getElementById('Navbar__Link-toggle') ;
    const closeNav= document.getElementById('Navbar__Link-toggle-close') ;
    closeNav.style.display = "none";
function classToggleOpen() { 
    navs.style.display = "block";
    closeNav.style.display="block";
    openNav.style.display = "none";
}
    function classToggleClose() { 
    openNav.style.display = "block";
    navs.style.display = "none";

        closeNav.style.display = "none";
    }

    openNav.addEventListener('click', classToggleOpen);
    closeNav.addEventListener('click', classToggleClose);
     
