const filamentTopbar = document.querySelector(".filament-main-topbar");
const filamentMain = document.querySelector(".filament-main");

if (filamentTopbar && filamentMain) {
  window.addEventListener("load", function () {
    const trigger = document.createElement("div");
    trigger.classList.add("filament-sticky-trigger");
    filamentTopbar.after(trigger);

    const observer = new IntersectionObserver(
      ([e]) => {
        if (e.isIntersecting) {
          filamentMain.classList.remove("is-sticky");
          return;
        }

        filamentMain.classList.add("is-sticky");
      },
      {
        threshold: [0],
      }
    );

    observer.observe(trigger);
  });
}
