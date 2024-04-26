const notificationContainer = document.querySelector('.notify')

notificationContainer.addEventListener('click', () => {
  
    const notificationBody = document.querySelector('.notification-outer-container')
    const display = window.getComputedStyle(notificationBody).display
    const notifi = document.querySelector('.notifi')
    

    $.ajax({
      type: 'POST',
      url: 'http://localhost/railwallet/passengers/setToRead',
      success: function (response) {
        if(response){
          notifi.style.display = 'none';
        }
      }
    })

    if(display == 'none'){
      notificationBody.style.display = 'block';
    } else {
      notificationBody.style.display = 'none';
    }
})


$.ajax({
  type: 'GET',
  url: `http://localhost/railwallet/passengers/notifications`,
  success: function(response){
    const notification = document.querySelector('.notification-body-outer')
    const notifi = document.querySelector('.notifi')
    let notificationBody = '';
   
    response.forEach((message) => {
      if(!parseInt(message.seen)){
        notifi.style.display = 'block';
      }
      notificationBody += `
        <div class="notification-body">
          <div class="notification">
              ${message.message}
          </div>
        </div>
      `

      notification.innerHTML = notificationBody;
    });
  }
})
