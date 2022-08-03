let nav = document.querySelector("nav");
let menu = document.querySelector("#menu-icon");
let navbar = document.querySelector(".navbar");

window.addEventListener("scroll", () => {
  nav.classList.toggle("shadow", window.scrollY > 0);
});

menu.onclick = () => {
  menu.classList.toggle("bi-x");
  navbar.classList.toggle("active");
};
