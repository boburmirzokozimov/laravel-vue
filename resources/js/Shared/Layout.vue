<script setup>
import {Head, usePage} from "@inertiajs/vue3";
import Header from "@/Components/Header/Header.vue";
import SideBar from "@/Components/SideBar/SideBar.vue";
import {createToaster} from "@meforma/vue-toaster";

const page = usePage();
const toaster = createToaster({ /* options */});
</script>

<template>
    <Head>
        <title>My app</title>
        <meta content="Information"
              head-key="description"
              type="description"
        >
    </Head>

    <section class="p-4 bg-white  ">
        <Header/>
    </section>
    <aside>
        <SideBar/>
    </aside>
    <section class="w-[1500px] 2xl:max-w-7xl xl:max-w-6xl lg:max-w-4xl mx-auto p-6 text-center">
        <div class="">
            <slot/>
        </div>
    </section>

</template>

<style lang="scss">
.header-left {
    @apply flex items-center relative;
    transition: 1s ease all;
}

.popup {
    transform: translateY(85%);
    @apply absolute py-4 px-2 bg-white shadow rounded-xl;
    transition: 6s ease all;
    width: 200px;
}
</style>
