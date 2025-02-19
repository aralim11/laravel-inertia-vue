import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import './../../public/custom.css';
import { createApp, h } from 'vue';
import { createInertiaApp, Head, Link} from '@inertiajs/inertia-vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import Toaster from "@meforma/vue-toaster";
import { InertiaProgress } from '@inertiajs/progress';
import Layout from './Pages/Layouts/Layout.vue';
import i18n from "./i18n";

createInertiaApp({
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
        .component('Head', Head)
        .component('Link', Link)
        .component('Layout', Layout)
        .use(plugin)
        .use(Toaster)
        .use(i18n)
        .mount(el)
    },

    title: (title) => `AppFunBD - ${title}`,
});

InertiaProgress.init({
    color: "Blue",
});
