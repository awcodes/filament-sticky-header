const filamentTopbar = document.querySelector(".filament-main-topbar");
const filamentMainContent = document.querySelector(".filament-main-content");
const filamentHeader = document.querySelector(".filament-header");

if (filamentTopbar && filamentMainContent && filamentHeader) {
  window.addEventListener("load", function () {
    const trigger = document.createElement("div");
    trigger.classList.add("filament-sticky-trigger");
    filamentMainContent.prepend(trigger);

    const observer = new IntersectionObserver(
      ([e]) => {
        if (e.isIntersecting) {
          filamentMainContent.classList.remove("is-sticky");
          return;
        }

        filamentHeader.style.top = filamentTopbar.offsetHeight + "px";
        filamentHeader.setAttribute("wire:ignore", true);
        filamentMainContent.classList.add("is-sticky");
      },
      {
        rootMargin: `-${filamentTopbar.offsetHeight}px`,
        threshold: [0],
      }
    );

    observer.observe(trigger);
  });
}
