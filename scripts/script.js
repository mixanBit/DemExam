
// Бургер меню
let sidebar = document.querySelector('.sidebar')
let btnSidebar = document.querySelector('.btn_sidebar')

btnSidebar.addEventListener('click', () => {
  sidebar.classList.toggle('sidebar_active')
})

// Модальное окно
let modalBtn = document.querySelectorAll('.modal_btn')
let modal = document.querySelectorAll('.modal')

for(let i = 0; i < modalBtn.length; i++){
  modalBtn[i].addEventListener('click', () => {
    modal[i].classList.add('modal_active')

    modal[i].addEventListener('click', (el) => {
      if(el.target.classList.contains('modal_active')){
        modal[i].classList.remove('modal_active')
      }
    })
  })
}

