<script setup>
import { onMounted } from "vue";
import { initFlowbite } from "flowbite";
import { Head, Link } from "@inertiajs/vue3";
import NavBar from "./NavBar.vue";
import SideBar from "./SideBar.vue";

// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
});
</script>

<template>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <!-- NavBar Start -->
        <NavBar />
        <!-- NavBar End -->

        <!-- SideBar Start -->
        <SideBar />
        <!-- SideBar End -->
        <slot />
    </div>
</template>
