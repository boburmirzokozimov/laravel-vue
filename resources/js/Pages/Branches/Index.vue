<template>
    <div>
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl text-center">
                    Branches
                </h1>
            </div>

            <div>
                <NavLink class="btn-success" href="/branches/create">
                    <i class="fa fa-plus text-white"></i>
                </NavLink>
            </div>
        </div>
        <Filter :countries="props.countries" :filters="props.filters"/>
        <Table :branches="props.branches.data"/>
        <Paginator :links="props.branches.links"/>
    </div>

</template>

<script setup>
import NavLink from "@/Components/NavLink.vue";
import Table from "@/Pages/Branches/Table.vue";
import Filter from "@/Pages/Branches/Filter.vue";
import Paginator from "@/Components/Paginator.vue";

const props = defineProps({
    branches: Object,
    countries: Object,
    filters: Object,
})
</script>
