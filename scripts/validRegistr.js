// Валидация регистрации
let regInput = document.querySelectorAll('.reg_input')
let error = document.querySelector('.error')
let formReg = document.querySelector('.form_reg')

for(let i = 0; i < regInput.length; i++){
  regInput[i].addEventListener('invalid', checkReg)
  regInput[i].addEventListener('input', resetCheckReg)
}

formReg.addEventListener('submit', checkPass)

// Проверка на заполнение всех полей
function checkReg(el){
  this.classList.add('input_error')
  error.classList.add('error_acitve')
  error.innerHTML = 'Заполните все поля!'
  el.preventDefault()
}

function resetCheckReg() {
  this.classList.remove('input_error')
}

function checkPass(el) {
  // Совпадение паролей
  let regPassword = document.querySelector('.reg_password')
  let regTopassword = document.querySelector('.reg_topassword')
  if(regPassword.value != regTopassword.value){
    error.classList.remove('error_acitve')
    setTimeout(()=>{error.classList.add('error_acitve')}, 400)
    error.innerHTML = 'Разные пароли!'

    regPassword.classList.add('input_error')
    regTopassword.classList.add('input_error')
    el.preventDefault()
  }
  else{
    error.classList.remove('error_acitve')

    regPassword.classList.remove('input_error')
    regTopassword.classList.remove('input_error')
    el.preventDefault()
  }

  // Активность пользовательского соглащения
  let pd = document.querySelector('.pd_input').checked
  if(!pd){
    error.classList.remove('error_acitve')
    setTimeout(()=>{error.classList.add('error_acitve')}, 400)
    error.innerHTML = 'Поставьте соглашение'
    el.preventDefault()
  }
  else{
    error.classList.remove('error_acitve')
    el.preventDefault()
  }

  if(regPassword.value == regTopassword.value && pd == true){
    checkRegLogin()
  }

  el.preventDefault()
}

// Проверка уникальности логина
async function checkRegLogin() {
  let login = document.querySelector('.reg_login')
  let data = new FormData()
  data.append('login', login.value)

  let response = await fetch('checkReg.php',{
    method: 'POST',
    body: data
  })

  let result = await response.json()
  if(result == 'error'){
    error.classList.remove('error_acitve')
    login.classList.add('input_error')
    setTimeout(()=>{error.classList.add('error_acitve')}, 400)
    error.innerHTML = 'Данный логин уже существует'
  }
  else{
    error.classList.remove('error_acitve')
    login.classList.remove('input_error')
    formReg.submit()
  }
}