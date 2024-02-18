const allStar = document.querySelectorAll('.star');
    
let rateValue = 5;

for(let i = 0; i<rateValue; i++){
  allStar[i].classList.replace('bx-star', 'bxs-star');
}