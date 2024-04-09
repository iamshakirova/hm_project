$('.recent-trends').slick({
    dots: true,
    infinite: true,
    nextArrow: '<i class="fa-solid fa-arrow-right" aria-hidden="true"></i>',
    prevArrow: '<i class="fa-solid fa-arrow-left" aria-hidden="true"></i>',
    speed: 300,
    slidesToShow: 8,
    slidesToScroll: 8,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 2,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 350,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      }
    ]
  });

  