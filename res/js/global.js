document.addEventListener('DOMContentLoaded', function () {
     prepare_menu();
     responsive_tables('.table-responsive');
});

function prepare_menu() {
    let navbarBurgers = document.querySelectorAll('.navbar-burger');

    if (navbarBurgers.length  === 0) {
        return;
    }

    let handleClick = function () {
        let target = document.getElementById(this.dataset.target);

        this.classList.toggle('is-active');
        target.classList.toggle('is-active');
    };

    navbarBurgers.forEach(navbarBurger => navbarBurger.addEventListener('click', handleClick));
}

function responsive_tables(className) {
    //Select all tables
    let tables = document.querySelectorAll(className);

    if (tables.length < 1) {
        return;
    }

    //Loop over tables
    tables.forEach(table => {
        let headings = [];
        let ths = table.querySelectorAll('th');
        let trs = table.querySelectorAll('tr');

        //Create an array of headings
        ths.forEach(th => {
            headings.push(th.innerHTML);
        });

        //Loop over rows
        trs.forEach(tr => {
            let tds = tr.querySelectorAll('td');

            //Add data attributes to tds
            tds.forEach((td, index)=> {
                td.setAttribute('data-heading', headings[index] + ': ');
            });
        });
    });
}


// // JSHint ignores
// /* global FastClick: true */
// (function ($) {
//     $(document).ready(function () {
//         prepare_fitvid();
//         prepare_menu({
//             container: $('#content'),
//             menu_button: $('.menu-button'),
//             menu_active_class: 'menu-active'
//         });
//     });

//     function prepare_fitvid() {
//         $("#page").fitVids();
//     }

//     function prepare_menu(options) {
//         options.menu_button.on('click', function (e) {
//             var body = $('body');

//             body.toggleClass(options.menu_active_class);

//             // if the menu is displayed, hook up an event to hide the menu when #page is tapped but not scrolled
//             if (body.hasClass(options.menu_active_class)) {
//                 options.container.on('click', function () {
//                     body.toggleClass(options.menu_active_class);
//                     options.container.off('click'); // don't need to listen to this until the menu is opened
//                 });
//                 return;
//             }

//             options.container.off('click'); // don't need to listen to this until the menu is opened
//         });

//         $('.sub-menu').collapse({toggle: false}).addClass('collapse');

//         $('.btn-menu-dropdown').on('click', function (e) {
//             $(this).siblings('.sub-menu').collapse('toggle');
//         });
//     }
// }) (jQuery);
