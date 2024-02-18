<template>
    <nav class="relative flex justify-center">
        <Link
            v-for="(item, index) in pagination"
            :href="item.url ?? ''"
            class="flex item-center px-3 py-2 text-sm rounded-lg textgrey-600"
            :class="{'bg-gray-200' : item.active , '!text-gray-400': !item.url }"
            preserve-scroll
            :key="index.label"
            v-html="item.label"
            />
    </nav>

</template>

<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    pagination: {
        type: Object,
    },
});

</script>
