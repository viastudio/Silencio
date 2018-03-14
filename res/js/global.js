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
