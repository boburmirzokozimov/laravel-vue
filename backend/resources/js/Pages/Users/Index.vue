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
        <Filter :countries="props.countries" :filters="props.filters" :roles="props.roles"/>

        <Table :countries="props.countries" :roles="roles" :users="props.users.data"/>

        <Paginator :links="props.users.links"/>
    </div>

</template>

<script setup>
import Table from "@/Components/Table.vue";
import NavLink from "@/Components/NavLink.vue";
import {ref, watch} from "vue";
import {debounce} from "lodash";
import {router} from "@inertiajs/vue3";
import Paginator from "@/Components/Paginator.vue";
import Filter from "@/Pages/Users/Filter.vue";

const props = defineProps({
    users: Object,
    countries: Object,
    roles: Object,
    can: Array,
    filters: Object,
})


</script>
