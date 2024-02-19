const allStar = document.querySelectorAll('.star');
  
function getrate(rate){
  let rateValue = rate;
  console.log("hello")

  for(let i = 0; i<rateValue; i++){
    allStar[i].classList.replace('bx-star', 'bxs-star');
  }
}