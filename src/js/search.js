// --------------------------------------------------------
// GLOBAL VARS
// --------------------------------------------------------
const searchbar = document.querySelector('.search input');
const filters = document.querySelectorAll('.filters fieldset input');
const form = document.getElementById('form');
const countDisplayText = document.querySelector('.count span');
const resultsGrid = document.querySelector('.results .content');

let resultsLocal = {};

const activeFilters = [];

for (let filter of filters) {

	if (filter.checked) {
		activeFilters.push(filter.value);
	}

	filter.addEventListener('change', (event) => {
		if (event.target.checked) {
			// console.log('checked');
			activeFilters.push(filter.value);
		} else {
			// console.log('not checked');
			let index = activeFilters.indexOf(filter.value);
			activeFilters.splice(index, 1);
		}
		Object.keys(resultsLocal).length !== 0 && populateResults(resultsLocal.rows);

	});
}

// --------------------------------------------------------
// GLOBAL FUNCTIONS
// --------------------------------------------------------

/**
 * Creates an ajax obj with searchbar input
 */
const createHttpRequest = () => {
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

	httpRequest.onreadystatechange = function () {
		getResponse(httpRequest);
	};
	httpRequest.open('POST', form.action, true);
	httpRequest.send(data);

	return httpRequest;
};

/**
 * Collects response from passed ajax obj
 * Calls populateResults() with response rows
 * @param {httpRequestObject} httpRequest 
 */
const getResponse = (httpRequest) => {
	try {
		if (httpRequest.readyState === XMLHttpRequest.DONE) {
			if (httpRequest.status === 200) {
				const response = JSON.parse(httpRequest.responseText);
				console.log(response);
				resultsLocal = response;
				populateResults(resultsLocal.rows);
			} else {
				console.log('There was a problem with the request.');
			}
		}
	} catch (event) {
		console.log(`Caught Exception: ${event.description}`);
	}
};

/**
 * Catches user hitting enter on searchbar
 * creates ajax
 * @param {event} e 
 */
const processForm = (e) => {
	e.preventDefault();

	// console.group('Event Info');
	// console.log(e);
	// console.groupEnd();

	createHttpRequest();
};

/**
 * Displays 
 * @param {Array} rows 
 * @return {Number} visible rows
 */
const populateResults = (rows) => {

	resultsGrid.innerHTML = '';

	let total = 0;
	for (let row of rows) {
		// console.log(row);
		if (activeFilters.indexOf(row.meat) == -1) {
			continue;
		} else {
			total++;
		}

		/*
		HTML STRUCTURE
		a.wrapper
			div.card
				header
				div.img
					picture
						source
						img
		*/

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

	countDisplayText.textContent = 'Showing ' + total + ' of ' + rows.length + ' results';

	return total;

};

// --------------------------------------------------------
// EVENT LISTENERS
// --------------------------------------------------------

searchbar.oninvalid = function (event) {
	event.target.setCustomValidity('Search queries can only be A-Z');
};

form.addEventListener('submit', processForm);