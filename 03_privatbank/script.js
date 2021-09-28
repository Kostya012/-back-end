let selDate = document.getElementById("seldate"),
  prevCalen = document.getElementById("prevCalen"),
  nextCalen = document.getElementById("nextCalen");

selDate.value = `${chekDayOrMonth(new Date().getDate())}.${chekDayOrMonth(
  new Date().getMonth() + 1
)}.${new Date().getFullYear()}`;

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
function selectedDayAll(y) {
  let s = String(y);
  let dataS = gettingDate(s);
  let dataY = gettingYear(s);
  let dataM = gettingMonth(s);
  selDate.value = `${dataS}.${dataM}.${dataY}`;
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
  if (num < 10) {
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

Calendar2("calendar2", new Date().getFullYear(), new Date().getMonth());
// переключатель минус месяц
document.querySelector(
  "#calendar2 thead tr:nth-child(1) td:nth-child(1)"
).onclick = function () {
  Calendar2(
    "calendar2",
    document.querySelector("#calendar2 thead td:nth-child(2)").dataset.year,
    parseFloat(
      document.querySelector("#calendar2 thead td:nth-child(2)").dataset.month
    ) - 1
  );
  document.querySelector(
    "#calendar2 thead tr:nth-child(1) td:nth-child(1)"
  ).style.visibility = "hidden";
  document.querySelector(
    "#calendar2 thead tr:nth-child(1) td:nth-child(3)"
  ).style.visibility = "visible";
};
// переключатель плюс месяц
document.querySelector(
  "#calendar2 thead tr:nth-child(1) td:nth-child(3)"
).onclick = function () {
  Calendar2(
    "calendar2",
    document.querySelector("#calendar2 thead td:nth-child(2)").dataset.year,
    parseFloat(
      document.querySelector("#calendar2 thead td:nth-child(2)").dataset.month
    ) + 1
  );
  document.querySelector(
    "#calendar2 thead tr:nth-child(1) td:nth-child(1)"
  ).style.visibility = "visible";
  document.querySelector(
    "#calendar2 thead tr:nth-child(1) td:nth-child(3)"
  ).style.visibility = "hidden";
};
