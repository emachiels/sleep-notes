const sveltePreprocess = require('svelte-preprocess');
const sass = require('sass');

module.exports = {
    // Consult https://github.com/sveltejs/svelte-preprocess
    // for more information about preprocessors
    preprocess: sveltePreprocess({
        sass: {
            sync: true,
            implementation: sass,
        },
    })
}
