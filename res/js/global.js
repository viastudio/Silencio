import '../../node_modules/fitvids/dist/fitvids.min.js';

document.addEventListener('DOMContentLoaded', function () {
     prepare_menu();
     prepare_notifications();
     prepare_smoothscroll();
     responsive_tables('.table-responsive');
     prepare_fitvids();
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

function prepare_notifications() {
    let notifications = document.querySelectorAll('.notification');

    if (notifications.length  === 0) {
        return;
    }

    let handleClick = function () {
        let target = document.getElementById(this.dataset.target);
        this.parentElement.classList.add('is-hidden');
    };

    notifications.forEach(notification => {
        let delete_btn = notification.querySelector('.delete');
        delete_btn.addEventListener('click', handleClick);
    });
}

function smoothScroll (anchor, duration) {
    // Calculate how far and how fast to scroll
    var startLocation = window.pageYOffset;
    var endLocation = anchor.offsetTop;
    var distance = endLocation - startLocation;
    var increments = distance/(duration/16);
    var stopAnimation;

    // Scroll the page by an increment, and check if it's time to stop
    var animateScroll = function () {
        window.scrollBy(0, increments);
        stopAnimation();
    };

    // If scrolling down
    if (increments >= 0) {
        // Stop animation when you reach the anchor OR the bottom of the page
        stopAnimation = function () {
            var travelled = window.pageYOffset;
            if ( (travelled >= (endLocation - increments)) || ((window.innerHeight + travelled) >= document.body.offsetHeight) ) {
                clearInterval(runAnimation);
            }
        };
    } else {
        // If scrolling up
        // Stop animation when you reach the anchor OR the top of the page
        stopAnimation = function () {
            var travelled = window.pageYOffset;
            if ( travelled <= (endLocation || 0) ) {
                clearInterval(runAnimation);
            }
        };
    }

    // Loop the animation function
    var runAnimation = setInterval(animateScroll, 16);
};

function prepare_smoothscroll() {
    let scroll_to_links = document.querySelectorAll('a[href*="#"]');

    if (scroll_to_links.length  === 0) {
        return;
    }

    let handleClick = function (event) {
        event.preventDefault();
        let dataID = this.getAttribute('href');
        let dataTarget = document.querySelector(dataID);
        let dataSpeed = this.getAttribute('data-speed');

        if (dataTarget) {
            smoothScroll(dataTarget, dataSpeed || 500);
        }
    };

    scroll_to_links.forEach(scroll_to_link => scroll_to_link.addEventListener('click', handleClick));
}

function prepare_fitvids() {
    fitvids('#page');
}
