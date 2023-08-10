<template>
    <div>
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl text-center">
                    Couriers
                </h1>
            </div>

            <div>
                <button v-if="$page.props.is_manager" class="btn-success" @click="handleCreate">
                    Создать Курьера
                </button>
            </div>
        </div>

        <Table :countries="props.countries" :couriers="props.couriers.data"/>
        <Modal v-if="active" @close="closeModal"/>
        <Create v-if="active" :countries="props.countries"
                @close="closeModal"/>
    </div>

</template>

<script setup>

import Table from "@/Pages/Couriers/Table.vue";
import Modal from "@/Components/Modal.vue";
import {ref} from "vue";
import Create from "@/Pages/Couriers/Create.vue";

const props = defineProps({
    couriers: Object,
    countries: Object,
})
const active = ref(false)
const closeModal = () => {
    active.value = false
}

const handleCreate = () => {
    active.value = true
}
</script>
