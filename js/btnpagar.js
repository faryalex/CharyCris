///////////enviar whatsapp///////////
const btn_pagar = document.querySelector('.cart-total')
btn_pagar.addEventListener('click', (e) => {
    if(e.target.classList.contains('btn_pagar')){
    console.log("hola mundo")
    window.open("enviar.php");
      
    }   
  })
  