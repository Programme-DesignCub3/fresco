import { createApp } from 'vue/dist/vue.esm-bundler.js';
import { createPinia } from 'pinia';
import { Home, Product, Article, Activity, Gallery, Contact } from '@/pages/pages';
import { Menu, Navbar, SocialMedia, Footer, Introduction, ProductCoffee, VideoCoffee, Description, PostFeed } from '@/components/components';
import VueSplide from '@splidejs/vue-splide';
import '@splidejs/vue-splide/css';
import '@/misc/plugins';
import '@/bootstrap';

const app = createApp({});
const pinia = createPinia();

app
    /**
     * @import Pages
     */
    .component('Home', Home)
    .component('Product', Product)
    .component('Article', Article)
    .component('Activity', Activity)
    .component('Gallery', Gallery)
    .component('Contact', Contact)

    /**
     * @import Components
     */
    .component('Menu', Menu)
    .component('Navbar', Navbar)
    .component('SocialMedia', SocialMedia)
    .component('Footer', Footer)
    .component('Introduction', Introduction)
    .component('ProductCoffee', ProductCoffee)
    .component('VideoCoffee', VideoCoffee)
    .component('Description', Description)
    .component('PostFeed', PostFeed);

app.use(pinia).use(VueSplide);
app.mount('#app');
