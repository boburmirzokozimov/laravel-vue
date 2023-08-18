<template>
    <div>
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl text-center">
                    Keys
                </h1>
            </div>

            <div>
                <NavLink class="btn-success" href="/keys/create">
                    Create
                </NavLink>
            </div>
        </div>
        <Table :keys="props.keys"/>
    </div>

</template>

<script setup>
import NavLink from "@/Components/NavLink.vue";
import Table from "@/Pages/Keys/Table.vue";

const props = defineProps({
    keys: Object,
})
</script>
