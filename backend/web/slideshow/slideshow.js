$(document).ready(function () {
  var initSlideshow;
  var slidePosition = 0;

  var slideshow = $("#slideshow-container");
  var slidesCollection = $("#slides-collection");
  var positionIndicators = $("#position-indicators");
  var nextBtn = $("#next-btn");
  var prevBtn = $("#prev-btn");

  setSlidesCollection();
  repeater();

  nextBtn.on("click", nextSlide);
  prevBtn.on("click", previousSlide);

  slideshow.on("mouseover", pause);
  slideshow.on("mouseout", restore);

  function setImages(imgs){
    var images = imgs;
  }

  function setSlidesCollection() {
    images.images.forEach(function (image, index) {
      var singleSlide;
      var indicator;
      if (index === 0) {
        singleSlide = createSlide(image.url, 'image', true);
        indicator = createIndicator(true);
      } else {
        singleSlide = createSlide(image.url, 'image', false);
        indicator = createIndicator(false);
      }
      slidesCollection.append(singleSlide);
      positionIndicators.append(indicator);
    });
  }

  function createSlide(imgSrc, imgAlt, startingPoint) {
    var slideContainer;
    if (startingPoint) {
      slideContainer = $("<div></div>").attr("class", "slide active");
    } else {
      slideContainer = $("<div></div>").attr("class", "slide");
    }
    var img = $("<img></img>").attr({
      src: imgSrc,
      alt: imgAlt,
    });
    slideContainer.append(img);
    return slideContainer;
  }

  function createIndicator(startingPoint) {
    var indicator;
    if (startingPoint) {
      indicator = $("<div></div>").attr("class", "slide-indicators active");
    } else {
      indicator = $("<div></div>").attr("class", "slide-indicators");
    }
    return indicator;
  }

  function nextSlide() {
    var allSlides = $(".slide");
    var allIndicators = $(".slide-indicators");
    allSlides.removeClass("active");
    allIndicators.removeClass("active");
    slidePosition++;
    if (slidePosition > allSlides.length - 1) {
      slidePosition = 0;
    }
    allSlides.eq(slidePosition).addClass("active");
    allIndicators.eq(slidePosition).addClass("active");
  }

  function previousSlide() {
    var allSlides = $(".slide");
    var allIndicators = $(".slide-indicators");
    allSlides.removeClass("active");
    allIndicators.removeClass("active");
    slidePosition--;
    if (slidePosition < 0) {
      slidePosition = allSlides.length - 1;
    }
    allSlides.eq(slidePosition).addClass("active");
    allIndicators.eq(slidePosition).addClass("active");
  }

  function repeater() {
    var allSlides = $(".slide");
    var allIndicators = $(".slide-indicators");

    initSlideshow = setInterval(function () {
      allSlides.removeClass("active");
      allIndicators.removeClass("active");
      slidePosition++;
      if (slidePosition > allSlides.length - 1) {
        slidePosition = 0;
      }
      allSlides.eq(slidePosition).addClass("active");
      allIndicators.eq(slidePosition).addClass("active");
    }, 4000);
  }

  function pause() {
    clearInterval(initSlideshow);
  }

  function restore() {
    repeater();
  }
});
