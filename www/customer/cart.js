// Parsing and using data from local storage
for (let i = 0; i < localStorage.length; i++) {
  const id = localStorage.key(i);
  const currentObject = JSON.parse(localStorage.getItem(id));
  const quantity = currentObject["quantity"];
  console.log(quantity);

  // Display the cart

  const ul = document.getElementById("item-list");
  const li = document.createElement("li");
  hr = document.createElement("hr");
  li.appendChild(hr)

  for (const field in currentObject) {
    detail = document.createElement("h3");
    const data = currentObject[field];
    detail.append(data);
    li.append(detail);
    li.setAttribute("class", "product");
    ul.appendChild(li);
  }

  remove = document.createElement("button");
  removeButton = document.createElement("span");
  removeButton.setAttribute("class", "bi bi-trash");
  remove.setAttribute("class", "btn btn-light btn-lg");
  remove.appendChild(removeButton);
  remove.append(" Remove")
  li.appendChild(remove);

  // Add item to the form

  const cartForm = document.getElementById("cart-form");
  const newField = document.createElement("input");
  newField.setAttribute("type", "hidden");
  newField.setAttribute("name", id);
  newField.setAttribute("value", quantity);
  cartForm.appendChild(newField);
}

// Remove item from cart

removeBtn = document.querySelectorAll(".btn");
removeBtn.forEach((btn) => {
  btn.addEventListener("click", () => {
    let productRemove = btn.parentNode.parentNode;
    let idProductRemove =
      productRemove.getElementsByTagName("h3")[3].textContent;
    for (var i = 0, len = localStorage.length; i < len; ++i) {
      const id = localStorage.key(i);
      if (id.includes(idProductRemove)) {
        localStorage.removeItem(id);
        productRemove.remove();
        location.reload();
        return false;
      }
    }
  });
});

// Count total

let total = 0;

let productDetails = document.querySelectorAll(".product");

productDetails.forEach((detail) => {
  // let productPrice = productDetails.getElementsByTagName("h3")[4].textContent;
  let productPrice = Number(detail.children[3].textContent);
  total += productPrice;
});

const totalPrice = document.getElementById("total");
totalPrice.append(total);

// Count products
let totalItems = 0;

productDetails.forEach((detail) => {
  let productCount = Number(detail.children[2].textContent);
  totalItems += productCount;
});

const totalProducts = document.getElementById("totalItems");
totalProducts.append(totalItems);


// Clear the localstorage after finish order

const completeOrderButton = document.getElementById("complete-order");
completeOrderButton.addEventListener("click", () => {
  localStorage.clear();
  alert("Order succeed");
});
