const el = document.querySelector(".filament-main-topbar");

if (el) {
  window.addEventListener("load", function () {
    const observer = new IntersectionObserver(
      ([e]) => {
        if (e.isIntersecting) {
          document.querySelector(".filament-header").removeAttribute("stuck");
          document.querySelector(".filament-body").removeAttribute("stuck");
        } else {
          document.querySelector(".filament-header").setAttribute("stuck", "true");
          document.querySelector(".filament-body").setAttribute("stuck", "true");
        }
      },
      {
        root: null,
        rootMargin: `${el.offsetHeight * -1}px`,
        threshold: [0],
      }
    );

    observer.observe(el);
  });
}
