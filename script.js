// MENU MOBILE
const mobileMenuToggle = document.querySelector(".mobile-menu-toggle");
const mainNav = document.querySelector(".main-nav");

mobileMenuToggle.addEventListener("click", () => {
    mainNav.classList.toggle("active");
    mobileMenuToggle.classList.toggle("active");
});

// SLIDER HERO
const slides = document.querySelectorAll(".slide");
const prevButton = document.querySelector(".slider-arrow.prev");
const nextButton = document.querySelector(".slider-arrow.next");
const dotsContainer = document.querySelector(".slider-dots");
let currentIndex = 0;

function updateSlider(index) {
    slides.forEach((slide, i) => {
        slide.classList.toggle("active", i === index);
    });
    updateDots(index);
}

function nextSlide() {
    currentIndex = (currentIndex + 1) % slides.length;
    updateSlider(currentIndex);
}

function prevSlide() {
    currentIndex = (currentIndex - 1 + slides.length) % slides.length;
    updateSlider(currentIndex);
}

function updateDots(index) {
    document.querySelectorAll(".slider-dots .dot").forEach((dot, i) => {
        dot.classList.toggle("active", i === index);
    });
}

// Création des dots dynamiquement
slides.forEach((_, i) => {
    const dot = document.createElement("span");
    dot.classList.add("dot");
    if (i === 0) dot.classList.add("active");
    dot.addEventListener("click", () => {
        currentIndex = i;
        updateSlider(currentIndex);
    });
    dotsContainer.appendChild(dot);
});

nextButton.addEventListener("click", nextSlide);
prevButton.addEventListener("click", prevSlide);
setInterval(nextSlide, 5000); // Auto-slide toutes les 5 secondes

// AJOUTER AU PANIER
const cartCount = document.querySelector(".cart-count");
const addToCartButtons = document.querySelectorAll(".add-to-cart");
const cartModal = document.getElementById("cart-modal");
const cartItemsList = document.getElementById("cart-items");
const closeCartButton = document.getElementById("close-cart");
const cartLink = document.querySelector(".cart-link");
const cartTotalDisplay = document.getElementById("cart-total");

let cartItems = []; // Ex: [{ title: "Chaussures", price: 88, quantity: 2 }]

// Ajouter un produit au panier
addToCartButtons.forEach(button => {
    button.addEventListener("click", () => {
        const product = button.closest(".product");
        const title = product.querySelector("h3").textContent;
        const priceText = product.querySelector(".current-price").textContent.replace("€", "").replace(",", ".").trim();
        const price = parseFloat(priceText);

        const existingItem = cartItems.find(item => item.title === title);
        if (existingItem) {
            existingItem.quantity++;
        } else {
            cartItems.push({ title, price, quantity: 1 });
        }

        updateCartCount();
        showAddedMessage(button, `${title} ajouté au panier`);

    });
});

// Met à jour le nombre dans l'icône panier
function updateCartCount() {
    let totalQuantity = cartItems.reduce((sum, item) => sum + item.quantity, 0);
    cartCount.textContent = totalQuantity;
}

// Affiche le panier
cartLink.addEventListener("click", (e) => {
    e.preventDefault();
    updateCartDisplay();
    cartModal.style.display = "block";
});

// Ferme le panier
closeCartButton.addEventListener("click", () => {
    cartModal.style.display = "none";
});

// Met à jour l'affichage du panier
function updateCartDisplay() {
    cartItemsList.innerHTML = "";

    if (cartItems.length === 0) {
        cartItemsList.innerHTML = "<li>Votre panier est vide.</li>";
        cartTotalDisplay.textContent = "Total : 0,00 €";
        return;
    }

    cartItems.forEach((item, index) => {
        const li = document.createElement("li");

        const info = document.createElement("div");
        info.className = "item-info";
        info.innerHTML = `
            <span>${item.title}</span>
            <span>${item.quantity} × ${item.price.toFixed(2)} €</span>
        `;

        const removeBtn = document.createElement("button");
        removeBtn.className = "remove-btn";
        removeBtn.textContent = "Supprimer";
        removeBtn.addEventListener("click", () => {
            cartItems.splice(index, 1);
            updateCartDisplay();
            updateCartCount();
        });

        li.appendChild(info);
        li.appendChild(removeBtn);
        cartItemsList.appendChild(li);
    });

    const total = cartItems.reduce((sum, item) => sum + item.price * item.quantity, 0);
    cartTotalDisplay.textContent = `Total : ${total.toFixed(2).replace(".", ",")} €`;
}



// RECHERCHE DE PRODUITS
const searchInput = document.querySelector("#search");
const products = document.querySelectorAll(".product");

searchInput.addEventListener("input", () => {
    const searchValue = searchInput.value.toLowerCase();
    products.forEach(product => {
        const title = product.querySelector("h3").textContent.toLowerCase();
        product.style.display = title.includes(searchValue) ? "block" : "none";
    });
});

// FILTRAGE PAR CATÉGORIE
const filterButtons = document.querySelectorAll(".filter-btn");

filterButtons.forEach(button => {
    button.addEventListener("click", () => {
        const category = button.getAttribute("data-category");
        filterButtons.forEach(btn => btn.classList.remove("active"));
        button.classList.add("active");
        products.forEach(product => {
            product.style.display = category === "all" || product.dataset.category === category ? "block" : "none";
        });
    });
});

// WISHLIST ET QUICK VIEW
const wishlistButtons = document.querySelectorAll(".wishlist");
const quickViewButtons = document.querySelectorAll(".quick-view");

wishlistButtons.forEach(button => {
    button.addEventListener("click", () => {
        button.classList.toggle("active");
        alert("Produit ajouté aux favoris!");
    });
});

quickViewButtons.forEach(button => {
    button.addEventListener("click", () => {
        alert("Aperçu rapide du produit");
    });
});

function showAddedMessage(button, message) {
    let msg = document.createElement("span");
    msg.className = "added-message";
    msg.textContent = message;

    button.parentElement.appendChild(msg);

    setTimeout(() => {
        msg.remove();
    }, 2000);
}
