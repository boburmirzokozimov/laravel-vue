<template>
  <div>
    <div class="flex justify-between items-center">
      <div>
        <h1 class="text-3xl text-center">
          Keys
        </h1>
      </div>

      <div>
        <NavLink class="btn-success" href="/countries/create">
          <i class="fa fa-plus text-white"></i>
        </NavLink>
      </div>
    </div>
    <Table :countries="props.countries"/>
  </div>

</template>

<script setup>
import NavLink from "@/Components/NavLink.vue";
import Table from "@/Pages/Countries/Table.vue";

const props = defineProps({
  countries: Object,
})
</script>
