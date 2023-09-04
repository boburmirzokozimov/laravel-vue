<script setup>
import {watch} from "vue";
import {debounce} from "lodash";
import {router, useForm} from "@inertiajs/vue3";

const props = defineProps({
    filters: Object,
    client_id: Number,
})

const filter = useForm({
    status: props.filters.status,
    type: props.filters.type,
    date: props.filters.date,
})

watch(filter, debounce(function (filter) {
    router.get(
        `/clients/${props.client_id}`, {
            status: filter.status,
            type: filter.type,
            date: filter.date,
        }, {
            preserveState: true,
            replace: true,
            preserveScroll: true
        }
    )
}, 500))
const handleReset = () => {
    filter.status = ''
    filter.type = ''
    filter.date = ''
}
</script>

<template>
    <div class="flex justify-center mb-6 mt-6">
        <div class="w-1/3 mr-2">
            <input
                id="date"
                v-model="filter.date"
                class="border border-gray-200 p-2 w-full rounded-2xl"
                type="date">
        </div>
        <div class="w-1/3 mr-2">
            <select
                id="type"
                v-model="filter.type"
                class="h-full border border-gray-200 p-2 w-full rounded-2xl"
                name="type">
                <option value="CASH">CASH</option>
                <option value="CASHLESS">CASHLESS</option>
                <option value="USDT">USDT</option>
                <option value="SWIFT">SWIFT</option>
                <option value="SEPA">SEPA</option>
            </select>
        </div>
        <div class="w-1/3 mr-2">
            <select
                id="status"
                v-model="filter.status"
                class="h-full border border-gray-200 p-2 w-full rounded-2xl"
                name="type">
                <option value="WAITING">WAITING</option>
                <option value="HOLD">HOLD</option>
                <option value="VERIFICATION">VERIFICATION</option>
            </select>
        </div>
        <div class=" mr-2">
            <button
                class="btn-secondary w-full h-full"
                @click.prevent="handleReset"
            >
                <i class="fa fa-remove text-white"></i>
            </button>
        </div>
    </div>
</template>

<style scoped>

</style>
