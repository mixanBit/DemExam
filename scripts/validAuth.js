let authInput = document.querySelectorAll('.auth_input')
let errorAuth = document.querySelector('.error_auth')

for(let i = 0; i < authInput.length; i++){
  authInput[i].addEventListener('invalid', checkAuth)
  authInput[i].addEventListener('input', resetCheckAuth)
}


function checkAuth(el){
  this.classList.add('input_error')
  errorAuth.classList.add('error_acitve')
  errorAuth.innerHTML = 'Заполните все поля!'
  el.preventDefault()
}


function resetCheckAuth() {
  this.classList.remove('input_error')
}