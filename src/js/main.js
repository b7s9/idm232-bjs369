//---------------------------------------------------------------------------
// Toggle Nav and Search
//---------------------------------------------------------------------------

const navBtn = document.querySelector('.banner .nav-toggle button');
const navBtnIco = document.querySelector('.banner .nav-toggle .ico');
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
navBtnIco.addEventListener('click',toggleNav);

const searchIco = document.querySelector('.search .ico');
const searchbar = document.querySelector('.search input');

// let isSearchVisible = 0;

// const toggleSearchbar = ()=> {
//     if(isSearchVisible){
//         // hideElement(searchIco);
//         searchbar.style.display = 'none';
//         isSearchVisible = 1;
//     }else {
//         console.log(searchbar)
//         // showElement(searchIco);
//         searchbar.style.display = 'block';
//         isSearchVisible = 0;
//     }
// }

// searchIco.addEventListener('click', toggleSearchbar);


searchIco.addEventListener('click', (e)=>{
    window.location.href = 'search.html';
});

