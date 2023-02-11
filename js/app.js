let modelsNike = [
  "Air max 90",
  "Air Max 95",
  "Air Max 200",
  "Air Max Plus",
  "Air force",
  "Vapor max",
];
let modelsYeezy = [
  "Yeezy BOOST 350",
  "Yeezy BOOST 700",
  "Yeezy BOOST 700 v3",
  "Yeezy FOAM Runner",
  "Yeezy 750 BOOST",
  "Yeezy 450",
  "Yeezy Boot Rock",
];
let modelsJordan = [
  "Jordan 4",
  "Jordan 1",
  "Jordan 3",
  "Jordan 11",
];
let sortedModelsNike = modelsNike.sort();
let sortedModelsYeezy = modelsYeezy.sort();
let sortedModelsJordan = modelsJordan.sort();


let input = document.getElementById("model");

function sortAlgoYeezy() {
  input.addEventListener("keyup", (e) => {
    removeElement();
    for (let i of sortedModelsYeezy) {
      if (i.toLowerCase().startsWith(input.value.toLowerCase()) && input.value != "") {
        let listItem = document.createElement("li");

        listItem.classList.add("list-group-item");
        listItem.style.cursor = "pointer";
        listItem.setAttribute("onclick", "displayModels('" + i + "')");

        let word = "<p>" + i.substr(0, input.value.lenght) + "</p>";
        // word += i.substr(input.value.lenght);
        listItem.innerHTML = word;
        document.querySelector(".list-group").appendChild(listItem);
      }
    }
  });
}

function sortAlgoNike() {
  input.addEventListener("keyup", (e) => {
    removeElement();
    for (let i of sortedModelsNike) {
      if (i.toLowerCase().startsWith(input.value.toLowerCase()) && input.value != "") {
        let listItem = document.createElement("li");

        listItem.classList.add("list-group-item");
        listItem.style.cursor = "pointer";
        listItem.setAttribute("onclick", "displayModels('" + i + "')");

        let word = "<p>" + i.substr(0, input.value.lenght) + "</p>";
        // word += i.substr(input.value.lenght);
        listItem.innerHTML = word;
        document.querySelector(".list-group").appendChild(listItem);
      }
    }
  });
}

function sortAlgoJordan() {
  input.addEventListener("keyup", (e) => {
    removeElement();
    for (let i of sortedModelsJordan) {
      if (i.toLowerCase().startsWith(input.value.toLowerCase()) && input.value != "") {
        let listItem = document.createElement("li");

        listItem.classList.add("list-group-item");
        listItem.style.cursor = "pointer";
        listItem.setAttribute("onclick", "displayModels('" + i + "')");

        let word = "<p>" + i.substr(0, input.value.lenght) + "</p>";
        // word += i.substr(input.value.lenght);
        listItem.innerHTML = word;
        document.querySelector(".list-group").appendChild(listItem);
      }
    }
  });
}

function displayModels(value) {
  input.value = value;
}

function removeElement() {
  let items = document.querySelectorAll(".list-group-item");

  items.forEach((item) => {
    item.remove();
  });
}

$('#ControlTXT').change(function (e) {
  var selected = $(e.currentTarget).val();
  $('#NikeTXT').hide();
  $('#JordanTXT').hide();
  $('#YeezyTXT').hide();
  switch (selected) {
    case "Nike":
      sortAlgoNike();
      $('#NikeTXT').show();
      break;
    case "Jordan":
      sortAlgoYeezy();
      $('#JordanTXT').show();
      break;
    case "Yeezy":
      sortAlgoJordan();
      $('#YeezyTXT').show();
      break;
    default:
      break;
  }
})