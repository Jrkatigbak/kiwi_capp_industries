$(document).ready(function () {
  $(".navbar-nav a, .hero-buttons a, .btn-main, .btn-outline-main").on("click", function (event) {
    const href = $(this).attr("href");

    if (href && href.startsWith("#")) {
      const target = $(href);

      if (target.length) {
        event.preventDefault();

        $("html, body").stop(true).animate(
          {
            scrollTop: target.offset().top - 85
          },
          250
        );

        $(".navbar-collapse").collapse("hide");
      }
    }
  });

  $(window).on("scroll", function () {
    if ($(this).scrollTop() > 50) {
      $(".capp-navbar").addClass("navbar-scrolled");
    } else {
      $(".capp-navbar").removeClass("navbar-scrolled");
    }
  });
});