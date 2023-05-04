const filamentTopbar = document.querySelector(".filament-main-topbar");
const filamentMainContent = document.querySelector(".filament-main-content");
const filamentHeader = document.querySelector(".filament-header");

if (filamentTopbar && filamentMainContent && filamentHeader) {
  window.addEventListener("load", function () {
    const trigger = document.createElement("div");
    const theme = filamentData?.stickyHeaderTheme || 'default';
    const topBarSticky = filamentData?.stickyTopBar ?? true;
    trigger.classList.add("filament-sticky-trigger");
    filamentMainContent.prepend(trigger);

    filamentMainContent.classList.add(`sticky-theme-${theme}`);

    let offsetHeight = filamentTopbar.offsetHeight;

    if (!topBarSticky) {
      filamentTopbar.classList.remove('sticky');
      offsetHeight = 0;
    }

    let intersectingTime = null;

    const observer = new IntersectionObserver(
      ([e]) => {

        if (e.isIntersecting) {
          if (intersectingTime && (e.time - intersectingTime) < 1000) {
            return;
          }
          intersectingTime = e.time;
          filamentMainContent.classList.remove("is-sticky");
          return;
        }

        let offsetModifier = 0;

        if (theme === 'floating') {
          offsetModifier += 8;
        }

        filamentHeader.style.top = (offsetHeight + offsetModifier) + "px";
        filamentHeader.setAttribute("wire:ignore", "true");
        filamentMainContent.classList.add("is-sticky");
      },
      {
        rootMargin: `-${offsetHeight}px`,
        threshold: [0],
      }
    );

    observer.observe(trigger);
  });
}