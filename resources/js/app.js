import '../css/app.css';
import './bootstrap.js'
import 'font-awesome/scss/font-awesome.scss'

import {createApp, h} from 'vue';
import {createInertiaApp, Head, Link} from '@inertiajs/vue3';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {ZiggyVue} from '../../vendor/tightenco/ziggy/dist/vue.m';
import {InertiaProgress} from "@inertiajs/progress";
import Layout from "@/Shared/Layout.vue";
import Toaster from '@meforma/vue-toaster';
import 'vue-tel-input/vue-tel-input.css';
import {VueTelInput} from "vue-tel-input";

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    resolve: (name) => {
        const page = resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        );
        page.then((module) => {
            if (module.default.layout === undefined) {
                module.default.layout = Layout;
            }
        });
        return page;
    },
    setup({el, App, props, plugin}) {
        return createApp({render: () => h(App, props)})
            .use(plugin)
            .component('Head', Head)
            .component('Link', Link)
            .component('vue-tel-input', VueTelInput)
            .use(ZiggyVue)
            .use(Toaster)
            .mount(el);
    },
    title: (title) => `My app - ${title}`,
    progress: {
        color: '#12dc2a',
        showSpinner: true
    },
});

InertiaProgress.init()
