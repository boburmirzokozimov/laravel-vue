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
    <Table :branches="props.branches.data"/>
  </div>

</template>

<script setup>
import NavLink from "@/Components/NavLink.vue";
import Table from "@/Pages/Branches/Table.vue";

const props = defineProps({
  branches: Object,
})
</script>
