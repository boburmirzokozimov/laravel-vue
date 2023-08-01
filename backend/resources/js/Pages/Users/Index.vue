<template>
    <div>
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl text-center">
                    Users
                </h1>
            </div>

            <div>
                <NavLink class="btn-success" href="/users/create">
                    Create
                </NavLink>
            </div>
        </div>

        <Table :countries="props.countries" :users="props.users.data"/>
    </div>

</template>

<script setup>
import Table from "@/Components/Table.vue";
import NavLink from "@/Components/NavLink.vue";

const props = defineProps({
    users: Object,
    countries: Object,
})
</script>
