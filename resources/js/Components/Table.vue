<template>
    <div class="overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-200 border-b">
                <tr>
                    <th v-for="(header, key) in headers" :key="key"
                        class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                        {{ header }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in data.data" :key="index"
                    class="transition duration-300 ease-in-out bg-white border-b hover:bg-gray-100">
                    <td v-for="(header, key) in headers" :key="key"
                        class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                        <template v-if="header === 'full_image'">
                            <img :src="item[header]" width="70px" alt="Image">
                        </template>
                        <template v-else>
                            {{ item[header].substring(0, 50) + ".." }}
                        </template>
                    </td>
                </tr>
            </tbody>
        </table>
        <Pagination :pagination="data.links" />
    </div>
</template>

<script setup lang="ts">

import Pagination from "./Pagination.vue"

const props = defineProps({
    data: {
        type: Array,
        required: true,
    },
    headers: {
        type: Array,
        required: true,
    },
})

</script>
