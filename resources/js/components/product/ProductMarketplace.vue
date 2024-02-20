<script setup></script>

<template>
    <div class="bg-fr-red py-20">
        <div class="fr-container mx-auto flex flex-col gap-y-8">
            <div id="marketplace-title-anchor">
                <div
                    class="text-shadow flex flex-col text-[60px] font-bold leading-none md:text-[80px]">
                    <span
                        data-aos="fade-right"
                        data-aos-delay="200"
                        data-aos-duration="500"
                        class="text-white"
                        >YUK SEGERA</span
                    >
                    <span
                        data-aos="fade-right"
                        data-aos-delay="400"
                        data-aos-duration="500"
                        class="text-fr-yellow"
                        >DAPATKAN KOPINYA</span
                    >
                </div>
                <div class="my-6 h-[4px] w-16 rounded-full bg-fr-yellow"></div>
            </div>
            <div class="flex space-x-5">
                <img
                    class="w-52"
                    src="/assets/images/icons/tokopedia.png"
                    alt="" />
                <img
                    class="w-52"
                    src="/assets/images/icons/shopee.png"
                    alt="" />
                <img
                    class="w-52"
                    src="/assets/images/icons/lazada.png"
                    alt="" />
            </div>
        </div>
    </div>
</template>

<style scoped>
.text-shadow {
    text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.7);
}
</style>
