<script src="/src/js/plugins.js"></script>
<script src="/src/js/bootstrap/bootstrap.bundle.min.js" defer></script>
<script src="/src/js/main.js" defer></script>

<script src="/src/js/owl.carousel.min.js"></script>
<script type="text/javascript">
    $('.owl-indice').owlCarousel({
    loop: false,
    nav: false,
    dots: false,
    responsive: {
      0: {
        items: 1.3,
        margin: 32,
      },
      600: {
        items: 3,
        margin: 32,
      },
      900: {
        items: 3,
        margin: 32
      },
      1200: {
        items: 3,
        margin: 12
      },
      1400: {
        items: 3,
        margin: 20
      },
    }
  })
  
  $('.owl-plan').owlCarousel({
    loop: false,
    nav: false,
    dots: true,
    responsive: {
      0: {
        items: 1,
        margin: 16,
        center: true
      },
      600: {
        items: 2,
        margin: 16,
      },
      1000: {
        items: 4,
        margin: 16
      }
    }
  })
  
  $('.owl-espec').owlCarousel({
    loop: false,
    nav: true,
    dots: true,
    responsive: {
      0: {
        items: 1,
        center: true,
        margin: 0,
      },
      600: {
        items: 3
      },
      900: {
        items: 3,
        dots: false,
      }
    }
  })
</script>