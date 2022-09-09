const filamentTopbar = document.querySelector(".filament-main-topbar");
const filamentHeader = document.querySelector(".filament-header");
const filamentBody = document.querySelector(".filament-body");

if (filamentTopbar && filamentHeader && filamentBody) {
  window.addEventListener("load", function () {
    const observer = new IntersectionObserver(
      ([e]) => {
        if (e.isIntersecting) {
          filamentHeader.removeAttribute("stuck");
          filamentBody.removeAttribute("stuck");
        } else {
          filamentHeader.setAttribute("stuck", "true");
          filamentBody.setAttribute("stuck", "true");
        }
      },
      {
        root: null,
        rootMargin: `${filamentTopbar.offsetHeight * -1}px`,
        threshold: [0],
      }
    );

    observer.observe(filamentTopbar);
  });
}
