const CartItems = document.querySelector(".cart-items");

let cartTotal = 0;
function displayCartItems() {
  const items = JSON.parse(localStorage.getItem("cart"));
  items.forEach((item) => {
    const cartItem = document.createElement("div");
    cartItem.className = "cart_item";
    cartItem.innerHTML = `
    <p class="cart_title">${item.title}</p>
    <img src="${item.image}" alt="${item.title}" class="cart_img" />
    <div class="quantity">
  <input type="number" min="1" max="9" step="1" value="1">
</div>
              <p class="cart_price">${item.price}</p>
              <p class="cart_delete">Delete</p>
    `;
    CartItems.appendChild(cartItem);
  });
}

displayCartItems();
const myInput = document.getElementById("my-input");
function stepper(btn) {
  let id = btn.getAttribute("id");
  let min = myInput.getAttribute("min");
  let max = myInput.getAttribute("max");
  let step = myInput.getAttribute("step");
  let val = myInput.getAttribute("value");
  let calcStep = id == "increment" ? step * 1 : step * -1;
  let newValue = parseInt(val) + calcStep;

  if (newValue >= min && newValue <= max) {
    myInput.setAttribute("value", newValue);
  }
}
