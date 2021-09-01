let birth = document.getElementById("birth");
let dayCurrent = birth.dataset.dayCurrent;
let monthCurrent = birth.dataset.monthCurrent;
let yearCurrent = birth.dataset.yearCurrent;
let mainTag = document.getElementById("main");
let wishes = document.getElementById("wishes");
let monthsH2 = [
  "Січні",
  "Лютому",
  "Березні",
  "Квітні",
  "Травні",
  "Червні",
  "Липні",
  "Серпні",
  "Вересні",
  "Жовтні",
  "Листопаді",
  "Грудні",
];

let url = "./json/contacts.json";
let urlWishes = "./json/wishes/";
var massive = [];

fetch(url)
  .then(function (response) {
    return response.json();
  })
  .then(function (arr) {
    // form an new array with date, month, year
    let mas = [];
    for (let i = 1; i < arr.length; i++) {
      let row = i - 1;
      mas[row] = [];
      let birthDay = arr[i][8].split(".");
      mas[row][0] = arr[i][1];
      mas[row][1] = arr[i][2];
      mas[row][2] = arr[i][3];
      mas[row][3] = birthDay[0];
      mas[row][4] = birthDay[1];
      mas[row][5] = birthDay[2];
    }
    massive = mas;
    return mas;
  })
  .then(function (ar) {
    // form an array if birthday people for the current month
    let masMonth = [];
    for (let i = 0, a = 0; i < ar.length; i++) {
      if (ar[i][4] == monthCurrent) {
        masMonth[a] = [];
        for (let j = 0; j < ar[i].length; j++) {
          masMonth[a][j] = ar[i][j];
        }
        a++;
      }
    }
    // form an names if birthday people for the current day
    let masDay = [];
    for (let i = 0, a = 0; i < masMonth.length; i++) {
      if (masMonth[i][3] == dayCurrent) {
        masDay[a] = [];
        for (let j = 0; j < 5; j++) {
          masDay[a][j] = masMonth[i][j + 1];
        }
        a++;
      }
    }
    if (masDay.length > 0) {
      if (masDay.length == 1) {
        let divCalendar2 = document.getElementById("calendar2");
        divCalendar2.style.display = "none";
        let divHeader = document.getElementById("headerBirth");
        let pHeader = document.createElement("p");
        pHeader.className = "header-p";
        pHeader.innerHTML = `З Днем народження, <span class="dayPeople">${masDay[0][0]} ${masDay[0][1]}</span>!!!`;
        divHeader.append(pHeader);
        // birth.append(divHeader);
      } else if (masDay.length > 1) {
        let divCalendar2 = document.getElementById("calendar2");
        divCalendar2.style.display = "none";
        let divHeader = document.getElementById("headerBirth");
        let pHeader = document.createElement("p");
        pHeader.className = "header-p";
        let names = "";
        for (let i = 0; i < masDay.length; i++) {
          if (i == masDay.length - 1) {
            names += ` та ${masDay[i][0]} ${masDay[i][1]}`;
          } else if (i == 0) {
            names += `${masDay[i][0]} ${masDay[i][1]}`;
          } else {
            names += `, ${masDay[i][0]} ${masDay[i][1]}`;
          }
        }
        pHeader.innerHTML = `З Днем народження, <span class="dayPeople">${names}</span>!!!`;
        divHeader.append(pHeader);
        // birth.append(divHeader);
      }
      // set number wish and background
      let numWish = String(
        Number(masDay[0][2]) +
          Number(masDay[0][3]) +
          Number(masDay[0][4]) +
          Number(dayCurrent)
      );
      // set new array from numWish
      let cArr = numWish.split("");
      let numW = Number(cArr[2] + cArr[3]);
      if (numW > 0 && numW <= 33) {
        numWish = String(numW);
      } else if (numW > 33 && numW <= 66) {
        numWish = String(numW - 33);
      } else if (numW > 66 && numW <= 99) {
        numWish = String(numW - 66);
      } else {
        numWish = "1";
      }
      mainTag.style.backgroundImage = `url('../img/hb/${numWish}.jpg')`;

      fetch(`${urlWishes}${numWish}.json`)
        .then(function (response) {
          return response.json();
        })
        .then(function (arrWishes) {
          wishes.style.display = "block";
          birth.style.backgroundImage = `url('../img/hb/fon.png')`;
          for (let i = 0; i < arrWishes.length; i++) {
            let pWishes = document.createElement("p");
            let br = document.createElement("br");
            if (i === 4) {
              wishes.appendChild(br);
              pWishes.innerHTML = `${arrWishes[i]}`;
            } else {
              pWishes.innerHTML = `${arrWishes[i]}`;
            }
            wishes.appendChild(pWishes);
            if (i === arrWishes.length - 1) {
              wishes.appendChild(br);
              let pText = document.createElement("p");
              pText.className = "rightText";
              pText.innerHTML = `<span>З повагою</span>`;
              wishes.appendChild(pText);
              let pText2 = document.createElement("p");
              pText2.className = "rightText";
              pText2.innerHTML = `<span>Колектив ХКВП</span>`;
              wishes.appendChild(pText2);
            }
          }
        });
    } else {
      let divHeader = document.getElementById("headerBirth");
      divHeader.style.display = "none";
    }
    // form an ul if birthday people for the current month
    if (masMonth.length > 0) {
      let h4 = document.createElement("h4");
      h4.id = "h4";
      h4.innerHTML = `У <span class="month">${
        monthsH2[Number(monthCurrent) - 1]
      }</span> святкують день народження:`;
      birth.appendChild(h4);
      masMonth.sort((a, b) => a[3] - b[3]);
      let divContainer = document.createElement("div");
      divContainer.className = "container";
      divContainer.id = "divContainer";
      let ul = document.createElement("ul");
      for (let i = 0; i < masMonth.length; i++) {
        let li = document.createElement("li");
        li.className = "item";
        let divPresent = document.createElement("div");
        divPresent.className = "present";
        divPresent.innerHTML = `\n<img src="img/gift.svg" alt="present" />\n`;
        let divName = document.createElement("div");
        divName.className = "name";
        divName.innerHTML = `\n<span class="dayBirth">${masMonth[i][3]}</span>.${masMonth[i][4]}.${masMonth[i][5]} <span class="nameBirth">${masMonth[i][0]} ${masMonth[i][1]} ${masMonth[i][2]}</span>\n`;
        li.append(divPresent);
        li.appendChild(divName);
        ul.appendChild(li);
        divContainer.appendChild(ul);
      }
      birth.appendChild(divContainer);
    } else {
      let h4 = document.createElement("h4");
      h4.innerHTML = `У <span class="month">${
        monthsH2[Number(monthCurrent) - 1]
      }</span> ніхто не святкує день народження.`;
      birth.appendChild(h4);
    }
    return masMonth;
  });
