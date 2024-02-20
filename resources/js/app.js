import { createApp } from 'vue/dist/vue.esm-bundler.js';
import { createPinia } from 'pinia';
import { OhVueIcon, addIcons } from 'oh-vue-icons';
import {
    Menu,
    Navbar,
    SocialMedia,
    ProductSlide,
    Description,
    HeaderPage,
    Footer,
    HomeIntro,
    HomeIntroProduct,
    HomeVideo,
    HomePost,
    ProductList,
    ProductMarketplace,
    ProductDescTitle,
    ArticleList,
    ArticleDetail,
    ArticleCard,
    ArticleSlide,
    ActivityList,
    ContactForm,
} from '@/components/components';
import {
    FaPhoneAlt,
    FaEnvelope,
    FaWhatsapp,
    FaLine,
    FaSearch,
    FaFacebookF,
    FaInstagram,
    FaTwitter,
    FaTiktok,
    FaYoutube,
    FaChevronLeft,
    FaChevronRight,
} from 'oh-vue-icons/icons';
import VueSplide from '@splidejs/vue-splide';
import '@splidejs/vue-splide/css';
import '@/misc/plugins';
import '@/bootstrap';

addIcons(
    FaPhoneAlt,
    FaEnvelope,
    FaWhatsapp,
    FaLine,
    FaSearch,
    FaFacebookF,
    FaInstagram,
    FaTwitter,
    FaTiktok,
    FaYoutube,
    FaChevronLeft,
    FaChevronRight,
);

const app = createApp({});
const pinia = createPinia();

app
    /** @register General Components */
    .component('MenuComponent', Menu)
    .component('NavbarComponent', Navbar)
    .component('SocialMediaComponent', SocialMedia)
    .component('ProductSlideComponent', ProductSlide)
    .component('DescriptionComponent', Description)
    .component('HeaderPageComponent', HeaderPage)
    .component('FooterComponent', Footer)

    /** @register Home Components */
    .component('HomeIntroComponent', HomeIntro)
    .component('HomeIntroProductComponent', HomeIntroProduct)
    .component('HomeVideoComponent', HomeVideo)
    .component('HomePostComponent', HomePost)

    /** @register Product Components */
    .component('ProductListComponent', ProductList)
    .component('ProductMarketplaceComponent', ProductMarketplace)
    .component('ProductDescTitleComponent', ProductDescTitle)

    /** @register Article Components */
    .component('ArticleListComponent', ArticleList)
    .component('ArticleDetailComponent', ArticleDetail)
    .component('ArticleCardComponent', ArticleCard)
    .component('ArticleSlideComponent', ArticleSlide)

    /** @register Activity Components */
    .component('ActivityListComponent', ActivityList)

    /** @register Contact Components */
    .component('ContactFormComponent', ContactForm);

app.use(pinia).use(VueSplide);
app.component('v-icon', OhVueIcon);
app.mount('#app');
