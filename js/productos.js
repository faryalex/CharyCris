const btnCart = document.querySelector('.container-cart-icon')
const containerCartProducts = document.querySelector('.container-cart-products')




btnCart.addEventListener('click', () => {
    containerCartProducts.classList.toggle('hidden-cart')
})



/*///////////////////////////*/

const cartInfo = document.querySelector('.cart-product')
const rowProduct = document.querySelector('.row-product')

/////////lista de todos los contendores de productos

const productlist = document.querySelector('.container-items')

//////////variable de arreglo de productos
let allProducts = []

const valortotal = document.querySelector('.total-pagar')
const countProducts = document.querySelector('#contador-productos')



productlist.addEventListener('click', e =>{
    
    if(e.target.classList.contains('btn-add-cart')){
        console.log("holaaa");
        const product = e.target.parentElement

        const infoProduct = {
            quantity: 1,
            title: product.querySelector('h2').textContent,
            price: product.querySelector('p').textContent,

        }
        const exits = allProducts.some(product => product.title === infoProduct.title)
        if(exits){
            const products = allProducts.map(product =>{
                if(product.title === infoProduct.title){
                    product.quantity++;
                    return product;
                }else{
                    return product;
                }
            })
            allProducts = [...products]
        }else{

        
        allProducts = [...allProducts, infoProduct]
        }
        showHTML();
    }
})

//Eliminar productos carrito

rowProduct.addEventListener('click', (e) => {

    
    if(e.target.classList.contains('icon-close')){
        const product = e.target.parentElement
        const title = product.querySelector('p').textContent

        allProducts = allProducts.filter(product => product.title !== title)
    };
    showHTML();
    

});


//////////FUNCION PARA MOSTRAR html
const showHTML = () =>{
    
    /////limpiar html
    rowProduct.innerHTML='';
    ///////

    let total = 0;
    let totalOfProducts = 0;

    allProducts.forEach(product =>{
        const containerProduct = document.createElement('div')
        containerProduct.classList.add('cart-product')

        containerProduct.innerHTML = ` 
        <div class="info-cart-product">
                                <span class="cantidad-producto-carrito">${product.quantity}</span>
                                <p class="titulo-producto-carrito">${product.title}</p>
                                <span class="precio-producto-carrito">${product.price}</span>
                            </div>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="icon-close"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
        
        ` ;
        rowProduct.append(containerProduct)

        ////actualizando el valor contador productos
        total = total + parseFloat(product.quantity * product.price.slice(1))
        totalOfProducts = totalOfProducts + product.quantity;
    });

   valortotal.innerText = `$${total} ` 
   countProducts.innerText = totalOfProducts; 


};





///////////////////Enviar correo//////////////////////////
///////////enviar whatsapp///////////
const btn_pagar = document.querySelector('.cart-total')
btn_pagar.addEventListener('click', (e) => {
    if(e.target.classList.contains('btn_pagar')){
    console.log("hola mundo")
    
    /*var carrito = {
  productos: [
    { id: 1, nombre: "Producto 1", precio: 10 },
    { id: 2, nombre: "Producto 2", precio: 20 },
    { id: 3, nombre: "Producto 3", precio: 30 }
  ],
  total: 0
};*/
    var carrito = allProducts;

/* Calcular el total del carrito
for (var i = 0; i < carrito.productos.length; i++) {
  carrito.total += carrito.productos[i].precio;
}*/

    $.ajax({
    type:"POST",
    url: "../Ventanas/enviar.php", // URL del archivo PHP que procesa la solicitud
    type: "POST", // Tipo de solicitud
    data: { variable: JSON.stringify(carrito)}, // Variable que se envía al servidor
    success: function(respuesta) {
        // Código que se ejecuta si la solicitud se realiza correctamente
        alert("Se ha enviado el correo");
    },
    error: function(xhr, status, error) {
        // Código que se ejecuta si hay un error al realizar la solicitud
        console.log("Error: " + error);
    }
});


}   
})