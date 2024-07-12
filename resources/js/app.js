import { createApp } from 'vue/dist/vue.esm-bundler.js';
import { createPinia } from 'pinia';
import { OhVueIcon, addIcons } from 'oh-vue-icons';
import {
    Menu,
    Navbar,
    SocialMedia,
    ProductSlide,
    HeaderPage,
    Footer,
    HomeIntro,
    HomeIntroProduct,
    HomeVideo,
    HomePost,
    HomePopup,
    HomeCurator,
    ProductList,
    ProductMarketplace,
    ProductDescTitle,
    ProductDescription,
    ProductPopup,
    ArticleSlide,
    ActivityList,
    ContactForm,
    Loading,
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
    FaCheckCircle,
    FaTimes,
    FaTimesCircle,
    FaShoppingCart,
} from 'oh-vue-icons/icons';
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
    FaCheckCircle,
    FaTimes,
    FaTimesCircle,
    FaShoppingCart,
);

const app = createApp({});
const pinia = createPinia();

app
    /** @register General Components */
    .component('MenuComponent', Menu)
    .component('NavbarComponent', Navbar)
    .component('SocialMediaComponent', SocialMedia)
    .component('ProductSlideComponent', ProductSlide)
    .component('HeaderPageComponent', HeaderPage)
    .component('FooterComponent', Footer)

    /** @register Home Components */
    .component('HomeIntroComponent', HomeIntro)
    .component('HomeIntroProductComponent', HomeIntroProduct)
    .component('HomeVideoComponent', HomeVideo)
    .component('HomePostComponent', HomePost)
    .component('HomePopupComponent', HomePopup)
    .component('HomeCuratorComponent', HomeCurator)

    /** @register Product Components */
    .component('ProductListComponent', ProductList)
    .component('ProductMarketplaceComponent', ProductMarketplace)
    .component('ProductDescTitleComponent', ProductDescTitle)
    .component('ProductDescriptionComponent', ProductDescription)
    .component('ProductPopupComponent', ProductPopup)

    /** @register Article Components */
    .component('ArticleSlideComponent', ArticleSlide)

    /** @register Activity Components */
    .component('ActivityListComponent', ActivityList)

    /** @register Contact Components */
    .component('ContactFormComponent', ContactForm)

    /** @register Icon Components */
    .component('LoadingComponent', Loading);

app.use(pinia);
app.component('v-icon', OhVueIcon);
app.mount('#app');
