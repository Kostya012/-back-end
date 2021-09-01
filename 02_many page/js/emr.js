let loader = document.getElementById("loader");
let info = document.getElementById("info");

let url = "./json/emr.json";

fetch(url)
  .then(function (response) {
    return response.json();
  })
  .then(function (arr) {
    let table = document.createElement("table");
    table.id = "info-table";
    table.className = "table";
    let thead = document.createElement("thead");
    let tbody = document.createElement("tbody");
    for (let i = 0; i < 1; i++) {
      let tr = document.createElement("tr");
      for (let j = 0; j < arr[i].length; j++) {
        let th = document.createElement("th");
        th.textContent = arr[i][j];
        tr.append(th);
        thead.append(tr);
        table.append(thead);
      }
      info.append(table);
    }
    for (let i = 1; i < arr.length; i++) {
      let tr = document.createElement("tr");
      for (let j = 0; j < arr[i].length; j++) {
        let td = document.createElement("td");
        td.textContent = arr[i][j];
        tr.append(td);
        tbody.append(tr);
        table.appendChild(tbody);
      }
      info.appendChild(table);
    }
    loader.style.display = "none";
    return arr;
  })
  .then(function (arr) {
    let mySearch = document.getElementById("mySearch");
    mySearch.addEventListener("input", function () {
      let infoTable = document.getElementById("info-table");
      var regPhrase = new RegExp(mySearch.value, "i");
      var flag = false;
      for (var i = 1; i < infoTable.rows.length; i++) {
        flag = false;
        for (var j = infoTable.rows[i].cells.length - 1; j >= 1; j--) {
          flag = regPhrase.test(infoTable.rows[i].cells[j].innerHTML);
          if (flag) break;
        }
        if (flag) {
          infoTable.rows[i].style.display = "";
        } else {
          infoTable.rows[i].style.display = "none";
        }
      }
    });
  });
