//---------------------------------------------------------------------------
// GLOBAL VARS
//---------------------------------------------------------------------------

const navBtn = document.querySelector('.banner .nav-toggle');
const nav = document.querySelector('.mobile-nav');
const navOptions = document.querySelectorAll('.mobile-nav li');

let isNavOpen = 0;

//---------------------------------------------------------------------------
// GLOBAL FUNCTIONS
//---------------------------------------------------------------------------

const showElement = (el) => {
    el.classList.remove('visually-hidden');
}

const hideElement = (el) => {
    el.classList.add('visually-hidden');
}

const toggleNav = (e) => {
    // console.log(e)
    // toggleSlide(nav);
    if (isNavOpen) {
        hideElement(nav);
        navBtn.classList.remove('active');
        isNavOpen = 0;
    } else {
        showElement(nav);
        navBtn.classList.add('active');
        isNavOpen = 1;
    }

}

//---------------------------------------------------------------------------
// EVENT LISTENERS
//---------------------------------------------------------------------------

navBtn.addEventListener('click', toggleNav);
// nav.addEventListener('click', toggleNav);

for (const opt of navOptions) {
    opt.addEventListener('click', toggleNav, false);
}