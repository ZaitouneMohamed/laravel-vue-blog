<script lang="ts" setup>
import AdminLayout from '@/Layouts/AdminLayouts.vue';
import { Head } from '@inertiajs/vue3';

</script>

<template>

    <Head title="Home" />

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-gray-200 border-b">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                    First
                                </th>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                    Last
                                </th>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                    Handle
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="transition duration-300 ease-in-out bg-white border-b hover:bg-gray-100">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">1</td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                    Mark
                                </td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                    Otto
                                </td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                    @mdo
                                </td>
                            </tr>
                            <tr class="transition duration-300 ease-in-out bg-white border-b hover:bg-gray-100">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">2</td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                    Jacob
                                </td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                    Thornton
                                </td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                    @fat
                                </td>
                            </tr>
                            <tr class="transition duration-300 ease-in-out bg-white border-b hover:bg-gray-100">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">3</td>
                                <td colspan="2" class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                    Larry
                                </td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                    @twitter
                                </td>
                            </tr>
                            <tr class="transition duration-300 ease-in-out bg-white border-b hover:bg-gray-100">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">4</td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                    Whitney
                                </td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                    Austin
                                </td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                    @mdo
                                </td>
                            </tr>
                            <tr class="transition duration-300 ease-in-out bg-white border-b hover:bg-gray-100">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">5</td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                    Ted
                                </td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                    Obama
                                </td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                    @fat
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
