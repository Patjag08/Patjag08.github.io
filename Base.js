window.onload = function() {
  let slideIndex = 0;

  function showSlides() {
    const slides = document.getElementsByClassName("slide");
    if (slides.length === 0) {
      console.warn("No slides found");
      return;
    }

    for (let i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) { slideIndex = 1 }
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 5000); // In milliseconds so 3000 = 3 seconds
  }

  showSlides();
}