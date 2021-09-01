let logo = document.getElementById("logo");
logo.addEventListener("dblclick", function () {
  let formOld = document.getElementById("login");
  if (formOld) {
    formOld.remove();
  }
  let body = document.getElementById("body");
  let form = document.createElement("form");
  // form.setAttribute('name', 'quit');
  form.setAttribute("action", "");
  form.setAttribute("accept-charset", "UTF-8");
  form.setAttribute("method", "POST");
  form.setAttribute("id", "login");
  let spanAuth = document.createElement("span");
  spanAuth.setAttribute("class", "auth");
  spanAuth.innerText = "Авторизація: Ім'я-";
  let inputLogin = document.createElement("input");
  inputLogin.setAttribute("type", "text");
  inputLogin.setAttribute("id", "login");
  inputLogin.setAttribute("name", "login");
  let spanPas = document.createElement("span");
  spanPas.setAttribute("class", "auth");
  spanPas.innerText = " Пароль-";
  let inputPass = document.createElement("input");
  inputPass.setAttribute("type", "password");
  inputPass.setAttribute("id", "pass");
  inputPass.setAttribute("name", "pass");
  // let spanError = document.createElement('span');
  let btn = document.createElement("input");
  btn.setAttribute("type", "submit");
  btn.setAttribute("id", "send");
  btn.setAttribute("name", "send");
  btn.setAttribute("value", "Увійти");

  body.prepend(form);
  form.append(spanAuth);
  spanAuth.append(inputLogin);
  spanAuth.append(spanPas);
  spanAuth.append(inputPass);
  spanAuth.append(btn);
});
