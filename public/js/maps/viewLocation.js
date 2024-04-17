var map = L.map('map');
map.setView([7.227426380784552, 79.86196054596938], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);



const circleCenter1 = L.latLng(6.929252138500925, 79.86590887375297);
const circleCenter2 = L.latLng(7.228097831626657, 79.86323663584378);
const circleRadius = 170; // Radius in meters

navigator.geolocation.watchPosition(success,error,{ 
  enableHighAccuracy: true,
  timeout: 5000, // 10 seconds
  maximumAge: 10000   // Don't use a cached position
});

let marker, circle;

function success(pos) {
  const lat = pos.coords.latitude
  const lng = pos.coords.longitude
  document.querySelector('.coordinates').innerHTML = lat + ' ' + lng
  console.log(pos)  

  if(marker) {
    map.removeLayer(marker)
  }


  // Create a LatLng object for current position
  const currentLatLng = L.latLng(lat, lng);

  // Calculate the distance between current location and circle center
  const distance1 = currentLatLng.distanceTo(circleCenter1); // Distance in meters
  const distance2 = currentLatLng.distanceTo(circleCenter2);

  // Check if the distance is within the circle's radius
  const isInsideCircle1 = distance1 <= circleRadius;
  const isInsideCircle2 = distance2 <= circleRadius;

  if(isInsideCircle1 || isInsideCircle2) {
    document.querySelector('.status').innerHTML = 'In range'
    console.log("In range")
  } else {
    document.querySelector('.status').innerHTML = 'Not in range'
    console.log("Not in range")
  }

  L.marker([6.933361037156992, 79.85082087107394]).addTo(map);
  // L.marker([7.228097831626657, 79.86323663584378]).addTo(map);
  
  circle = L.circle([6.933361037156992, 79.85082087107394], {radius: circleRadius}).addTo(map);
  // L.circle([7.228097831626657, 79.86323663584378], {radius: circleRadius}).addTo(map);

   marker = L.marker([lat, lng]).addTo(map);

  map.fitBounds(circle.getBounds());
}

function error(err) {
  if (err.code === 1) {
    alert("Please allow geolocation access");
  } else {
    alert("Cannot get current location")
  }
}