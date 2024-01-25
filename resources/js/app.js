import { createApp } from 'vue/dist/vue.esm-bundler.js';
import { createPinia } from 'pinia';
import {
    Menu,
    Navbar,
    SocialMedia,
    Footer,
    Introduction,
    ProductCoffee,
    VideoCoffee,
    Description,
    PostFeed,
    DescBackground,
    IntroProduct
} from '@/components/components';
import VueSplide from '@splidejs/vue-splide';
import '@splidejs/vue-splide/css';
import '@/misc/plugins';
import '@/bootstrap';

const app = createApp({});
const pinia = createPinia();

app
    /**
     * @import Components
     */
    .component('MenuComponent', Menu)
    .component('NavbarComponent', Navbar)
    .component('SocialMediaComponent', SocialMedia)
    .component('FooterComponent', Footer)
    .component('IntroductionComponent', Introduction)
    .component('ProductCoffeeComponent', ProductCoffee)
    .component('VideoCoffeeComponent', VideoCoffee)
    .component('DescriptionComponent', Description)
    .component('PostFeedComponent', PostFeed)
    .component('DescBackgroundComponent', DescBackground)
    .component('IntroProductComponent', IntroProduct);

app.use(pinia).use(VueSplide);
app.mount('#app');
