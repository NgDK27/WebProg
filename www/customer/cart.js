const itemList = document.getElementById("item-list");
for (let i = 0; i < localStorage.length; i++) {
  const key = localStorage.key(i);
  var object = JSON.parse(localStorage.getItem(key));

  var ul = document.getElementById("item-list");
  const li = document.createElement("li");

  for (const field in object) {
    // var alo = document.createElement("h3");
    br = document.createElement("span");
    br.innerHTML = "<br/>";
    const data = object[field];
    console.log(data);
    li.append(data);
    li.appendChild(br);
    ul.appendChild(li);
    // const lichild = document.getItem("li");
    // console.log(lichild);
  }
}
