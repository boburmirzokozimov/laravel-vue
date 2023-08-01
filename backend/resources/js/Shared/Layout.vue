<script setup>
import Nav from "@/Components/Nav.vue";
import {Head} from "@inertiajs/vue3";
</script>

<template>
    <Head>
        <title>My app</title>
        <meta content="Information"
              head-key="description"
              type="description"
        >
    </Head>

    <section class="p-6 bg-gray-200 ">
        <header class="flex items-center justify-between max-w-7xl mx-auto">
            <div class="flex items-center">
                <h1 class="font-bold text-lg mr-4">My app</h1>
                <p>
                    Welcome Back, {{ $page.props.auth.user.full_name ?? $page.props.auth.user.phone }}
                </p>
            </div>
            <Nav/>
        </header>
    </section>

    <section class="w-[1200px] mx-auto p-6">
        <div class="">
            <slot/>
        </div>
    </section>

</template>
