
window.addEventListener('DOMContentLoaded', event => {

    var navbarShrink = function () {
        const element = document.body.querySelector('#nav1');
        if (!element) {
            return;
        }
        if (window.scrollY === 0) {
            element.classList.remove('navbar-shrink')
        } else {
            element.classList.add('navbar-shrink')
        }
    };
    navbarShrink();

    document.addEventListener('scroll', navbarShrink);

    // Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#nav1');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#nav1',
            offset: 74,
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });
})