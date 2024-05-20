<script lang="ts" setup>
import HomeLayouts from '../../../Layouts/NormalLayouts.vue';
import { Head, Link } from '@inertiajs/vue3';
import Pagination from '../../../Components/Pagination.vue';

const props = defineProps({
    title: {
        type: String,
        required: true,
    },
    posts: {
        type: Array,
        required: true,
    },
    categorie: {
        type: String,
    }
});

let selectedFilter = 'latest';

</script>

<template>

    <Head title="Categorie" />

    <HomeLayouts>
        <!-- <div class="px-6 py-8">
            <div class="container flex justify-between mx-auto">
                <div class="w-full lg:w-8/12">
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Post <span v-if="categorie">of {{ categorie }}</span>  </h1>
                        <div>
                            <select v-model="selectedFilter"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option>Latest</option>
                                <option>Last Week</option>
                            </select>
                        </div>
                    </div>
                    <div v-for="item in posts.data">
                        <div
                            class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <Link :href="route('post.show', item)">
                                <img class="rounded-t-lg"
                                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="" />
                            </Link>
                            <div class="p-5">
                                <Link :href="route('post.show', item)">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{
                                        item.title }}</h5>
                                    </Link>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ item.body.substring(0, 500) +
                                    ".." }}</p>
                                <Link :href="(route('GetPostsOfCategorie', item.categorie_slug))"
                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                {{
                                    item.categorie_name }}</Link>
                                <a href="#"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Read more
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <br>
        <br>
        <h1 class="text-xl font-bold text-gray-700 md:text-2xl text-center" v-if="categorie">Post <span>of {{ categorie
                }}</span> </h1>
        <h1 v-else class="text-xl font-bold text-gray-700 md:text-2xl text-center">All Posts </h1>
        <br>
        <br>
        <div class="container mx-auto grid grid-cols-2 md:grid-cols-3 gap-4">
            <div v-for="item in posts.data">

                <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <Link :href="route('post.show', item)">
                    <img class="rounded-t-lg" :src="item.full_image" alt="" />
                    </Link>
                    <div class="p-5">
                        <Link :href="route('post.show', item)">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{
                            item.title }}</h5>
                        </Link>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ item.body.substring(0, 500) +
                            ".." }}</p>
                        <Link :href="(route('GetPostsOfCategorie', item.categorie_slug))"
                            class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                        {{
                            item.categorie_name }}</Link>
                        <a href="#"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <Pagination :pagination="posts.links" /> <br><br>
    </HomeLayouts>
</template>
