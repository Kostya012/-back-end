let article = document.getElementById("article");
let currentPage = document.getElementById("currentPage");
let loader = document.getElementById("loader");
let content2 = document.getElementById("content2");

let url1 = "./uz/telephons_UZ.htm";
let url2 = "./pz/telephons_PZ.htm";
let url3 = "./gioc/telephons_GIOC.htm";
let url4 = "./vphk/telephons_VPHK.htm";

let link1 = document.getElementById("link1");
let link2 = document.getElementById("link2");
let link3 = document.getElementById("link3");
let link4 = document.getElementById("link4");

function getOtherPage(url) {
  fetch(url)
    .then(function(response) {
      // The API call was successful!
      return response.text();
    })
    .then(function(html) {
      // Convert the HTML string into a document object
      var parser = new DOMParser();
      var doc = parser.parseFromString(html, "text/html");
      var body = doc.querySelector("body");
      let div = document.createElement("div");

      let mas = body.children;

      for (let i = 0; i < mas.length; i++) {
        div.appendChild(mas[i]);
      }
      content2.appendChild(div);
      loader.style.display = "none";
    })
    .catch(function(err) {
      // There was an error
      console.warn("Something went wrong.", err);
    });
}

function updateURL(url) {
  if (history.pushState) {
    var baseUrl = window.location.protocol + "//" + window.location.host; // + window.location.pathname;
    var newUrl = baseUrl + url;
    history.pushState(null, null, newUrl);
  } else {
    console.warn("History API не поддерживает ваш браузер");
  }
}

if (link1) {
  link1.addEventListener(
    "click",
    function() {
      if (!link1.classList.contains("active-li")) {
        updateURL("/telephons/_telephons_UZ.php");
        link1.classList.add("active-li");
        article.innerText = "Телефони Укрзалізниці";
        currentPage.innerText = "/Телефони Укрзалізниці";
        currentPage.removeAttribute("href");
        currentPage.setAttribute("href", "_telephons_UZ.php");
      }
      if (link2.classList.contains("active-li"))
        link2.classList.remove("active-li");
      if (link3.classList.contains("active-li"))
        link3.classList.remove("active-li");
      if (link4.classList.contains("active-li"))
        link4.classList.remove("active-li");

      loader.style.display = "";
      content2.innerText = "";
      getOtherPage(url1);
    },
    true
  );
}

if (link2) {
  link2.addEventListener(
    "click",
    function() {
      if (!link2.classList.contains("active-li")) {
        updateURL("/telephons/_telephons_PZ.php");
        link2.classList.add("active-li");
        article.innerText = "Телефони Південної залізниці";
        currentPage.innerText = "/Телефони Південної залізниці";
        currentPage.removeAttribute("href");
        currentPage.setAttribute("href", "_telephons_PZ.php");
      }
      if (link1.classList.contains("active-li"))
        link1.classList.remove("active-li");
      if (link3.classList.contains("active-li"))
        link3.classList.remove("active-li");
      if (link4.classList.contains("active-li"))
        link4.classList.remove("active-li");
      loader.style.display = "";
      content2.innerText = "";
      getOtherPage(url2);
    },
    true
  );
}
if (link3) {
  link3.addEventListener(
    "click",
    function() {
      if (!link3.classList.contains("active-li")) {
        updateURL("/telephons/_telephons_GIOC.php");
        link3.classList.add("active-li");
        article.innerText = "Телефони ГІОЦ";
        currentPage.innerText = "/Телефони ГІОЦ";
        currentPage.removeAttribute("href");
        currentPage.setAttribute("href", "_telephons_GIOC.php");
      }
      if (link2.classList.contains("active-li"))
        link2.classList.remove("active-li");
      if (link1.classList.contains("active-li"))
        link1.classList.remove("active-li");
      if (link4.classList.contains("active-li"))
        link4.classList.remove("active-li");
      loader.style.display = "";
      content2.innerText = "";
      getOtherPage(url3);
    },
    true
  );
}
if (link4) {
  link4.addEventListener(
    "click",
    function() {
      if (!link4.classList.contains("active-li")) {
        updateURL("/telephons/_telephons_VPHK.php");
        link4.classList.add("active-li");
        article.innerText = "Телефони ГІОЦ ВП ХК";
        currentPage.innerText = "/Телефони ГІОЦ ВП ХК";
        currentPage.removeAttribute("href");
        currentPage.setAttribute("href", "_telephons_VPHK.php");
      }
      if (link2.classList.contains("active-li"))
        link2.classList.remove("active-li");
      if (link3.classList.contains("active-li"))
        link3.classList.remove("active-li");
      if (link1.classList.contains("active-li"))
        link1.classList.remove("active-li");
      loader.style.display = "";
      content2.innerText = "";
      getOtherPage(url4);
    },
    true
  );
}