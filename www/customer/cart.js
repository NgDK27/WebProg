// Parsing and using data from local storage
for (let i = 0; i < localStorage.length; i++) {
  const id = localStorage.key(i);
  const currentObject = JSON.parse(localStorage.getItem(id));
  const quantity = currentObject['quantity'];
  console.log(quantity);
  
  // Display the cart

  const ul = document.getElementById("item-list");
  const li = document.createElement("li");

  for (const field in currentObject) {
    detail = document.createElement("h3");
    const data = currentObject[field];
    detail.append(data);
    li.append(detail);
    ul.appendChild(li);
  }

  removeButton = document.createElement("span");
  removeButton.setAttribute('class', 'remove-button');
  removeButton.append("Remove");
  li.appendChild(removeButton);

  // Add item to the form

  const cartForm = document.getElementById('cart-form');
  const newField = document.createElement('input');
  newField.setAttribute('type', 'hidden');
  newField.setAttribute('name', id);
  newField.setAttribute('value', quantity);
  cartForm.appendChild(newField);
}

// Clear the localstorage after finish order
const completeOrderButton = document.getElementById('complete-order');
completeOrderButton.addEventListener('click', () => {
  localStorage.clear();
})

