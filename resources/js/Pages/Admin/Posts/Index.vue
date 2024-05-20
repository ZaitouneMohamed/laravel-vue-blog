<script lang="ts" setup>
import AdminLayout from '../../../Layouts/AdminLayouts.vue';
import { Head } from '@inertiajs/vue3';
import Pagination from '../../../Components/Pagination.vue';
import Table from '../../../Components/Table.vue';
import CreateNewPostForm from './Create.vue';
import { ref } from 'vue';
import { FwbButton, FwbModal } from 'flowbite-vue'

const props = defineProps({
    posts: {
        type: Array,
        required: true,
    },
    headers: {
        type: Array,
        required: true,
    },
});

const isShowModal = ref(false)

function closeModal() {
    isShowModal.value = false
}
function showModal() {
    isShowModal.value = true
}
</script>

<template>

    <Head title="Home" />

    <AdminLayout>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">Posts</h2>
                </div>
                <div v-if="$page.props.flash.success" >
                    {{ $page.props.flash.success }}
                </div>
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <fwb-modal v-if="isShowModal" @close="closeModal">
                        <template #header>
                            <div class="flex items-center text-lg">
                                Create New Post
                            </div>
                        </template>
                        <template #body>
                            <CreateNewPostForm />
                        </template>
                        <template #footer>
                            <div class="flex justify-between">
                                <fwb-button @click="closeModal" color="alternative">
                                    Decline
                                </fwb-button>
                                <fwb-button @click="closeModal" color="green">
                                    I accept
                                </fwb-button>
                            </div>
                        </template>
                    </fwb-modal>
                    <div>
                        <div class="relative block">
                            <button @click="showModal"
                                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                                Add New Post
                            </button>
                        </div>
                    </div>
                    <Table :data="props.posts" :headers="props.headers" ></Table>
                    <!-- <div class="overflow-hidden">
                        <table class="min-w-full">
                            <thead class="bg-gray-200 border-b">
                                <tr>
                                    <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                        Title
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                        image
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                        body
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                        categorie
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in posts.data" :key="index" class="transition duration-300 ease-in-out bg-white border-b hover:bg-gray-100">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                        {{ item.title.substring(0, 50) + ".." }}
                                    </td>
                                    <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                        {{ item.body.substring(0, 50) + ".." }}
                                    </td>
                                    <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                        <img :src="item.full_image" alt="" width="70px">
                                    </td>
                                    <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                        {{ item.categorie_name }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <Pagination :pagination="posts.links" />
                    </div> -->
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
