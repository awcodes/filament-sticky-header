const el = document.querySelector(".filament-main-topbar");
const observer = new IntersectionObserver(
    ([e]) => {
        if (e.isIntersecting) {
            document.querySelector(".filament-header").removeAttribute("stuck");
            document.querySelector(".filament-body").removeAttribute("stuck");
        } else {
            document
                .querySelector(".filament-header")
                .setAttribute("stuck", "true");
            document
                .querySelector(".filament-body")
                .setAttribute("stuck", "true");
        }
    },
    { threshold: [0] }
);

observer.observe(el);
