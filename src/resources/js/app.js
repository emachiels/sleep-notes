import { createInertiaApp } from "@inertiajs/inertia-svelte";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";

createInertiaApp({
    resolve: (name) => resolvePageComponent(
        `./modules/${name}.svelte`,
        import.meta.glob('./modules/**/*.svelte')
    ),
    setup({ el, App, props }) {
        new App({ target: el, props })
    },
})
