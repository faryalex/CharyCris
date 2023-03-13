<?php include("../Template/cabecera.php"); ?>
		<title>Tienda</title>
		<link rel="stylesheet" href="../Style/style_productos.css" />
	</head>
	<body>
		<header>
			<h1>Tienda</h1>

			<div class="container-icon">
				<div class="container-cart-icon">
				<svg
					xmlns="http://www.w3.org/2000/svg"
					fill="none"
					viewBox="0 0 24 24"
					stroke-width="1.5"
					stroke="currentColor"
					class="icon-cart"
				>
					<path
						stroke-linecap="round"
						stroke-linejoin="round"
						d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"
					/>
				</svg>
				<div class="count-products">
					<span id="contador-productos">0</span>
				</div>
			</div>

				<div class="container-cart-products hidden-cart">
					<div class="row-product">
					<div class="cart-product">
						<div class="info-cart-product">
                            <span class="cantidad-producto-carrito">1</span>
                            <p class="titulo-producto-carrito">Chocolate</p>
                            <span class="precio-producto-carrito">$1</span>
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
					</div>
				</div>
                    <div class="cart-total">
                        <h3>Total:</h3>
                        <span class="total-pagar">$200</span>
						<button class="btn_pagar">Pagar</button>
                    </div>
					
				</div>
			</div>
			
		</header>
		<div class="container-items">
			<div class="item">
				<figure>
					<img
						src="../media/vasogela.png"
						alt="producto"
					/>
				</figure>
				<div class="info-product">
					<h2>vaso gelatinero chcocolate</h2>
					<p class="price">$0.50</p>
					<button class ="btn-add-cart">Añadir al carrito</button>
				</div>
			</div>
			<div class="item">
				<figure>
					<img
						src="../media/vaso1.png"
						alt="producto"
					/>
				</figure>
				<div class="info-product">
					<h2>vaso de chocolate grande</h2>
					<p class="price">$1.00</p>
					<button  class="btn-add-cart">Añadir al carrito</button>
				</div>
			</div>
			<div class="item">
				<figure>
					<img
						src="../media/tarrina.png"
						alt="producto"
					/>
				</figure>
				<div class="info-product">
					<h2>Tarrina medio litro chocolate</h2>
					<p class="price">$2.50</p>
					<button class="btn-add-cart">Añadir al carrito</button>
				</div>
			</div>
			<div class="item">
				<figure>
					<img
						src="../media/sasasasasasasa.png"
						alt="producto"
					/>
				</figure>
				<div class="info-product">
					<h2>Tableta de chococolate amargo</h2>
					<p class="price">$4</p>
					<button class= "btn-add-cart">Añadir al carrito</button>
				</div>
			</div>
			<div class="item">
				<figure>
					<img
						src="../media/chcocodulce.png"
						alt="producto"
					/>
				</figure>
				<div class="info-product">
					<h2>Barra de chcocolate dulce</h2>
					<p class="price">$2.00</p>
					<button class="btn-add-cart">Añadir al carrito</button>
				</div>
			</div>
			<div class="item">
				<figure>
					<img
						src="../media/chcocoforma.png"
						alt="producto"
					/>
				</figure>
				<div class="info-product">
					<h2>caja de chcocolates en forma</h2>
					<p class="price">$1.50</p>
					<button class="btn-add-cart">Añadir al carrito</button>
				</div>
			</div>
			<div class="item">
				<figure>
					<img
						src="../media/chcocolateenforma.png"
						alt="producto"
					/>
				</figure>
				<div class="info-product">
					<h2>Caja de chocolate en forma</h2>
					<p class="price">1.50</p>
					<button class="btn-add-cart">Añadir al carrito</button>
				</div>
			</div>
			<div class="item">
				<figure>
					<img
						src="../media/chcoco.png"
						alt="producto"
					/>
				</figure>
				<div class="info-product">
					<h2>PChocolate3</h2>
					<p class="price">$5</p>
					<button class="btn-add-cart">Añadir al carrito</button>
				</div>
			</div>
			<div class="item">
				<figure>
					<img
						src="../media/chcocopol.png"
						alt="producto"
					/>
				</figure>
				<div class="info-product">
					<h2>PChocolate3</h2>
					<p class="price">$5</p>
					<button class="btn-add-cart">Añadir al carrito</button>
				</div>
			</div>
		</div>
		
        <script type="module" src="../js/productos.js"></script>
		
		

	</body>
</html>