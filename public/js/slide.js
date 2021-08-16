// ********** slide js *******************
const sliderWrapper = document.querySelector(".slider-wrapper");
const sliderElements = document.querySelectorAll(".slider-element");


sliderWrapper.addEventListener("mouseenter", () => {
  sliderElements.forEach((sliderElement) => {
    sliderElement.classList.add("pause-animation");
  });
});

sliderWrapper.addEventListener("mouseleave", () => {
  sliderElements.forEach((sliderElement) => {
    sliderElement.classList.remove("pause-animation");
  });
});

sliderElements.forEach((sliderElement) => {
  sliderElement.addEventListener("animationend", () => {
    sliderElement.remove();
    sliderWrapper.appendChild(sliderElement);
  });
});

// **************** End slide js **********************