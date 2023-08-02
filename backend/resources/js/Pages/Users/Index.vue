<template>
    <div>
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl text-center">
                    Users
                </h1>
            </div>

            <div>
                <NavLink v-if="can.create_user" class="btn-success" href="/users/create">
                    Create
                </NavLink>
            </div>
        </div>

        <Table :countries="props.countries" :roles="roles" :users="props.users.data"/>
    </div>

</template>

<script setup>
import Table from "@/Components/Table.vue";
import NavLink from "@/Components/NavLink.vue";

const props = defineProps({
    users: Object,
    countries: Object,
    roles: Object,
    can: Array
})
</script>
