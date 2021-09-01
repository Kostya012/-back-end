let prevCalen = document.getElementById("prevCalen"),
  nextCalen = document.getElementById("nextCalen");

let yesterday = new Date(+yearCurrent, +monthCurrent - 1, +dayCurrent - 1);
let today = new Date(+yearCurrent, +monthCurrent - 1, +dayCurrent);

function listBirthday(month) {
  let masMonth = [];
  for (let i = 0, a = 0; i < massive.length; i++) {
    if (massive[i][4] == month) {
      masMonth[a] = [];
      for (let j = 0; j < massive[i].length; j++) {
        masMonth[a][j] = massive[i][j];
      }
      a++;
    }
  }
  // form an ul if birthday people for the current month
  if (masMonth.length > 0) {
    let h4 = document.getElementById("h4");
    h4.innerHTML = `У <span class="month">${
      monthsH2[Number(month) - 1]
    }</span> святкують день народження:`;
    masMonth.sort((a, b) => a[3] - b[3]);
    let divContainer = document.getElementById("divContainer");
    divContainer.innerText = "";
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
  } else {
    let h4 = document.getElementById("h4");
    h4.innerHTML = `У <span class="month">${
      monthsH2[Number(month) - 1]
    }</span> ніхто не святкує день народження.`;
    let divContainer = document.getElementById("divContainer");
    divContainer.innerText = "";
  }
  prevCalen.style.display = "";
  nextCalen.style.display = "";
}

function Calendar2(id, year, month) {
  var Dlast = new Date(year, month + 1, 0).getDate(),
    D = new Date(year, month, Dlast),
    DNlast = new Date(D.getFullYear(), D.getMonth(), Dlast).getDay(),
    DNfirst = new Date(D.getFullYear(), D.getMonth(), 1).getDay(),
    curMonth1 = month,
    calendar = "<tr>",
    month = [
      "Січень/Январь",
      "Лютий/Февраль",
      "Березень/Март",
      "Квітень/Апрель",
      "Травень/Май",
      "Червень/Июнь",
      "Липень/Июль",
      "Серпень/Август",
      "Вересень/Сентябрь",
      "Жовтень/Октябрь",
      "Листопад/Ноябрь",
      "Грудень/Декабрь",
    ];
  if (DNfirst != 0) {
    for (var i = 1; i < DNfirst; i++) calendar += "<td>";
  } else {
    for (var i = 0; i < 6; i++) calendar += "<td>";
  }
  for (var i = 1; i <= Dlast; i++) {
    let curYear = D.getFullYear(),
      curMonth = chekDayOrMonth(D.getMonth() + 1),
      curDay = chekDayOrMonth(i);
    if (
      i == new Date().getDate() &&
      D.getFullYear() == new Date().getFullYear() &&
      D.getMonth() == new Date().getMonth()
    ) {
      calendar += `<td class="today">${i}`;
    } else if (
      (curMonth1 < new Date().getMonth() &&
        new Date(year, curMonth1, i) <
          new Date(
            new Date().getFullYear(),
            new Date().getMonth(),
            new Date().getDate() - Dlast
          )) ||
      (curMonth1 == new Date().getMonth() && i > new Date().getDate())
    ) {
      calendar += `<td class="outside">` + i;
    } else {
      calendar += `<td class="limonth" onClick=selectedDayAll(${curYear}_${curMonth}_${curDay})><b>${i}</b>`;
    }
    if (new Date(D.getFullYear(), D.getMonth(), i).getDay() == 0) {
      calendar += "<tr>";
    }
  }
  for (var i = DNlast; i < 7; i++) calendar += "<td>&nbsp;";
  document.querySelector("#" + id + " tbody").innerHTML = calendar;
  document.querySelector("#" + id + " thead td:nth-child(2)").innerHTML =
    month[D.getMonth()] + " " + D.getFullYear();
  document.querySelector("#" + id + " thead td:nth-child(2)").dataset.month =
    D.getMonth();
  document.querySelector("#" + id + " thead td:nth-child(2)").dataset.year =
    D.getFullYear();
  if (document.querySelectorAll("#" + id + " tbody tr").length < 6) {
    // чтобы при перелистывании месяцев не "подпрыгивала" вся страница, добавляется ряд пустых клеток. Итог: всегда 6 строк для цифр
    document.querySelector("#" + id + " tbody").innerHTML +=
      "<tr><td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;";
  }
}

function selectedDay() {
  let d = String;
  let m = String;
  if (new Date().getDate() < 10) {
    d = `0${new Date().getDate()}`;
  } else {
    d = new Date().getDate();
  }
  if (new Date().getMonth() + 1 < 10) {
    m = `0${new Date().getMonth() + 1}`;
  } else {
    m = new Date().getMonth() + 1;
  }
}

function selectedDayAll(y) {
  let s = String(y);
  let dataS = gettingDate(s);
  let dataY = gettingYear(s);
  let dataM = gettingMonth(s);
}

function gettingDate(d) {
  return d.substring(d.length - 2);
}

function gettingMonth(m) {
  return m.substring(6, 4);
}

function gettingYear(y) {
  return y.substring(0, 4);
}

function chekDayOrMonth(num) {
  if (num < 10 && num > 0) {
    return `0${num}`;
  } else {
    return num;
  }
}

function chekMonth(m) {
  if (m == new Date().getMonth) {
    return true;
  } else {
    return false;
  }
}

Calendar2("calendar2", today.getFullYear(), today.getMonth());
// переключатель минус месяц
document.querySelector(
  "#calendar2 thead tr:nth-child(1) td:nth-child(1)"
).onclick = function () {
  prevCalen.style.display = "none";
  Calendar2(
    "calendar2",
    document.querySelector("#calendar2 thead td:nth-child(2)").dataset.year,
    parseFloat(
      document.querySelector("#calendar2 thead td:nth-child(2)").dataset.month
    ) - 1
  );
  listBirthday(
    chekDayOrMonth(
      parseFloat(
        document.querySelector("#calendar2 thead td:nth-child(2)").dataset.month
      ) + 1
    )
  );
};
// переключатель плюс месяц
document.querySelector(
  "#calendar2 thead tr:nth-child(1) td:nth-child(3)"
).onclick = function () {
  nextCalen.style.display = "none";
  Calendar2(
    "calendar2",
    document.querySelector("#calendar2 thead td:nth-child(2)").dataset.year,
    parseFloat(
      document.querySelector("#calendar2 thead td:nth-child(2)").dataset.month
    ) + 1
  );
  listBirthday(
    chekDayOrMonth(
      parseFloat(
        document.querySelector("#calendar2 thead td:nth-child(2)").dataset.month
      ) + 1
    )
  );
};
