//---------------------------------------------------------------------------
// Toggle Nav and Search
//---------------------------------------------------------------------------

const navBtn = document.querySelector('.banner button.nav-toggle');
const nav = document.querySelector('nav');

let isNavOpen = 0;

const showElement = (el) => {
    el.classList.remove('visually-hidden');
}

const hideElement = (el) => {
    el.classList.add('visually-hidden');
}

const toggleNav = () => {

    // isNavOpen ? hideElement(nav, isNavOpen) : showElement(nav, isNavOpen);
    if (isNavOpen) {
        hideElement(nav);
        isNavOpen = 0;
    }else {
        showElement(nav);
        isNavOpen = 1;
    }

}

navBtn.addEventListener('click',toggleNav);

// const searchLabel = document.querySelector('.search label');
// const searchbar = document.querySelector('.search input');

// let isSearchVisible = 0;

// const toggleSearchbar = ()=> {

//     if(isSearchVisible){
//         hideElement(searchLabel);
//         showElement(searchbar);
//         isSearchVisible = 1;
//     }else {
//         showElement(searchLabel);
//         hideElement(searchbar);
//         isSearchVisible = 0;
//     }
// }

// searchLabel.addEventListener('click', toggleSearchbar);