//Show button partner registration
const showPartner = document.querySelectorAll('.regis-partner-car .show-partner')
const btnRegis = document.querySelectorAll('.regis-partner-car .block-full.btn-regis')
showPartner.forEach((e) => {
    e.addEventListener('click', () => {
        e.classList.toggle('active')
    })

})