let click = document.querySelectorAll(".Q-p");

click.forEach((item) => {
  item.addEventListener("click", (e) => {
    if (e.target.nextElementSibling.style.display === "none") {
      e.target.nextElementSibling.style.display = "block";
      e.target.firstElementChild.style.transform = "rotate(180deg)";
    } else {
      e.target.nextElementSibling.style.display = "none";
      e.target.firstElementChild.style.transform = "rotate(0deg)";
    }
  });
});
