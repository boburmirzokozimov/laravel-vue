<script setup>
import {ref, watch} from "vue";
import {debounce} from "lodash";
import {router, useForm} from "@inertiajs/vue3";
import {vMaska} from "maska"

const props = defineProps({
    filters: Object,
})

const filter = useForm({
    full_name: props.filters.full_name,
    phone: props.filters.phone,
})

watch(filter, debounce(function (filter) {
    router.get(
        '/clients', {
            full_name: filter.full_name,
            phone: filter.phone,
        }, {
            preserveState: true,
            replace: true,
        }
    )
}, 500))

</script>

<template>
    <div class="flex justify-center mb-6">
        <div class="w-1/3 mr-2">
            <input
                id="search"
                v-model="filter.full_name"
                class="border border-gray-200 p-2 w-full rounded-2xl"
                name="search"
                placeholder="Name..."
                type="search">
        </div>
        <div class="w-1/3 mr-2">
            <input
                id="search"
                v-model="filter.phone"
                v-maska
                class="border border-gray-200 p-2 w-full rounded-2xl"
                data-maska="#############"
                name="search"
                placeholder="Phone..."
                type="search">
        </div>
    </div>
</template>

<style scoped>

</style>
