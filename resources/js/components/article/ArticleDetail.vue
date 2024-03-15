<script setup>
import { useThemeStore } from '@/stores/user-theme.js';

const themeStore = useThemeStore();
</script>

<template>
    <div
        class="bg-cover bg-top bg-no-repeat py-0 sm:py-10 md:py-20"
        :class="
            themeStore.theme == 'black' ? 'bg-black bg-article' : 'bg-fr-yellow'
        ">
        <div
            class="fr-container relative mx-auto transition-all duration-700 ease-in-out lg:h-[150vh] lg:pb-[17%]"
            :class="themeStore.theme == 'black' ? 'bg-fr-yellow' : 'bg-fr-red'">
            <!-- Image -->
            <div class="p-4 lg:p-0">
                <img
                    class="w-full rounded-xl"
                    src="/assets/images/article-1.png"
                    alt="FresCo" />
            </div>

            <div
                class="w-full space-y-4 bg-white px-4 py-10 lg:absolute lg:bottom-0 lg:right-0 lg:w-3/4">
                <article>
                    <!-- Title -->
                    <h1 class="text-xl font-bold">
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Nesciunt aut labore sed in, laborum distinctio at
                        ut? Itaque, voluptatem ab.
                    </h1>

                    <!-- Content -->
                    <div class="article-wrapper">
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing
                            elit. Tempore doloribus, quibusdam consequuntur
                            similique earum sequi optio cum neque exercitationem
                            veritatis dolorem eum ab. Voluptas voluptatum natus
                            quo ex esse similique aliquid ab vero. Eum saepe
                            necessitatibus, illo voluptatem nemo iusto in maxime
                            culpa, eos laboriosam obcaecati explicabo dolor quos
                            tenetur quia quod voluptates ullam cumque qui
                            pariatur delectus rem omnis voluptatibus ipsam?
                            Placeat mollitia voluptate, esse omnis neque
                            necessitatibus, maiores laboriosam similique
                            possimus rerum beatae. Perspiciatis distinctio
                            itaque ducimus molestiae neque aliquid cumque
                            pariatur, consequatur eveniet incidunt, repellendus
                            expedita numquam possimus praesentium amet eos
                            veniam eum obcaecati assumenda dolores rerum
                            doloribus exercitationem. Quam reprehenderit nam
                            magni! Magnam explicabo deleniti corrupti
                            distinctio, quae reprehenderit architecto,
                            reiciendis expedita, illo blanditiis aliquam
                            incidunt consectetur quos molestias sequi modi et
                            dolorem impedit quisquam alias velit! Voluptates
                            doloribus possimus consectetur itaque quo autem,
                            iusto assumenda, quidem facilis perferendis, at sit?
                            Officia voluptatum atque velit voluptate quasi!
                            Blanditiis pariatur, aperiam doloribus et suscipit
                            facere, delectus necessitatibus, possimus impedit
                            repellendus aliquam tenetur. Magnam quae et aperiam
                            ratione repellat, mollitia saepe, quibusdam eaque
                            minus assumenda provident dolorem eius doloribus,
                            hic tempora illum? Est, fuga, accusamus
                            reprehenderit quos excepturi architecto fugiat, vero
                            suscipit blanditiis perferendis ipsa veniam sint
                            eius.
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </div>
</template>
