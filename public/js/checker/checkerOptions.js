//Cancel Journey
function cancelJourney(){
  const journey = window.location.pathname.split('/');
  window.location.href = 'http://localhost/railwallet/checkers/cancelTicket/' + journey[journey.length-1]
}

function redirectToscan(){
  window.location.href = 'http://localhost/railwallet/checkers/qrScan/'
}

function issueFine(){
  
  let fineDetails = document.getElementById('fine-details')
  let fineAmount = document.getElementById('fine-amount')
  if (!fineDetails.value && !fineAmount.value){
    document.querySelector('.warning').innerHTML = 'Please enter reason for the fine and fine amount'
  } else if(!fineDetails.value){
    document.querySelector('.warning').innerHTML = 'Please enter reason for the fine '
  } else if(!fineAmount.value){ 
    document.querySelector('.warning').innerHTML = 'Please enter fine amount'
  } else {
    document.querySelector('.warning').innerHTML = ''
    const journey = window.location.pathname.split('/');
    window.location.href = `http://localhost/railwallet/checkers/issueFine?id=${journey[journey.length-1]}&reason=${fineDetails.value}&fineAmount=${fineAmount.value}`
  }
  
}

function issueFineWithUserId(){
  const fineDetails = document.getElementById('fine-detail')
  const fineAmount = document.getElementById('fine-amount-user')
  const userId = document.getElementById('user-id')

  if(!fineDetails.value || !fineAmount.value || !userId.value){
    document.querySelector('.warning').innerHTML = 'Please enter details'
  } else {
    $.ajax({
      type: 'POST',
      url: 'http://localhost/railwallet/checkers/checkValidityOfUser',
      contentType: 'application/json',
      data: JSON.stringify({
        'passenger_id': userId.value
      }),
      success: function(response){
        if(response){
          document.querySelector('.warning').innerHTML = ''
          window.location.href = `http://localhost/railwallet/checkers/isuueFineWithUserId?details=${fineDetails.value}&amount=${fineAmount.value}&passenger=${userId.value}`
        } else {
          document.querySelector('.warning').innerHTML = 'Not a vlaid passenger id'
        }
      },
      error: function(xhr, status, error){
        console.error(xhr.responseText)
      }
    })
    
  }
  
}
