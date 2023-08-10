<script setup>
import NavLink from "@/Components/NavLink.vue";
</script>

<template>
    <nav>
        <ul class="flex space-x-6 ">
            <li>
                <NavLink :active="$page.component.startsWith('Home')" href="/">Home</NavLink>
            </li>
            <li>
                <NavLink :active="$page.component.startsWith('Users')" href="/users">Users</NavLink>
            </li>
            <li>
                <NavLink :active="$page.component.startsWith('Clients')" href="/clients">Clients</NavLink>
            </li>
            <li>
                <NavLink :active="$page.component.startsWith('Couriers')" href="/couriers">Couriers</NavLink>
            </li>
            <li>
                <NavLink :active="$page.component.startsWith('Chat')" href="/chat">Chat</NavLink>
            </li>
            <li>
                <NavLink as="button" href="/logout" method="post">Log Out</NavLink>
            </li>
        </ul>
    </nav>
</template>

<style scoped>

</style>
