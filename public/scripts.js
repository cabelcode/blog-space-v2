

var hamburgerToggle = document.querySelectorAll('.hamburgerToggle');
var hamburgerTarget = document.querySelectorAll('.hamburgerTarget');
hamburgerToggle.forEach( el => {
    el.addEventListener( 'click', () => {
        hamburgerTarget.forEach( el2 => {
            el2.classList.toggle('active');
        })
    } )
} )