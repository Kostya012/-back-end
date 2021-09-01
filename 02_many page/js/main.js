let link = document.getElementById("link");
if (link) {
  link.addEventListener(
    "click",
    function () {
      let list = document.getElementById("list");
      if (list.style.opacity === "") {
        list.style.transform = "rotateX(0deg)";
        list.style.visibility = "visible";
        list.style.opacity = "1";
        list.style.maxHeight = "1100px";
      } else if (list.style.opacity === "0") {
        list.style.transform = "rotateX(0deg)";
        list.style.visibility = "visible";
        list.style.opacity = "1";
        list.style.maxHeight = "1100px";
      } else {
        list.style.transform = "rotateX(-90deg)";
        list.style.visibility = "hidden";
        list.style.opacity = "0";
        list.style.maxHeight = "0";
      }
    },
    true
  );
}
