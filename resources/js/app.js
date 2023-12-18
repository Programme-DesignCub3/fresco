import { createApp } from 'vue/dist/vue.esm-bundler.js';
import { createPinia } from 'pinia';
import VueSplide from '@splidejs/vue-splide';
import '@splidejs/vue-splide/css';
import './plugins';
import './bootstrap';
// Pages
import Home from '@/pages/Home.vue';
import Product from '@/pages/Product.vue';
import Article from '@/pages/Article.vue';
import Activity from '@/pages/Activity.vue';
import Gallery from '@/pages/Gallery.vue';
import Contact from '@/pages/Contact.vue';
// Component
import Menu from '@/Menu.vue';
import Navbar from '@/components/Navbar.vue';
import SocialMedia from '@/components/SocialMedia.vue';
import Footer from '@/components/Footer.vue';
import Introduction from '@/components/Introduction.vue';
import ProductCoffee from '@/components/ProductCoffee.vue';
import VideoCoffee from '@/components/VideoCoffee.vue';
import Description from '@/components/Description.vue';
import PostFeed from '@/components/PostFeed.vue';

const app = createApp({});
const pinia = createPinia();

app.component('Home', Home)
    .component('Product', Product)
    .component('Article', Article)
    .component('Activity', Activity)
    .component('Gallery', Gallery)
    .component('Contact', Contact)
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
