
<script lang="ts" setup>
import AdminLayout from '../../../Layouts/AdminLayouts.vue';
import { Head , useForm } from '@inertiajs/vue3';
import Pagination from '../../../Components/Pagination.vue';
import Modal from '../../../Components/Modal.vue';
import InputError from '../../../Components/InputError.vue';
import { ref } from 'vue';

const props = defineProps({
    categories: {
        type: Array,
        required: true,
    },
});

const form = useForm({
    name: null,
})

const isShow = ref(false);

const toggleIsShow = () => {
    isShow.value = !isShow.value;
};

</script>

<template>
    <Head title="Categorie" />

    <AdminLayout>
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">Categorie</h2>
                </div>

                <div class="grid grid-cols-3">
                    <!-- <div class="grid grid-cols-6">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-state">
                                State
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-state">
                                    <option>New Mexico</option>
                                    <option>Missouri</option>
                                    <option>Texas</option>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div>
                            <input placeholder="Search"
                                class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                        </div>
                    </div> -->
                    <!-- ... -->
                    <Modal :show="isShow">
                        <button>close</button>
                        <div class="flex items-center justify-center p-12">
                            <!-- Author: FormBold Team -->
                            <!-- Learn More: https://formbold.com -->
                            <div class="mx-auto w-full max-w-[550px]">
                                <form @submit.prevent="form.post('/admin/categorie')">
                                    {{ form }}
                                    <div class="mb-5">
                                        <label for="guest" class="mb-3 block text-base font-medium text-[#07074D]">
                                            How many guest are you bringing?
                                        </label>
                                        <input type="text" name="guest" id="guest" v-model="form.name"
                                            class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                            <InputError class="mt-2" :message="form.errors.name" />
                                        </div>
                                    <div>
                                        <button
                                            class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </Modal>
                    <div>
                        <div class="block relative">
                            <button @click="toggleIsShow"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Add New Catgeorie
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
                                        #
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Posts Count
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in categories.data" :key="index">
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ item.id }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ item.name }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ item.posts_count }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            <!-- {{ item.posts_count }} -->
                                        </p>
                                        <!-- <span
                                            class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                            <span aria-hidden
                                                class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                            <span class="relative">Activo</span>
                                        </span> -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <Pagination :pagination="categories.links" />
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
