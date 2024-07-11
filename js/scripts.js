/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

document.addEventListener('DOMContentLoaded',

    function() {
        // Set default mode
        setMode(localStorage.getItem('mode') || 'dark');
    });
    
    function setMode(mode) {
        const body = document.body;
        body.classList.remove('light-mode', 'dark-mode');
        body.classList.add(mode + '-mode');
        localStorage.setItem('mode', mode);
    }
    
    function toggleMode() {
        const modeSwitch = document.getElementById('modeSwitch');
        const selectedMode = modeSwitch.value;
        setMode(selectedMode);
    }
