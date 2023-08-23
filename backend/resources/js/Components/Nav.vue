<script setup>
import NavLink from "@/Components/NavLink.vue";
import {ref} from "vue";

const active = ref(false)
</script>

<template>
    <nav
        class="sidebar transition z-10 flex flex-col "
        @mouseleave="active = false"
        @mouseover="active = true">
        <h2
            :class="active ? 'translate-x-1 opacity-100':'-translate-x-1 opacity-0'"
            class="text-white transition text-xl text-center py-6">Dashboard</h2>
        <h3
            :class="active ? 'translate-x-1':'-translate-x-1 opacity-0'"
            class="text-xl text-white transition py-6 px-4">Manage
        </h3>
        <ul class="flex flex-col">
            <li class="nav_link_item">
                <NavLink
                    :active="$page.component.startsWith('Home')"
                    class="nav_link_class"
                    href="/"
                >
                    <i class="fa fa-coffee fa-2x"></i>
                    <span
                        :class="active ? 'translate-x-1 opacity-100' : '-translate-x-1 opacity-0' "
                        class="transition  text-gray-400 hover:text-white"
                    >
                        Dashboard
                    </span>
                </NavLink>
            </li>
            <li class="nav_link_item">
                <NavLink
                    :active="$page.component.startsWith('Users')"
                    class="nav_link_class"
                    href="/users"
                >
                    <i class="fa fa-users fa-2x"></i>
                    <span
                        :class="active ?'translate-x-1 opacity-100':'-translate-x-1 opacity-0'"
                        class="transition  text-gray-400 hover:text-white"
                    >
                        Users
                    </span>
                </NavLink>
            </li>
            <li class="nav_link_item">
                <NavLink
                    :active="$page.component.startsWith('Clients')"
                    class="nav_link_class"

                    href="/clients"
                >
                    <i class="fa fa-address-book fa-2x"></i>
                    <span
                        :class="active ?'translate-x-1 opacity-100':'-translate-x-1 opacity-0'"
                        class="transition  text-gray-400 hover:text-white"
                    >
                    Clients
                </span></NavLink>
            </li>
            <li class="nav_link_item">

                <NavLink
                    :active="$page.component.startsWith('Couriers')"
                    class="nav_link_class"
                    href="/couriers"
                >
                    <i class="fa fa-bicycle fa-2x"></i>
                    <span
                        :class="active ? 'translate-x-1 opacity-100' : '-translate-x-1 opacity-0' "
                        class="transition  text-gray-400 hover:text-white"
                    >
                        Couriers
                    </span>
                </NavLink>
            </li>
            <li class="nav_link_item">
                <NavLink
                    :active="$page.component.startsWith('Chat')"
                    class="nav_link_class"
                    href="/chat">
                    <i class="fa fa-commenting fa-2x"></i>

                    <span
                        :class="active ?'translate-x-1 opacity-100':'-translate-x-1 opacity-0'"
                        class="transition  text-gray-400 hover:text-white"
                    >
                        Chat
                    </span>
                </NavLink>
            </li>
            <li class="nav_link_item">
                <NavLink
                    :active="$page.component.startsWith('Branch')"
                    class="nav_link_class"
                    href="/branches">
                    <i class="fa fa-institution fa-2x"></i>

                    <span
                        :class="active ?'translate-x-1 opacity-100':'-translate-x-1 opacity-0'"
                        class="transition  text-gray-400 hover:text-white"
                    >
                        Branches
                    </span>
                </NavLink>
            </li>
            <li class="nav_link_item">
                <NavLink
                    :active="$page.component.startsWith('Keys')"
                    class="nav_link_class"
                    href="/keys">
                    <i class="fa fa-key fa-2x"></i>

                    <span
                        :class="active ?'translate-x-1 opacity-100':'-translate-x-1 opacity-0'"
                        class="transition  text-gray-400 hover:text-white"
                    >
                        Keys
                    </span>
                </NavLink>
            </li>
        </ul>
        <h3
            :class="active ? 'translate-x-1':'-translate-x-1 opacity-0'"
            class="text-xl text-white transition py-6 px-4">Settings
        </h3>
        <ul class="flex flex-col">
            <li class="nav_link_item">
                <NavLink
                    :active="$page.component.startsWith('Chat')"
                    class="nav_link_class"
                    href="/#">
                    <i class="fa fa-lock fa-2x"></i>
                    <span
                        :class="active ?'translate-x-1 opacity-100':'-translate-x-1 opacity-0'"
                        class="transition  text-gray-400 hover:text-white"
                    >
                        Profile
                    </span>
                </NavLink>
            </li>
        </ul>
    </nav>
</template>

<style lang="scss" scoped>
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    background-color: #3e444a;
    height: 100vh;
    width: 74px;

    &:hover {
        width: 250px;
        opacity: 1;
    }
}

.transition {
    transition: all .3s cubic-bezier(.47, 0, .745, .715);

}

.nav_link_class {
    @apply flex items-center
}

.nav_link_item {
    @apply px-4 py-2 transition
}
</style>
