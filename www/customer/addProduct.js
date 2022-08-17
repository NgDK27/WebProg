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
    localStorage.setItem(productId, JSON.stringify(object));
  } else {
    let updatedQuantity =
      Number(localStorage.getItem(productId)) + Number(quantity);
    var object = {
      name: productName,
      quantity: updatedQuantity,
      price: productPrice,
      pic: productPic,
    };
    localStorage.setItem(productId, JSON.stringify(object));
  }
});
