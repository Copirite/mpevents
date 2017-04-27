jQuery(document).ready(function($) {
  $('[data-event-posters]').slick({
    dots: false,
    slidesToShow: 4,
    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>'
  });
});
