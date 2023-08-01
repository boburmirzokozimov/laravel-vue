<script setup>
import NavLink from "@/Components/NavLink.vue";
</script>

<template>
    <nav>
        <ul class="flex space-x-6 ">
            <li>
                <NavLink :active="$page.component==='Home'" href="/">Home</NavLink>
            </li>
            <li>
                <NavLink :active="$page.component==='Users/Index'" href="/users">Users</NavLink>
            </li>
            <li>
                <NavLink as="button" href="/logout" method="post">Log Out</NavLink>
            </li>
        </ul>
    </nav>
</template>

<style scoped>

</style>
