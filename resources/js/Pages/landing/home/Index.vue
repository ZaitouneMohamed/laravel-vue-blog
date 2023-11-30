<script setup>
import { Head, Link } from '@inertiajs/vue3';
import LandingLayouts from '../../../Layouts/LandingLayouts.vue';

import FirstSection from './first/FirstSection.vue'
import SecondSection from './second/SecondSection.vue'

// defineProps({
//     canLogin: {
//         type: Boolean,
//     },
//     canRegister: {
//         type: Boolean,
//     },
//     laravelVersion: {
//         type: String,
//         required: true,
//     },
//     phpVersion: {
//         type: String,
//         required: true,
//     },
// });
</script>

<template>

<Head title="Home" />
    <LandingLayouts>

        <FirstSection />
        <SecondSection />

    </LandingLayouts>

</template>
