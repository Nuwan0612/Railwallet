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
