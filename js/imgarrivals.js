$('.arrivals-section').slick({
  dots: true,
  infinite: true,
  nextArrow: '<i class="fa-solid fa-arrow-right" aria-hidden="true"></i>',
  prevArrow: '<i class="fa-solid fa-arrow-left" aria-hidden="true"></i>',
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});