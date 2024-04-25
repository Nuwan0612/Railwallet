    <script>
      setInterval(() => {
        $.ajax({
          type: 'GET',
          url: 'http://localhost/railwallet/supporters/notifySupporter',
          success: function(response){
            const iconElement = document.getElementById('active')  
            if (response === true) {
              iconElement.classList.remove('notification-support');
              iconElement.classList.add('notification-support-active');
            } else {
              iconElement.classList.add('notification-support');
              iconElement.classList.remove('notification-support-active');
            }   
          }
        })
      }, 500);
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  </body>
</html>