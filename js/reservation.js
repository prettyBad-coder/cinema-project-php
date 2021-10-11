const initialize = async () => {
	const data = await fetch('http://localhost/backend/get_tickets.php').then((response) => { return response.json() });
	const container = document.querySelector('.single-movie__container');
	const user_id = document.getElementById('reservation').getAttribute('user_id');
	const movie_id = document.getElementById('reservation').getAttribute('movie_id');
	let seats = [];
	let seat = 1;
	let tickets = [];

	for (let i = 0; i < 15; i++) {
		seats[i] = [];
		for (let j = 0; j < 20; j++) {
			seats[i][j] = {
				id: seat,
				element: document.createElement('DIV'),
				taken: false,
				chosen: false,
			};

			for (let x = 0; x < data.length; x++) {
				if(seat == data[x].seat && movie_id == data[x].movie) {
					seats[i][j].taken = true;
				}
			}

			if(seats[i][j].taken) {
				seats[i][j].element.style.backgroundColor = 'red';
			} else {
				seats[i][j].element.addEventListener('click', (event) => {
					if(seats[i][j].chosen) {
						event.target.style.backgroundColor = 'green';
						seats[i][j].chosen = false;
					} else {
						event.target.style.backgroundColor = 'yellow';
						seats[i][j].chosen = true;
					}
					tickets = [];
					for (let x = 0; x < 15; x++) {
						for (let y = 0; y < 20; y++) {
							if(seats[x][y].chosen) {
								tickets[tickets.length] = {
									user_id: user_id,
									movie_id: movie_id,
									seat: seats[x][y].id
								}
							}
						}
					}
					console.log(tickets);
				});
				seats[i][j].element.style.backgroundColor = 'green';
			}

			seats[i][j].element.classList.add('single-movie__seat');
			seats[i][j].element.innerHTML = seats[i][j].id;
			container.appendChild(seats[i][j].element);
			seat++;
		}
	}
	document.querySelector('.single-movie__reservation-button').addEventListener('click', () => {
		fetch('http://localhost/backend/add_tickets.php', {
			method: 'POST',
			body: JSON.stringify(tickets)
		}).then(response => response.text()).then(data => console.log(data));
	})

}
initialize();