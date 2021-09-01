// let loader = document.getElementById("loader");

let info = document.getElementById("info");
let map = document.getElementById("map");
let numRoom = document.getElementById("numRoom");
let result = document.getElementById("result");

let ulmain = document.getElementById("ulmain");
let li1 = document.getElementById("li1");
let li2 = document.getElementById("li2");

let floor1 = {
  101: { x: 473, y: 1408 },
  "101а": { x: 473, y: 1283 },
  102: { x: 473, y: 1193 },
  "102а": { x: 473, y: 1081 },
  103: { x: 473, y: 947 },
  104: { x: 473, y: 800 },
  105: { x: 473, y: 674 },
  106: { x: 705, y: 400 },
  107: { x: 830, y: 400 },
  108: { x: 935, y: 400 },
  109: { x: 1017, y: 400 },
  110: { x: 1110, y: 400 },
  "127 Дорпрофсож": { x: 477, y: 2758 },
  "127 ДН-2": { x: 1025, y: 1632 },
  "128 ДН-2": { x: 1130, y: 1632 },
  "128 Дорпрофсож": { x: 477, y: 2909 },
};

let floor2 = {
  201: { x: 1320, y: 1688 },
  202: { x: 1320, y: 1503 },
  203: { x: 1320, y: 1425 },
  204: { x: 1320, y: 1247 },
  205: { x: 1320, y: 1031 },
  206: { x: 1320, y: 801 },
  "206а": { x: 1320, y: 945 },
  207: { x: 1320, y: 550 },
};

let floor3 = {
  301: { x: 1282, y: 1497 },
  302: { x: 1282, y: 1412 },
  303: { x: 1282, y: 1302 },
  304: { x: 1282, y: 1200 },
  305: { x: 1282, y: 1102 },
  306: { x: 1282, y: 993 },
  307: { x: 1282, y: 922 },
  308: { x: 1282, y: 830 },
};

let floor4 = {
  401: { x: 1300, y: 1522 },
  402: { x: 1300, y: 1415 },
  404: { x: 1300, y: 1235 },
  405: { x: 1300, y: 1015 },
  406: { x: 1300, y: 930 },
  407: { x: 1300, y: 828 },
  408: { x: 1300, y: 735 },
  "409а": { x: 1300, y: 375 },
  "409б": { x: 1411, y: 375 },
  "472 НФЕ": { x: 2610, y: 2080 },
  "472 НВСЗ": { x: 1123, y: 1630 },
  "473 НФЕ": { x: 2610, y: 1997 },
  "473 НВСЗ": { x: 1020, y: 1630 },
};

let floor5 = {
  502: { x: 1311, y: 1500 },
  503: { x: 1311, y: 1258 },
  506: { x: 1311, y: 967 },
  507: { x: 1311, y: 841 },
  508: { x: 1311, y: 747 },
  510: { x: 1304, y: 400 },
  511: { x: 1027, y: 400 },
  "511а": { x: 831, y: 400 },
};

let floor6 = {
  601: { x: 415, y: 1591 },
  602: { x: 415, y: 1684 },
  "604а": { x: 415, y: 1768 },
  604: { x: 415, y: 1938 },
  605: { x: 763, y: 1904 },
};

function execute(x, y, room) {
  result.innerText = "";
  result.style.display = "none";
  numRoom.style.display = "inline-block";
  numRoom.innerText = room;
  numRoom.style.marginLeft = `${x}px`;
  numRoom.style.marginTop = `${y}px`;
  let coordY = numRoom.getBoundingClientRect().top - window.pageYOffset - 200;
  let coordX = numRoom.getBoundingClientRect().left - window.pageYOffset - 200;

  window.scrollBy(0, coordY);
  info.scrollBy(coordX, 0);
}

function executeClick() {
  mySearch.value = this.innerText;
  executeSearch();
  ulmain.style.display = "none";
}

function executeNotFound() {
  numRoom.style.display = "none";
  ulmain.style.display = "none";
  result.style.display = "";
  result.innerText = "Не має даного кабінета.";
}

function checkFirstRoom(room) {
  if (room[0] == 1) {
    let urlString = "./img/floors/floor-1.jpg";
    map.style.backgroundImage = "url('" + urlString + "')";
    map.style.height = "3726px";
  } else if (room[0] == 2) {
    let urlString = "./img/floors/floor-2.jpg";
    map.style.backgroundImage = "url('" + urlString + "')";
    map.style.height = "3684px";
  } else if (room[0] == 3) {
    let urlString = "./img/floors/floor-3.jpg";
    map.style.backgroundImage = "url('" + urlString + "')";
    map.style.height = "3726px";
  } else if (room[0] == 4) {
    let urlString = "./img/floors/floor-4.jpg";
    map.style.backgroundImage = "url('" + urlString + "')";
    map.style.height = "3768px";
  } else if (room[0] == 5) {
    let urlString = "./img/floors/floor-5.jpg";
    map.style.backgroundImage = "url('" + urlString + "')";
    map.style.height = "3744px";
  } else if (room[0] == 6) {
    let urlString = "./img/floors/floor-6.jpg";
    map.style.backgroundImage = "url('" + urlString + "')";
    map.style.height = "3665px";
  } else {
    executeNotFound();
  }
}

function executeSearch() {
  let room = mySearch.value;
  if (room == "") {
    numRoom.style.display = "none";
    result.style.display = "none";
  } else if (room.length === 1) {
    checkFirstRoom(room);
  } else if (room.length === 3) {
    checkFirstRoom(room);
    if (room == 127) {
      li1.innerText = "127 Дорпрофсож";
      li2.innerText = "127 ДН-2";
      li1.addEventListener("click", executeClick.bind(li1));
      li2.addEventListener("click", executeClick.bind(li2));
      ulmain.style.display = "block";
    } else if (room == 128) {
      li1.innerText = "128 ДН-2";
      li2.innerText = "128 Дорпрофсож";
      li1.addEventListener("click", executeClick.bind(li1));
      li2.addEventListener("click", executeClick.bind(li2));
      ulmain.style.display = "block";
    } else if (room == 472) {
      li1.innerText = "472 НФЕ";
      li2.innerText = "472 НВСЗ";
      li1.addEventListener("click", executeClick.bind(li1));
      li2.addEventListener("click", executeClick.bind(li2));
      ulmain.style.display = "block";
    } else if (room == 473) {
      li1.innerText = "473 НФЕ";
      li2.innerText = "473 НВСЗ";
      li1.addEventListener("click", executeClick.bind(li1));
      li2.addEventListener("click", executeClick.bind(li2));
      ulmain.style.display = "block";
    } else if (room[0] == 1 && floor1[`${room}`]) {
      execute(floor1[`${room}`].x, floor1[`${room}`].y, room);
    } else if (room[0] == 2 && floor2[`${room}`]) {
      execute(floor2[`${room}`].x, floor2[`${room}`].y, room);
    } else if (room[0] == 3 && floor3[`${room}`]) {
      execute(floor3[`${room}`].x, floor3[`${room}`].y, room);
    } else if (room[0] == 4 && floor4[`${room}`]) {
      execute(floor4[`${room}`].x, floor4[`${room}`].y, room);
    } else if (room[0] == 5 && floor5[`${room}`]) {
      execute(floor5[`${room}`].x, floor5[`${room}`].y, room);
    } else if (room[0] == 6 && floor6[`${room}`]) {
      execute(floor6[`${room}`].x, floor6[`${room}`].y, room);
    } else {
      executeNotFound();
    }
  } else if (room.length > 3) {
    checkFirstRoom(room);
    if (room[0] == 1 && floor1[`${room}`]) {
      execute(floor1[`${room}`].x, floor1[`${room}`].y, room);
    } else if (room[0] == 2 && floor2[`${room}`]) {
      execute(floor2[`${room}`].x, floor2[`${room}`].y, room);
    } else if (room[0] == 3 && floor3[`${room}`]) {
      execute(floor3[`${room}`].x, floor3[`${room}`].y, room);
    } else if (room[0] == 4 && floor4[`${room}`]) {
      execute(floor4[`${room}`].x, floor4[`${room}`].y, room);
    } else if (room[0] == 5 && floor5[`${room}`]) {
      execute(floor5[`${room}`].x, floor5[`${room}`].y, room);
    } else if (room[0] == 6 && floor6[`${room}`]) {
      execute(floor6[`${room}`].x, floor6[`${room}`].y, room);
    } else {
      executeNotFound();
    }
  } else {
    executeNotFound();
  }
}

let mySearch = document.getElementById("search");
mySearch.addEventListener("input", function () {
  let scroller = setTimeout(function () {
    executeSearch();
  }, 10);
});
