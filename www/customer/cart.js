for (let i = 0; i < localStorage.length; i++) {
  const key = localStorage.key(i);
  var object = JSON.parse(localStorage.getItem(key));

  var ul = document.getElementById("item-list");
  const li = document.createElement("li");

  for (const field in object) {
    detail = document.createElement("h3");
    const data = object[field];
    li.append(detail);
    detail.append(data);
    ul.appendChild(li);
  }
}
