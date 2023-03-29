data_area = document.querySelector('.products');
total_price = document.querySelector('.total-price');

function removeArticle(product_id) {
    fetch('/datas/shopping-cart.json')
        .then((response) => response.json())
        .then((json) => {
            data = json;

            data = data.products;
            
            for (i = 0; i < data.length; i++) {
                if (data[i].id == product_id) {
                    delete data[i].price;
                    console.log(data[i]);
                }
            }
        })
        .catch((error) => console.log(error));
}

function displayProductList() {
    fetch('/datas/shopping-cart.json')
        .then((response) => response.json())
        .then((json) => {
            data = json;
            data = data.products;
            total_price.innerHTML += data.reduce((acc, product) => acc + product.price * product.quantity, 0) + ' €';

            for (i = 0; i < data.length; i++) {
                product = data[i];
                data_area.innerHTML += `
                <div class="product">
                    <div class="product-image">
                        <img src="${product.image}" alt="${product.name}">
                    </div>
                    <div class="product-info">
                        <h2>${product.name}</h2>
                        <p>${product.description}</p>
                    </div>
                    <div class="product-price">
                        <h3>Prix : ${product.price} €</h3>
                    </div>
                    <div class="product-quantity">
                        <h3>Quantité : ${product.quantity}</h3>
                    </div>
                    <div class="product-remove">
                        <button onclick="removeArticle(${product.id})" class="remove-article">Remove</button>
                    </div>
                </div>
                `;
            };
        })
        .catch((error) => console.log(error));
    }
displayProductList();