<script>
import {defineComponent} from "vue";

export default defineComponent({
  name: "TheDefaultLayout",
});
</script>

<template>
  <header>
    Header
  </header>
  <main>
    <slot/>
  </main>
  <footer>
    Footer
  </footer>
</template>

<style scoped>

</style>