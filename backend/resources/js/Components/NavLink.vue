<script>
import {defineComponent} from "vue";
import {Link} from "@inertiajs/vue3";

export default defineComponent({
    props: {
        active: Boolean
    },
    components: {Link}
})
</script>

<template>
    <Link
        :class="{'font-bold underline' : active}"
        class="text-black hover:underline"
    >
        <slot/>
    </Link>
</template>

<style scoped>

</style>
