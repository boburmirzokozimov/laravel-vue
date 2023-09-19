<script setup>

import NavLink from "@/Components/NavLink.vue";
import {ref} from "vue";
import {router} from "@inertiajs/vue3";

const show = ref(false)
const handleNotificationClick = () => {
    router.visit('/dashboard')
}
</script>

<template>
    <div

        class="header-left"
        @click="show = !show">
        <button :class="$page.props.notifications.length > 0 ? 'bg-yellow-500 text-white' : ''"
                class="bg-gray-200 px-3 py-2 font-bold rounded">{{
                $page.props.auth.user.full_name ?? $page.props.auth.user.phone
            }}
            <i
                :class="$page.props.notifications.length > 0 ? 'bg-yellow-500 text-white' : ''"
                class="fa fa-angle-down ml-4">

            </i>
        </button>
        <div :class="show ? 'active z-10' : 'opacity-0 -z-10' " class="popup">
            <div class="flex flex-col justify-between relative">
                <button
                    :class="$page.props.notifications.length > 0 ? 'text-yellow-500' : ''"
                    class="flex justify-between hover:underline px-2 py-2 relative rounded"
                    @click="()=>handleNotificationClick()">
                    Notifications
                    <i :class="$page.props.notifications.length > 0 ? 'text-yellow-500' : ''"
                       aria-hidden="true"
                       class=" fa fa-bell  text-gray-400 notifications">
                        <span
                            :class="$page.props.notifications.length > 0 ? 'text-yellow-500' : ''"
                            class="text-xs absolute top-0"
                            v-text="$page.props.notifications.length > 0 ? $page.props.notifications.length : ''"
                        >
                        </span>
                    </i>
                </button>
                <NavLink as="button" class="flex justify-between px-2 py-2" href="/logout" method="post">
                    <div>Log Out</div>
                    <i aria-hidden="true" class="fa fa-sign-out text-gray-400 "></i>
                </NavLink>
            </div>
        </div>
    </div>
</template>

<style scoped>
</style>
