const btnCart = document.querySelector('.container-cart-icon')
const containerCartProducts = document.querySelector('.container-cart-products')

btnCart.addEventListener('click', () => {
    containerCartProducts.classList.toggle('hidden-cart')
})
const cartInfo = document.querySelector('.cart-product')
const rowProduct = document.querySelector('.row-product')
const productlist = document.querySelector('.container-items')
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
rowProduct.addEventListener('click', (e) => {

    
    if(e.target.classList.contains('icon-close')){
        const product = e.target.parentElement
        const title = product.querySelector('p').textContent

        allProducts = allProducts.filter(product => product.title !== title)
    };
    showHTML();
    

});

const showHTML = () =>{
    rowProduct.innerHTML='';
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
        total = total + parseFloat(product.quantity * product.price.slice(1))
        totalOfProducts = totalOfProducts + product.quantity;
    });

   valortotal.innerText = `$${total} ` 
   countProducts.innerText = totalOfProducts; 


};

const btn_pagar = document.querySelector('.cart-total')
btn_pagar.addEventListener('click', (e) => {
    console.log("hola desdejs");

    $.ajax({
        url: 'Configuraciones/verificar-sesion.php',
        dataType: 'text',
        success: function (response) {
            if (response == 'ok') {

                Swal.fire({
                    title: '',
                    text: 'Deseas realizar el pedido?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Continuar',
                    cancelButtonText: 'Cancelar',
                    allowOutsideClick: false, // Evita que se cierre haciendo clic afuera
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Aquí colocas el código que deseas ejecutar cuando el usuario hace clic en "Aceptar"

                        console.log(allProducts)
                        // Convertir el array a JSON
                        let jsonData = JSON.stringify(allProducts);

                        // Enviar la solicitud POST al archivo PHP
                        fetch('Ventanas/enviar.php', {
                            method: 'POST',
                            body: jsonData
                        })
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Error en la solicitud');
                                }
                                return response.json();
                            })
                            .then(data => {
                                console.log(data);
                            })
                            .catch(error => {
                                console.error(error);
                            });
                        Swal.fire({
                            title: 'Éxito',
                            text: 'Pedido realizado con exito, en unos instantes un asesor se comunicara contigo',
                            icon: 'success',
                            confirmButtonText: 'Cerrar',
                            allowOutsideClick: false, // Evita que se cierre haciendo clic afuera
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirecciona o realiza alguna acción después de iniciar sesión
                                // Puedes utilizar window.location.href para redireccionar
                                window.location.href = "./index.php";
                            }
                        });

                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        // Aquí colocas el código que deseas ejecutar cuando el usuario hace clic en "Cancelar

                    }
                });

            } else {
                // Si la sesión no está iniciada, mostrar un mensaje de error
                Swal.fire({
                    title: '',
                    text: 'Debes Iniciar Sesion ',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Iniciar Sesion',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Aquí colocas el código que deseas ejecutar cuando el usuario hace clic en "Aceptar"
                        window.location.href = "./login.php";
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        // Aquí colocas el código que deseas ejecutar cuando el usuario hace clic en "Cancelar"

                    }
                });

            }
        }
    });
    return false;
    /////////////



    ///////////////
});