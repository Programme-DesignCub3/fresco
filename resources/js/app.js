import { createApp } from 'vue/dist/vue.esm-bundler.js';
import { createPinia } from 'pinia';
import { Menu, Navbar, SocialMedia, ProductSlide, HeaderPage, Footer, HomeIntro, HomeIntroProduct, HomeVideo, HomePost, HomePopup, ProductList, ProductMarketplace, ProductDescription, ProductPopup, ArticleSlide, ActivityList, ContactForm, Loading } from '@/components/components';
import '@/misc/plugins';
import '@/bootstrap';

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

    /** @register Product Components */
    .component('ProductListComponent', ProductList)
    .component('ProductMarketplaceComponent', ProductMarketplace)
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
app.mount('#app');
