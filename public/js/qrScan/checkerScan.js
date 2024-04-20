function domReady(fn) {
  if (
    document.readyState === "complete" ||
    document.readyState === "interactive"
  ) {
    setTimeout(fn, 1000);
  } else {
    document.addEventListener("DOMContentLoaded", fn);
  }
}

domReady(function () {

  function onScanSuccess(decodeText, decodeResult) {
    checkAvaliability(decodeText);   
  }

  let htmlscanner = new Html5QrcodeScanner(
      "my-qr-reader",
      { fps: 20, qrbos: 250 }
  );
  htmlscanner.render(onScanSuccess);
});

function checkAvaliability(decodeText){
  $.ajax({
    type: 'POST',
    url: 'http://localhost/railwallet/checkers/checkavailabiltyOfJourney',
    contentType: 'application/json',
    data: JSON.stringify({ 
        "journey": decodeText,
    }),
    success: function(response) {
        if (response) {
          window.location.href = 'http://localhost/railwallet/checkers/validateTicket/' + decodeText;
        } else {
          document.querySelector('.warning').innerHTML = "No journey detected"
        }
    },
    error: function(xhr, status, error) {
        // Handle errors
        console.error(xhr.responseText);
    }
});
}

