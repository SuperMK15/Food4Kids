const el = document.querySelector(".index-page-parallax");
/*var container = document.querySelector(".index-page-parallax");
var mover = document.querySelector(".index-page-parallax");*/

el.addEventListener("mousemove", (e) => {
  el.style.backgroundPositionX = -e.offsetX/10 + "px";
  el.style.backgroundPositionY = -e.offsetY/10 + "px";
});

/*container.addEventListener("mousemove", function(e) {
  mover.style.backgroundPositionX = -e.offsetX/10 + "px";
  mover.style.backgroundPositionY = -e.offsetY/10+ "px";
});

container.addEventListener("mouseenter", function() {
  
  setTimeout(function() {
    mover.classList.add("no-more-slidey");
    container.removeEventListener("mouseenter");
  }, 250);
  
});*/