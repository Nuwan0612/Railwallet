const wrapper = document.querySelectorAll('.wrapper');

let departureStation = '';
let arrivalStation = '';
let trainClass = '';
let ticket = '';
let station1lat = '' , station2lat = '';
let station1lng = '' , station2lng = '';


function updateName(selectedli, type, staionOrClass) {
  const wrapper = selectedli.closest('.wrapper');
  const selectBtn = wrapper.querySelector('.select-btn');
  selectBtn.firstElementChild.innerText = selectedli.innerText;
  wrapper.classList.remove('active');
	
	if(type == 'Departure') {
		departureStation = staionOrClass;
	} else if(type == 'arrival'){
		arrivalStation = staionOrClass;
	} else if(type == 'trainClass'){
		trainClass = staionOrClass;
	}

	document.querySelector('.warning').innerHTML = "";
	document.getElementById('end-journey-btn').style.display = 'none';
  document.getElementById('start-journey-btn').style.display = 'none';

	if(departureStation && arrivalStation && trainClass){
		checkTicketAvailability();	
	}

}

//Check the availability of the ticket and the balance of the wallet for the journey
function checkTicketAvailability() {
	$.ajax({
			type: 'POST',
			url: 'http://localhost/railwallet/passengers/checkTicketBeforeScan',
			contentType: 'application/json',
			data: JSON.stringify({ 
					"depID": departureStation,
					"arrID": arrivalStation,
					"class": trainClass
			}),
			success: function(response) {
					if (!response.success) {
						document.querySelector('.warning').style.color = 'var(--red)';
						document.querySelector('.warning').innerHTML = "There is no such ticket";
						ticket = '';
					} else if(!response.wallet) {
						document.querySelector('.warning').style.color = 'var(--red)';
						document.querySelector('.warning').innerHTML = "Your wallet balance is low please recharge your wallet";
					} else {
						ticket = response.success;
					}
			},
			error: function(xhr, status, error) {
					// Handle errors
					console.error(xhr.responseText);
			}
	});
}

wrapper.forEach(wrapper => {
  let selectBtn = wrapper.querySelector('.select-btn');
  let searchInp = wrapper.querySelector('input'); 
  let options = wrapper.querySelector('.options');
  let lists = wrapper.querySelectorAll('.options li');

  let stations = [];
    lists.forEach(option => {
        stations.push(option.innerText);
    });


  selectBtn.addEventListener('click',() =>{
    wrapper.classList.toggle('active');
  });

  
  searchInp.addEventListener('keyup',() =>{
    let arr = [];
    let searchedVal = searchInp.value.toLowerCase();
  
    arr = stations.filter(data => {
      return data.toLowerCase().startsWith(searchedVal);
    }).map(data => `<li onclick="updateName(this)">${data}</li>`).join("");
    options.innerHTML = arr ? arr : `<p>Oops! Station not found</p>`;
  });
})

//QR code scanner
function domReady(fn, departureStation, arrivalStation, trainClass) {
	if (
			document.readyState === "complete" ||
			document.readyState === "interactive"
	) {
			setTimeout(function() {
					fn(departureStation, arrivalStation, trainClass);
			}, 1000);
	} else {
			document.addEventListener("DOMContentLoaded", function() {
					fn(departureStation, arrivalStation, trainClass);
			});
	}
}

domReady(function() {

function onScanSuccess(decodeText, decodeResult, departureStation, arrivalStation, trainClass) {
		
	document.querySelector('.warning').style.color = 'var(--red)';
	if (departureStation == '' && arrivalStation == '') {
		document.querySelector('.warning').innerHTML = "Please Select Departure and the Arrival stations";	
	} else if (departureStation =='') {
		document.querySelector('.warning').innerHTML = "Please Select Departure stations";	
	} else if (arrivalStation == '') {
		document.querySelector('.warning').innerHTML = "Please Select Arrival stations";	
	} else if (trainClass == '') {
		document.querySelector('.warning').innerHTML = "Please Select Train class";	
	} else if (decodeText == departureStation) {
		if(ticket){
      getStationLocations('startJourney');
		}
	} else if (decodeText == arrivalStation) {
		if(ticket){
      getStationLocations('endJourney');
			
		}	
	} else {
		document.querySelector('.warning').innerHTML = "Selected Station Does not match";
		reomveButtons()
	}

}

let htmlscanner = new Html5QrcodeScanner(
	"my-qr-reader",
	{ fps: 20, qrbos: 250 }
);

htmlscanner.render(function(decodeText, decodeResult) {
	
	onScanSuccess(decodeText, decodeResult, departureStation, arrivalStation, trainClass);
	
});

}, departureStation, arrivalStation, trainClass,);

	
//Start Journey
function startJourney() {
	$.ajax({
		type: "POST",
		url: "http://localhost/railwallet/passengers/StartJourney",
		contentType: "application/json",
		data: JSON.stringify({
			"depID": departureStation,
			"arrID": arrivalStation,
			"ticket": ticket
		}),
		success: function(response) {
			if(response.unfinished) {
				document.querySelector('.warning').innerHTML = `There is a unfinished journey from ${response.unfinished.depStationName} to ${response.unfinished.arrStationName} with ${response.unfinished.ticketClass.className} class ticket.`;
				document.getElementById('start-journey-btn').style.display = 'none';
				document.getElementById('cancel-journey-btn').style.display = 'inline-block';
			} else if (response.success) {
				document.querySelector('.warning').style.color = 'var(--green)';
				document.querySelector('.warning').innerHTML = 'Have a safe Journey';
				reomveButtons()
			} else {
				document.querySelector('.warning').style.color = 'var(--red)';
				document.querySelector('.warning').innerHTML = 'Something went wrong, Please try again';
				reomveButtons()
			}
		},
		error: function(xhr, status, error) {
				// Handle errors
				console.error(xhr.responseText);
		}
	});
}

//end journey
function endJourney(){
	$.ajax({
		type: "POST",
		url: "http://localhost/railwallet/passengers/endJourney",
		contentType: "application/json",
		data: JSON.stringify({
			"depID": departureStation,
			"arrID": arrivalStation,
			"ticket": ticket
		}),
		success: function(response) {
			if (response.success){
				document.querySelector('.warning').style.color = 'var(--green)';
				document.querySelector('.warning').innerHTML = 'You have completed the journey successfully';
				reomveButtons()
			} else if(response.unfinished){
				document.querySelector('.warning').innerHTML = `There is a unfinished journey from ${response.unfinished.depStationName} to ${response.unfinished.arrStationName} with ${response.unfinished.ticketClass.className} class ticket.`;
			}
		},
		error: function(xhr, status, error) {
			console.error(xhr.responseText);
		}
	});
}

function reomveButtons() {
	document.getElementById('start-journey-btn').style.display = 'none';
	document.getElementById('end-journey-btn').style.display = 'none';
}

function getStationLocations(StartOrEnd){

  $.ajax({
		type: "POST",
		url: "http://localhost/railwallet/passengers/getStationLatAndLng",
		contentType: "application/json",
		data: JSON.stringify({
			"depID": departureStation,
			"arrID": arrivalStation,
		}),
    success: function(response){
      if(response){
        station1lat = response.station1.latitude;
				station1lng = response.station1.longitude;
				station2lat = response.station2.latitude;
				station2lng = response.station2.longitude;
				findIsUserInRightLocation(StartOrEnd);
      }
    },
    error: function(xhr, status, error){
      console.log(xhr.responseText)
    }
  });

}

function findIsUserInRightLocation(StartOrEnd){
	const circleCenterStation1 = L.latLng(station1lat, station1lng);
	const circleCenterStation2 = L.latLng(station2lat, station2lng);
	const circleRadius = 170; // Radius in meters

navigator.geolocation.watchPosition(success,error,{ 
  enableHighAccuracy: true,
  timeout: 5000, // 10 seconds
  maximumAge: 10000   // Don't use a cached position
});

	function success(pos) {
		const lat = pos.coords.latitude
		const lng = pos.coords.longitude

		// Create a LatLng object for current position
		const currentLatLng = L.latLng(lat, lng);

		// Calculate the distance between current location and circle center
		const distance1 = currentLatLng.distanceTo(circleCenterStation1); // Distance in meters
		const distance2 = currentLatLng.distanceTo(circleCenterStation2);

		// Check if the distance is within the circle's radius
		const isInsideCircleStation1 = distance1 <= circleRadius;
		const isInsideCircleStation2 = distance2 <= circleRadius;

		console.log(isInsideCircleStation1)
		console.log(isInsideCircleStation2);

		console.log(StartOrEnd);


		if(isInsideCircleStation1 || isInsideCircleStation2) {
			if(StartOrEnd == 'startJourney'){
				document.querySelector('.warning').innerHTML = "";
				document.getElementById('start-journey-btn').style.display = 'inline-block';
				document.getElementById('end-journey-btn').style.display = 'none';
			} else if(StartOrEnd == 'endJourney'){
				document.querySelector('.warning').innerHTML = "";
				document.getElementById('end-journey-btn').style.display = 'inline-block';
				document.getElementById('start-journey-btn').style.display = 'none';
			} 
		} else {
			document.querySelector('.warning').innerHTML = 'You are not at correct station'
			reomveButtons()
		}
	}

	function error(err) {
		if (err.code === 1) {
			alert("Please allow geolocation access");
		} else {
			alert("Cannot get current location")
		}
	}
}
