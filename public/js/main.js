function showModal(button, model) {
  button.addEventListener("click", function (e) {
    if (model.style.display == "flex") {
      document.body.classList.remove("stopscroll");
      model.style.display = "none";
    } else {
      model.style.display = "flex";
      document.body.classList.add("stopscroll");
    }
  });
}

showModal(
  document.getElementById("popContact"),
  document.getElementById("overlay2")
);
showModal(
  document.querySelector("#closeX2"),
  document.getElementById("overlay2")
);

showModal(
  document.getElementById("popSetting"),
  document.getElementById("overlay")
);
showModal(
  document.getElementById("popFav"),
  document.getElementById("overlay1")
);

showModal(
  document.getElementById("popAdd"),
  document.getElementById("overlay3")
);


showModal(
  document.querySelector("#closeX"),
  document.getElementById("overlay")
);
showModal(
  document.querySelector("#closeX1"),
  document.getElementById("overlay1")
);

showModal(
  document.querySelector("#closeX3"),
  document.getElementById("overlay3")
);
