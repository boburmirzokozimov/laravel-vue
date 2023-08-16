<template>
    <div>
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl text-center">
                    Clients
                </h1>
            </div>

            <div>
                <NavLink class="btn-success" href="/clients/create">
                    Create
                </NavLink>
            </div>
        </div>
        <Filter :filters="props.filters"/>

        <ClientTable :clients="props.clients.data"/>
    </div>

</template>

<script setup>
import NavLink from "@/Components/NavLink.vue";
import ClientTable from "@/Components/ClientTable.vue";
import Filter from "@/Pages/Clients/Filter.vue";

const props = defineProps({
    clients: Object,
    filters: Object
})
</script>
