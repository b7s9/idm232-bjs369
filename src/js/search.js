/*
function debounce(func, wait, immediate) {
	// 'private' variable for instance
	// The returned function will be able to reference this due to closure.
	// Each call to the returned function will share this common timer.
	var timeout;

	// Calling debounce returns a new anonymous function
	return function() {
		// reference the context and args for the setTimeout function
		var context = this,
		args = arguments;

		// Should the function be called now? If immediate is true
		//   and not already in a timeout then the answer is: Yes
		var callNow = immediate && !timeout;

		// This is the basic debounce behaviour where you can call this 
		//   function several times, but it will only execute once 
		//   [before or after imposing a delay]. 
		//   Each time the returned function is called, the timer starts over.
		clearTimeout(timeout);

		// Set the new timeout
		timeout = setTimeout(function() {

		// Inside the timeout function, clear the timeout variable
		// which will let the next execution run when in 'immediate' mode
		timeout = null;

		// Check if the function already ran with the immediate flag
		if (!immediate) {
			// Call the original function with apply
			// apply lets you define the 'this' object as well as the arguments 
			//    (both captured before setTimeout)
			func.apply(context, args);
		}
		}, wait);

		// Immediate mode and no wait timer? Execute the function..
		if (callNow) func.apply(context, args);
	};
}

const processQuery = (e)=>{
	// console.log(e);
    //make database call based on this value
}

let debouncedQuery = debounce(processQuery, 100);

const searchbar = document.querySelector('.search input');

searchbar.addEventListener('keyup', debouncedQuery);
*/

// ---------
const searchbar = document.querySelector('.search input');

searchbar.oninvalid = function(event) {
    event.target.setCustomValidity('Search queries can only be A-Z');
}

// ---------

// get checkbox
const filters = document.querySelectorAll('.filters fieldset input');
for(let filter of filters){
	console.log(filter);

	filter.addEventListener('change', (event) => {
		if (event.target.checked) {
			console.log('checked');
		} else {
			console.log('not checked');
		}
	});
}




// ---------


const form = document.getElementById('form');

const processForm = (e)=>{
	e.preventDefault();

	// console.log('Form submitted');
	// console.group('Event Info');
	// console.log(e);
	// console.groupEnd();

	let httpRequest;

	let data = new FormData(form);
	// for (var pair of data.entries()) {
	// 	console.log(pair[0]+ ', ' + pair[1]); 
	// }
	httpRequest = new XMLHttpRequest();

	if (!httpRequest) {
		window.alert('Cannot create an XMLHTTP instance');
		return false;
	}

	httpRequest.onreadystatechange = alertContents;
	httpRequest.open('POST', form.action, true);
	httpRequest.send(data);

	const alertContents = () => {
		try {
			if (httpRequest.readyState === XMLHttpRequest.DONE) {
				if (httpRequest.status === 200) {
					const response = JSON.parse(httpRequest.responseText);
					// console.log(response);
					// console.log(response.rows[0].title);
					// console.log(response.userQuery);

					populateResults(response.rows);
				} else {
					console.log('There was a problem with the request.');
				}
			}
		} catch (event) {
			console.log(`Caught Exception: ${event.description}`);
		}
	};

	setTimeout(() => {
		alertContents();	
	}, 1000);

}

form.addEventListener('submit', processForm);

// ---------

// const countDisplay = document.querySelector('.count');
const countDisplayInstance = document.querySelector('.count .instance');
const countDisplayTotal = document.querySelector('.count .total');

const resultsGrid = document.querySelector('.results .content');

const populateResults = (rows) => {

	resultsGrid.innerHTML = '';

	countDisplayInstance.textContent = rows.length;
	countDisplayTotal.textContent = rows.length;

	for(let row of rows){
		// console.log(row);
		let wrapper = document.createElement('a');
		wrapper.href = 'recipe.php?' + row.id;

		let card = document.createElement('div');
		card.classList.add('card');
		wrapper.appendChild(card);

		let header = document.createElement('header');
		let title = document.createElement('h4');
		title.innerText = row.title;
		header.appendChild(title);
		card.appendChild(header);

		let imgWrapper = document.createElement('div');
		imgWrapper.classList.add('img');
		let picture = document.createElement('picture');
		let source = document.createElement('source');
		source.setAttribute('srcset', `assets/img/${row.dir}/beauty_pic_500.jpg`);
		let img = document.createElement('img');
		img.setAttribute('src', `assets/img/${row.dir}/beauty_pic_500.jpg`);
		img.setAttribute('alt', row.title);
		picture.appendChild(source);
		picture.appendChild(img);
		imgWrapper.appendChild(picture);
		card.appendChild(imgWrapper);

		resultsGrid.appendChild(wrapper);
		// console.log(wrapper);
	}

	
}