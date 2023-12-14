<script setup>
import { Head, Link } from '@inertiajs/vue3';
import LandingLayouts from '../../../Layouts/LandingLayouts.vue';
import { ref, onMounted } from 'vue';
import FirstSection from './first/FirstSection.vue'
import SecondSection from './second/SecondSection.vue'

defineProps({
    posts: {
        type: Array,
    },
});
</script>

<template>
    <Head title="Home" />
    <LandingLayouts>

        <FirstSection :posts="posts" />
        <SecondSection />

    </LandingLayouts>
</template>
