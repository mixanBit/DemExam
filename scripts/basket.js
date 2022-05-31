let buy = document.querySelectorAll('.buy')
let idProduct = document.querySelectorAll('.id_product')

let title = document.querySelectorAll('.title')
let price = document.querySelectorAll('.price')

// Кнопка оформления заказа
let btnOrder = document.querySelector('.btn_order')

for(let i = 0; i < buy.length; i++){
  buy[i].addEventListener('click', async () => {
    let data = new FormData()
    data.append('idProduct', idProduct[i].innerText)
    data.append('title', title[i].innerText)
    data.append('price', price[i].innerText)


    let result = await fetch('../add-basket.php',{
      method: 'POST',
      body: data
    })

    let res = await result.json()
    if(res == true){
      location.reload()
    } else{
      console.log('error');
    }
  })
}




// Удаление товара из корзины
let deleteProduct = document.querySelectorAll('.delete_product')
let idIdBasket = document.querySelectorAll('.id_idBasket')

for(let i = 0; i < deleteProduct.length; i++){
  deleteProduct[i].addEventListener('click', async () => {
    let data = new FormData()
    data.append('idBasket', Number(idIdBasket[i].innerText))

    let result = await fetch('../delete-basket.php', {
      method: 'post',
      body: data
    })

    let res = await result.json()
    if(res == true){
      location.reload()
    }
  })
}


// Сумма заказа
let basketSumma = document.querySelector('.basket_summa')
let basketPrice = document.querySelectorAll('.basket_price')
let summa = 0;

basketSumma.innerText = summa

for(let i = 0; i < basketPrice.length; i++){
  summa = summa + Number(basketPrice[i].innerHTML)
  basketSumma.innerText = summa
}

// Если товраов в корзине нет, убирается кнопка "оформить"
if(summa == 0){
  btnOrder.style.display = 'none'
} else{
  btnOrder.style.display = 'flex'
}


// Оформление заказа
btnOrder.addEventListener('click', async () => {
  let data = new FormData()
  data.append('summa', summa)

  let result = await fetch('../add-order.php',{
    method: 'POST',
    body: data
  })

  let res = await result.json()
    if(res == true){
      location.reload()
    }
})
