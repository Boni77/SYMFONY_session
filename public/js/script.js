/* Sélection des éléments HTML */
let link = document.getElementById('link')
let burger = document.getElementById('burger')
let nav = document.querySelector('nav')
let list = document.querySelector('.list')
let connexion = document.querySelector('.connexion')


/* gestionnaire d'événement sur le a#link pour venir changer l'attribution de la classe .open à la ul et au span#burger */
link.addEventListener('click', function(e) {

  burger.classList.toggle('open')
  list.classList.toggle('active')
  connexion.classList.toggle('active')
})