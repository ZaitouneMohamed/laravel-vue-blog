<script lang="ts" setup>
import AdminLayout from '../../../Layouts/AdminLayouts.vue';
import { Head } from '@inertiajs/vue3';
import Pagination from '../../../Components/Pagination.vue';
import Modal from '../../../Components/Modal.vue';
import CreateNewPostForm from './Create.vue';
import { ref } from 'vue';

const props = defineProps({
    posts: {
        type: Array,
        required: true,
    },
});

const toggleIsShow = () => {
    isShow.value = !isShow.value;
};

const isShow = ref(false);

</script>

<template>

    <Head title="Home" />

    <AdminLayout>
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">Posts</h2>
                </div>

                <div class="grid grid-cols-3">
                    <!-- <Modal :show="isEditModalOpen">
                        <EditModal :categorie="selectedCategory"></EditModal>
                    </Modal> -->
                    <!-- <EditModal   @close="closeEditModal"></EditModal> -->
                    <Modal :show="isShow">
                        <CreateNewPostForm />
                    </Modal>
                    <div>
                        <div class="block relative">
                            <button
                                @click="toggleIsShow"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Add New Post
                            </button>
                        </div>
                    </div>
                </div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        title
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        body
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Image
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Categorie
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in posts.data" :key="index">
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ item.title.substring(0, 50) + ".." }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ item.body.substring(0, 50) + ".." }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <img :src="item.image ? item.image.url : ''" alt="" width="70px">
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ item.categorie.name }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <!-- <button @click="openEditModal(item)"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Edit
                                        </button>
                                        <button @click="destroy(item.id)" v-if="item.posts_count == 0"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                            Delete
                                        </button> -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <Pagination :pagination="posts.links" />
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
