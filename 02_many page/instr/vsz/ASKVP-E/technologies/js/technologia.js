// Link 6

let link6 = document.getElementById("link6");
if (link6) {
  link6.addEventListener(
    "click",
    function() {
      let list6 = document.getElementById("list6");
      if (list6.style.opacity === "") {
        list6.style.transform = "rotateX(0deg)";
        list6.style.visibility = "visible";
        list6.style.opacity = "1";
        list6.style.maxHeight = "1100px";
      } else if (list6.style.opacity === "0") {
        list6.style.transform = "rotateX(0deg)";
        list6.style.visibility = "visible";
        list6.style.opacity = "1";
        list6.style.maxHeight = "1100px";
      } else {
        list6.style.transform = "rotateX(-90deg)";
        list6.style.visibility = "hidden";
        list6.style.opacity = "0";
        list6.style.maxHeight = "0";
      }
    },
    true
  );
}

// Link 9

let link9 = document.getElementById("link9");
if (link9) {
  link9.addEventListener(
    "click",
    function() {
      let list9 = document.getElementById("list9");
      if (list9.style.opacity === "") {
        list9.style.transform = "rotateX(0deg)";
        list9.style.visibility = "visible";
        list9.style.opacity = "1";
        list9.style.maxHeight = "1100px";
      } else if (list9.style.opacity === "0") {
        list9.style.transform = "rotateX(0deg)";
        list9.style.visibility = "visible";
        list9.style.opacity = "1";
        list9.style.maxHeight = "1100px";
      } else {
        list9.style.transform = "rotateX(-90deg)";
        list9.style.visibility = "hidden";
        list9.style.opacity = "0";
        list9.style.maxHeight = "0";
      }
    },
    true
  );
}

// Link 10

let link10 = document.getElementById("link10");
if (link10) {
  link10.addEventListener(
    "click",
    function() {
      let list10 = document.getElementById("list10");
      if (list10.style.opacity === "") {
        list10.style.transform = "rotateX(0deg)";
        list10.style.visibility = "visible";
        list10.style.opacity = "1";
        list10.style.maxHeight = "1100px";
      } else if (list10.style.opacity === "0") {
        list10.style.transform = "rotateX(0deg)";
        list10.style.visibility = "visible";
        list10.style.opacity = "1";
        list10.style.maxHeight = "1100px";
      } else {
        list10.style.transform = "rotateX(-90deg)";
        list10.style.visibility = "hidden";
        list10.style.opacity = "0";
        list10.style.maxHeight = "0";
      }
    },
    true
  );
}

createLink("link6", "list6");
createLink("link9", "list9");
createLink("link10", "list10");