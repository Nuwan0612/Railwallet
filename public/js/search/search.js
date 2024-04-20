
function searchChecker() {
  const searchQuery = document.getElementById('search-checker').value;
  if (searchQuery.trim() === "") {
    return;
  }
  window.location.href = `http://localhost/railwallet/admins/searchChecker/${searchQuery}`;
}

function searchSupporter() {
  const searchQuery = document.getElementById('search-supporter').value;
  if (searchQuery.trim() === "") {
    return;
  }
  window.location.href = `http://localhost/railwallet/admins/searchSupporter/${searchQuery}`;
}

function searchTrain() {
  const searchQuery = document.getElementById('search-train').value;
  if (searchQuery.trim() === "") {
    return;
  }
  window.location.href = `http://localhost/railwallet/admins/searchTrain/${searchQuery}`;
}

function searchTicket() {
  const searchQuery = document.getElementById('search-ticket').value;
  if (searchQuery.trim() === "") {
    return;
  }
  window.location.href = `http://localhost/railwallet/admins/searchTicketPrice/${searchQuery}`;
}

function searchUser() {
  const searchQuery = document.getElementById('search-users').value;
  if (searchQuery.trim() === "") {
    return;
  }
  window.location.href = `http://localhost/railwallet/admins/searchUser/${searchQuery}`;
}

function searchStation() {
  const searchQuery = document.getElementById('search-station').value;
  if (searchQuery.trim() === "") {
    return;
  }
  window.location.href = `http://localhost/railwallet/admins/searchStation/${searchQuery}`;
}

function searchSheduleByID() {
  const id = document.getElementById('search-shedule-by-ID').value;
  if (id.trim() === "") {
    return;
  }  
  window.location.href = `http://localhost/railwallet/admins/searchSheduleByID?id=${id}`;   
}

// Search fines by checker id
function searchFines() {
  const id = document.getElementById('search-fines').value;
  if (id.trim() === "") {
    return;
  }  
  window.location.href = `http://localhost/railwallet/checkers/searchFinesByUserId/${id}`;   
}

// Search schedule by schedule id
function searchByScheduleID() {
  const id = document.getElementById('search-shedule-by-SID').value;
  if (id.trim() === "") {
    return;
  }  
  window.location.href = `http://localhost/railwallet/checkers/searchSchedulesByScheduleId/${id}`;   
}

// Search schedule by departure station
function searchByDepartureStation() {
  const id = document.getElementById('search-departureStation').value;
  if (id.trim() === "") {
    return;
  }  
  window.location.href = `http://localhost/railwallet/checkers/searchSchedulesByDepartureStation/${id}`;   
}

// Search schedule by arrival station
function searchByArrivalStation() {
  const id = document.getElementById('search-arrivalStation').value;
  if (id.trim() === "") {
    return;
  }  
  window.location.href = `http://localhost/railwallet/checkers/searchSchedulesByArrivalStation/${id}`;   
}

// Search schedule by date
function searchByDate() {
  const id = document.getElementById('search-by-date').value;
  if (id.trim() === "") {
    return;
  }  
  window.location.href = `http://localhost/railwallet/checkers/searchSchedulesByDate/${id}`;   
}

function searchDepartureStation() {
  const departueStation = document.getElementById('search-departure-station').value;
  const arrivalStation = document.getElementById('search-arrival-station').value;
  const date = document.getElementById('search-date').value;
  if (departueStation.trim() === "" && arrivalStation.trim() === "" || departueStation.trim() === "") {
    return;
  }  

  if(!departueStation){
    alert('Please enter departure station ID')
  }
  if(!arrivalStation){
    alert('Please enter arrival station ID')
  }
  if(!date){
    alert('Please enter date')
  }
  window.location.href = `http://localhost/railwallet/admins/searchSheduleByStation?departuerStation=${departueStation}&arrivalStation=${arrivalStation}&date=${date}`;
}

function searchTravelDetails() {
  const searchQuery = document.getElementById('search-travel-details').value;
  if(searchQuery.trim() === ""){
    return;
  }

  let id = '';

  const url = window.location.href;
  const segments = url.split('=')
  const urlSegments = window.location.pathname.split('/')
  
  if(segments.length > 1) {
    id = segments[2]
  } else {
    id = urlSegments[urlSegments.length -1];
  }

  window.location.href = `http://localhost/railwallet/admins/searchTravelDetails?date=${searchQuery}&id=${id}`; 
}