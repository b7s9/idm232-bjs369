const searchbar = document.querySelector('.search input');

const delay = (fn, ms) => {
    let timer = 0;
    return function(...args) {
        clearTimeout(timer);
        timer = setTimeout(fn.bind(this, ...args), ms || 0);
    };
};

function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
}

const processQuery = (e)=>{
    console.log(e.target.value);

    //make database call based on this value
}

// let debounceQuery = debounce(processQuery,2000);

searchbar.addEventListener('keyup', (e)=>{
    processQuery(e);
});