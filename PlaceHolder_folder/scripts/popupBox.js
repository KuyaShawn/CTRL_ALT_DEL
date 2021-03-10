let openModalButtons = document.querySelectorAll('[data-popup-target]')
let closeModalButtons = document.querySelectorAll('[data-close-button]')
let overlay = document.getElementById('overlay')

openModalButtons.forEach(onClick => {
    onClick.addEventListener('click', () => {
        let popup = document.querySelector(onClick.dataset.popupTarget)
        openModal(popup)
    })
})

overlay.addEventListener('click', () => {
    let popups = document.querySelectorAll('.popup_container.active')
    popups.forEach(popup_container => {
        closeModal(popup_container)
    })
})

closeModalButtons.forEach(onClick => {
    onClick.addEventListener('click', () => {
        let popup = onClick.closest('.popup_container')
        closeModal(popup)
    })
})

function openModal(popup) {
    if (popup == null) return
    popup.classList.add('active')
    overlay.classList.add('active')
}

function closeModal(popup) {
    if (popup == null) return
    popup.classList.remove('active')
    overlay.classList.remove('active')
}