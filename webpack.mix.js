const mix = require("laravel-mix");

Mix.listen("configReady", (webpackConfig) => {
    if (Mix.isUsing("hmr")) {
        // Remove leading '/' from entry keys
        webpackConfig.entry = Object.keys(webpackConfig.entry).reduce(
            (entries, entry) => {
                entries[entry.replace(/^\//, "")] = webpackConfig.entry[entry];
                return entries;
            },
            {}
        );

        // Remove leading '/' from ExtractTextPlugin instances
        webpackConfig.plugins.forEach((plugin) => {
            if (plugin.constructor.name === "ExtractTextPlugin") {
                plugin.filename = plugin.filename.replace(/^\//, "");
            }
        });
    }
});

mix.js("resources/js/pages/login.js", "public/assets/js/")
    .vue()
    .js("resources/js/pages/postList.js", "public/assets/js/")
    .vue()
    .js("resources/js/pages/newPost.js", "public/assets/js/")
    .vue()
    .js("resources/js/layouts/sidebar.js", "public/assets/js/")
    .vue()
    .postCss("resources/css/app.css", "public/assets/css/app.css", [
        require("tailwindcss"),
    ]);

// https://laravel-mix.com/extensions/make-file-hash
if (mix.inProduction()) {
    mix.version();
    mix.then(() => {
        const convertToFileHash = require("laravel-mix-make-file-hash");
        convertToFileHash({
            publicPath: "public",
            manifestFilePath: "public/mix-manifest.json",
        });
    });
}
