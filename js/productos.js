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

productlist.addEventListener('click', e => {

    $.ajax({
        url: 'Configuraciones/verificar-sesion.php',
        dataType: 'text',
        success: function (response) {
            if (response == 'ok') {

                if (e.target.classList.contains('btn-add-cart')) {
                    console.log("holaaa boton");
                    const product = e.target.parentElement

                    const infoProduct = {
                        quantity: 1,
                        title: product.querySelector(' h2').textContent,
                        price: product.querySelector(' p').textContent,
                    }
                    infoProduct.title = ` - ${infoProduct.title}`;
                    const exits = allProducts.some(product => product.title === infoProduct.title)
                    if (exits) {
                        const products = allProducts.map(product => {
                            if (product.title === infoProduct.title) {
                                product.quantity++;
                                return product;
                            } else {
                                return product;
                            }
                        })
                        allProducts = [...products]
                    } else {


                        allProducts = [...allProducts, infoProduct]
                    }
                    showHTML();
                }
            } else {
                Swal.fire({
                    title: '',
                    text: 'Debes Iniciar Sesion ',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Iniciar Sesion',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "./login.php";
                    } else if (result.dismiss === Swal.DismissReason.cancel) {

                    }
                });
            }
        }
    })
})
rowProduct.addEventListener('click', (e) => {
    if (e.target.classList.contains('icon-close')) {
        const product = e.target.parentElement
        const title = product.querySelector('p').textContent

        allProducts = allProducts.filter(product => product.title !== title)
    };
    showHTML();
});

const showHTML = () => {
    rowProduct.innerHTML = '';
    let total = 0;
    let totalOfProducts = 0;

    allProducts.forEach(product => {
        const containerProduct = document.createElement('div')
        containerProduct.classList.add('cart-product')

        containerProduct.innerHTML = ` 
        <div class="info-cart-product">
                                <span class="cantidad-producto-carrito">${product.quantity}  </span>
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

const btn_pagar = document.querySelector('.cart-total');
btn_pagar.addEventListener('click', (e) => {
    console.log("hola desde js");

    $.ajax({
        url: 'Configuraciones/verificar-sesion.php',
        dataType: 'text',
        success: function (response) {
            if (response == 'ok') {
                Swal.fire({
                    title: 'Proceso de Compra.',
                    text: 'Estimado cliente por el momento no disponemos de un pago en línea, si realiza su pedido, un asesor se pondrá en contacto vía Whatsapp para coordinar el pago y entrega del pedido. ¿Deseas realizar el pedido?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Continuar',
                    cancelButtonText: 'Cancelar',
                    allowOutsideClick: false,
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log(allProducts);
                        let jsonData = JSON.stringify(allProducts);
                        fetch('Ventanas/enviar.php', {
                            method: 'POST',
                            body: jsonData
                        })
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Error en la solicitud');
                                } else {
                                    Swal.fire({
                                        title: 'Éxito',
                                        text: 'Pedido realizado con éxito, en unos instantes un asesor se comunicará contigo',
                                        icon: 'success',
                                        confirmButtonText: 'Cerrar',
                                        allowOutsideClick: false,
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = "./index.php";
                                        }
                                    });
                                }
                                return response.json();
                            })
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                    }
                });
            } else {
                Swal.fire({
                    title: '',
                    text: 'Debes Iniciar Sesión ',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Iniciar Sesión',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "./login.php";
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                    }
                });
            }
        }
    });
    return false;
});
