
    <?php require APPROOT . '/views/admin/includes/header.php';?>
      <div class="content">
        <div class="outer-container">
          <div class="Station-name"></div>

          <div class="map-outer-container">
            <div id="map"></div>
          </div>

          <div class="coordinates"></div>
        </div>
      </div>
  
      <script>
        let map = L.map('map');
        map.setView([7.227426380784552, 79.86196054596938], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        let circle;
        let lat = <?php echo $data['details']->latitude?>;
        let lng = <?php echo $data['details']->longitude?>;
        let circleRadius = 170;
        L.marker([lat,lng]).addTo(map);      
        circle = L.circle([lat, lng], {radius: circleRadius}).addTo(map);      
        map.fitBounds(circle.getBounds());

        document.querySelector('.Station-name').innerHTML = '<?php echo $data['details']->name?> Station';
        document.querySelector('.coordinates').innerHTML = `Latitude: ${lat}, &nbsp  &nbsp Longitude: ${lng}`;
        
      </script>

<?php require APPROOT . '/views/admin/includes/footer.php';?>