
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

function searchDepartureStation(){
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
  window.location.href = `http://localhost/railwallet/searchSheduleByStation?departuerStation=${departueStation}&arrivalStation=${arrivalStation}&date=${date}`;
}