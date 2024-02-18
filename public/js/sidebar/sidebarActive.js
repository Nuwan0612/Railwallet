const list = document.querySelectorAll('side-menu ul a .side-list');

function activeLink(){
  list.forEach((item) => 
  item.classList.remove('active'));
  this.classList.add('active');
}

list.forEach((item) => 
  item.addEventListener('click', activeLink));