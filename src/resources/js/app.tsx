import React from 'react';
import { createInertiaApp } from "@inertiajs/inertia-react";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import "../style/index.scss";
import { createRoot } from "react-dom/client";

createInertiaApp({
    resolve: (name) => resolvePageComponent(
        `./modules/${name}.tsx`,
        import.meta.glob('./modules/**/*.tsx')
    ),
    setup({ el, App, props }) {

        const root = createRoot(el);

        root.render(<App {...props} />);
    },
})
