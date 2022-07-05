const mix = require("laravel-mix");

mix.disableSuccessNotifications();

mix.setPublicPath("./resources/dist")
    .postCss(
        "./resources/css/filament-sticky-header.css",
        "filament-sticky-header.css",
        [require("tailwindcss")("./tailwind.config.js")]
    )
    .js("./resources/js/filament-sticky-header.js", "filament-sticky-header.js")
    .options({
        processCssUrls: false,
    })
    .version();
