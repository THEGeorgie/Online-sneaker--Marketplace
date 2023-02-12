let models = [
  "Air max 90",
  "Air Max 95",
  "Air Max 200",
  "Air Max Plus",
  "Air force",
  "Vapor max",
  "Yeezy BOOST 350",
  "Yeezy BOOST 700",
  "Yeezy BOOST 700 v3",
  "Yeezy FOAM Runner",
  "Yeezy 750 BOOST",
  "Yeezy 450",
  "Yeezy Boot Rock",
  "Jordan 4",
  "Jordan 1",
  "Jordan 3",
  "Jordan 11",
];
let sortedModels = models.sort();

let input = document.getElementById("model");


  input.addEventListener("keyup", (e) => {
    removeElement();
    for (let i of sortedModels) {
      if (i.toLowerCase().startsWith(input.value.toLowerCase()) && input.value != "") {
        let listItem = document.createElement("li");

        listItem.classList.add("list-group-item");
        listItem.style.cursor = "pointer";
        listItem.setAttribute("onclick", "displayModels('" + i + "')");

        let word = "<p>" + i.substr(0, input.value.lenght) + "</p>";
        listItem.innerHTML = word;
        document.querySelector(".list-group").appendChild(listItem);
      }
    }
  });

function displayModels(value) {
  input.value = value;
  removeElement();
}

function removeElement() {
  let items = document.querySelectorAll(".list-group-item");

  items.forEach((item) => {
    item.remove();
  });
}


