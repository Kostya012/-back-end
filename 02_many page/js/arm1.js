let loader = document.getElementById("loader");

let info = document.getElementById("info");
let h2 = document.getElementById("h2");

let urls = [
  "./json/arm/sl.json",
  "./json/arm/hkvp.json",
  "./json/arm/hkmpd.json",
  "./json/arm/hkpp.json",
  "./json/arm/hkrd.json",
  "./json/arm/hkst.json",
  "./json/arm/hkfs.json",
  "./json/arm/hkter.json",
];

let requests = urls.map((url) => fetch(url));

Promise.all(requests)
  .then((responses) => Promise.all(responses.map((r) => r.json())))
  .then((arr) => {
    // add first h2
    h2.innerText = arr[0][0][0];
    // make thead for first table
    let table1 = document.createElement("table");
    table1.id = "tableHead";
    table1.className = "table";
    let thead1 = document.createElement("thead");
    for (let i = 0; i < 1; i++) {
      let tr = document.createElement("tr");
      for (let j = 0; j < arr[0][i + 1].length; j++) {
        let th = document.createElement("th");
        th.textContent = arr[0][i + 1][j];
        tr.append(th);
        thead1.append(tr);
        table1.append(thead1);
      }
      info.append(table1);
    }

    let table = document.createElement("table");
    table.id = "sl";
    table.className = "table";
    let tbody = document.createElement("tbody");
    // make tbody for first table
    for (let i = 2; i < arr[0].length; i++) {
      let tr = document.createElement("tr");
      for (let j = 0; j < arr[0][i].length; j++) {
        let td = document.createElement("td");
        td.textContent = arr[0][i][j];
        tr.append(td);
        tbody.append(tr);
        table.appendChild(tbody);
      }
      info.appendChild(table);
    }

    function makeTables(nameId, rowArr, pId) {
      let p = document.createElement("p");
      p.id = pId;
      p.className = "p2-title";
      p.innerText = arr[rowArr][0][0];
      info.appendChild(p);
      let table = document.createElement("table");
      table.id = nameId;
      table.className = "table";
      let tbody = document.createElement("tbody");
      for (let i = 1; i < arr[rowArr].length; i++) {
        let tr = document.createElement("tr");
        for (let j = 0; j < arr[rowArr][i].length; j++) {
          let td = document.createElement("td");
          td.textContent = arr[rowArr][i][j];
          tr.append(td);
          tbody.append(tr);
          table.appendChild(tbody);
        }
        info.appendChild(table);
      }
    }
    for (a = 1; a < arr.length; a++) {
      if ((a = 1)) makeTables("hkvp", a, "p_hkvp");
      if ((a = 2)) makeTables("hkmpd", a, "p_hkmpd");
      if ((a = 3)) makeTables("hkpp", a, "p_hkpp");
      if ((a = 4)) makeTables("hkrd", a, "p_hkrd");
      if ((a = 5)) makeTables("hkst", a, "p_hkst");
      if ((a = 6)) makeTables("hkfs", a, "p_hkfs");
      if ((a = 7)) makeTables("hkter", a, "p_hkter");
    }
    let mySearch = document.getElementById("mySearch");
    mySearch.addEventListener("input", function () {
      let sl = document.getElementById("sl");
      let hkvp = document.getElementById("hkvp");
      let p_hkvp = document.getElementById("p_hkvp");
      let hkmpd = document.getElementById("hkmpd");
      let p_hkmpd = document.getElementById("p_hkmpd");
      let hkpp = document.getElementById("hkpp");
      let p_hkpp = document.getElementById("p_hkpp");
      let hkrd = document.getElementById("hkrd");
      let p_hkrd = document.getElementById("p_hkrd");
      let hkst = document.getElementById("hkst");
      let p_hkst = document.getElementById("p_hkst");
      let hkfs = document.getElementById("hkfs");
      let p_hkfs = document.getElementById("p_hkfs");
      let hkter = document.getElementById("hkter");
      let p_hkter = document.getElementById("p_hkter");
      var regPhrase = new RegExp(mySearch.value, "i");

      function searchToTable(nameIdTable, pId = null) {
        var flag = false;
        let pflag = false;
        for (var i = 0; i < nameIdTable.rows.length; i++) {
          flag = false;
          for (var j = nameIdTable.rows[i].cells.length - 1; j >= 1; j--) {
            flag = regPhrase.test(nameIdTable.rows[i].cells[j].innerHTML);
            if (flag) {
              pflag = true;
              break;
            }
          }
          if (flag) {
            if (pId == null) {
              nameIdTable.rows[i].style.display = "";
            } else {
              nameIdTable.rows[i].style.display = "";
              pId.style.display = "";
            }
          } else if (pflag == true && flag == false) {
            nameIdTable.rows[i].style.display = "none";
          } else {
            if (pId == null) {
              nameIdTable.rows[i].style.display = "none";
            } else {
              nameIdTable.rows[i].style.display = "none";
              pId.style.display = "none";
            }
          }
        }
      }
      searchToTable(sl);
      searchToTable(hkvp, p_hkvp);
      searchToTable(hkmpd, p_hkmpd);
      searchToTable(hkpp, p_hkpp);
      searchToTable(hkrd, p_hkrd);
      searchToTable(hkst, p_hkst);
      searchToTable(hkfs, p_hkfs);
      searchToTable(hkter, p_hkter);
    });
    loader.style.display = "none";
    return arr;
  });
