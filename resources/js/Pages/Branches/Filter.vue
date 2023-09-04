<script setup>
import {watch} from "vue";
import {debounce} from "lodash";
import {router, useForm} from "@inertiajs/vue3";

const props = defineProps({
    filters: Object,
    countries: Object,
})

const filter = useForm({
    country_id: props.filters.country_id,
})

watch(filter, debounce(function (filter) {
    router.get(
        '/branches', {
            country_id: filter.country_id,
        }, {
            preserveState: true,
            replace: true,
        }
    )
}, 500))
const handleReset = () => {
    router.get(
        '/branches', {}, {
            preserveState: true,
            replace: true,
        }
    )
}
</script>

<template>
    <div class="flex justify-start mb-6">
        <div class="w-1/4 mr-2">
            <select id="category" v-model="filter.country_id" class="border border-gray-200 p-2 w-full rounded-2xl"
                    name="category"
                    required>
                <option v-for="country in props.countries" :value="country.id" v-text="country.name"></option>
            </select>
        </div>
        <button class="btn-secondary" @click="handleReset">
            <i class="fa fa-remove text-white "></i>
        </button>
    </div>
</template>

<style scoped>

</style>
