// Calculate products in cart and total price

const addToCartButton = document.getElementById("addToCart");
const productId = document.getElementById("id").textContent;
const productName = document.getElementById("itemName").textContent;
const productPrice = document.getElementById("itemPrice").textContent;
const productPic = productId.slice(0, 14);

addToCartButton.addEventListener("click", () => {
  const quantity = document.querySelector("#qty").value;
  if (localStorage.getItem(productId)) {
    var object = JSON.parse(localStorage.getItem(productId));
    object["quantity"] += Number(quantity);
    object["price"] = object["price"] * object["quantity"];
    localStorage.setItem(productId, JSON.stringify(object));
    alert("Your item has been added to cart");
  } else {
    let updatedQuantity =
      Number(localStorage.getItem(productId)) + Number(quantity);
    var object = {
      name: productName,
      quantity: updatedQuantity,
      price: productPrice * updatedQuantity,
    };
    localStorage.setItem(productId, JSON.stringify(object));
    alert("Your item has been added to cart");
  }
});
