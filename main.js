window.addEventListener("scroll", function () {
  const header = document.querySelector("header");
  const scrollPosition = window.scrollY;

  // Cambia el valor 100 según cuando quieras que el header se reduzca
  if (scrollPosition > 100) {
    header.classList.add("shrink");
  } else {
    header.classList.remove("shrink");
  }
});

document.querySelectorAll("textarea").forEach((textarea) => {
  textarea.addEventListener("input", function () {
    this.style.height = "auto"; /* Resetea la altura para recalcularla */
    this.style.height = `${this.scrollHeight}px`; /* Ajusta la altura según el contenido */
  });
});
