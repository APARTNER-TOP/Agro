import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

import { viteStaticCopy } from "vite-plugin-static-copy";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/css/map.css",
                "resources/js/map.js",
            ],
            refresh: true,
        }),

        viteStaticCopy({
            targets: [
                {
                    src: "resources/img",
                    dest: "../", // 2️⃣
                    // 		src: path.resolve(__dirname, './lib') + '/[!.]*', // 1️⃣
                    // 		dest: './', // 2️⃣
                },
                // {
                // 	src: 'resource/img',
                // 	dest: '../',
                // },
            ],
        }),
    ],
});
