import './bootstrap';

// Bootstrap CSS
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

// Custom CSS
import '../css/app.css';

// Tabler Theme Import
import '@tabler/core/dist/js/tabler.min.js';

// Maska
import { vMaska } from 'maska';

// Vue Toast
import useToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

// V Select
import vSelect from 'vue-select';
import "vue-select/dist/vue-select.css";




// Sweet Alert
import VueSweetalert2 from 'vue-sweetalert2';

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./pages/**/*.vue', { eager: true })
        return pages[`./pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(VueSweetalert2)
            .use(useToast)
            .directive("maska", vMaska)
            .component('v-select', vSelect)
            .mixin({ data: () => ({ app_url: Ziggy.url, bootstrap }) })
            .mixin({ methods: { route } })
            .mount(el)
    },
});
