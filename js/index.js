(function () {
  var img = document.getElementById('background'), opacity;
  var min = 0.15;
  
  function setBackgroundOpacity () {
    opacity = 1 - window.scrollY / (screen.height + 100);
    img.style.opacity = opacity > min ? opacity : min;
  }
  
  window.addEventListener('scroll', setBackgroundOpacity);
})();