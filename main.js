var carousel = document.getElementById("carousel");
var items = carousel.getElementsByClassName("carousel-item");
var current = 0;

function next() {
  items[current].style.transform = "translateX(-100%)";
  current = (current + 1) % items.length;
  items[current].style.transform = "translateX(0)";
}

setInterval(next, 1000);
