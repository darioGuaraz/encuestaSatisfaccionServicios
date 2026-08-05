// Reduce el header al hacer scroll
const header = document.querySelector("#siteHeader");
window.addEventListener("scroll", function () {
  header.classList.toggle("shrink", window.scrollY > 60);
});

// Autoajusta la altura del textarea al escribir
document.querySelectorAll("textarea").forEach((textarea) => {
  textarea.addEventListener("input", function () {
    this.style.height = "auto";
    this.style.height = `${this.scrollHeight}px`;
  });
});

// Muestra la calificación seleccionada en cada escala 1-10
document.querySelectorAll(".rating-value[data-target]").forEach((badge) => {
  const groupName = badge.dataset.target;
  const inputs = document.querySelectorAll(`input[name="${groupName}"]`);
  inputs.forEach((input) => {
    input.addEventListener("change", () => {
      badge.textContent = `${input.value}/10`;
    });
  });
});

// Año dinámico en el footer
const yearEl = document.querySelector("#year");
if (yearEl) {
  yearEl.textContent = new Date().getFullYear();
}
