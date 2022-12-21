const abrir = document.getElementById('open');
const modal_container = document.getElementById('modal_container');
const cerrar = document.getElementById('close');

abrir.addEventListener('click', function(){ 
    modal_container.classList.add('show');
 });

cerrar.addEventListener('click', (e) => {
  modal_container.classList.remove('show');
});