<script lang="ts" setup>
import HomeLayouts from '../../Layouts/NormalLayouts.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    posts: {
        type: Array,
        required: true,
    }
});

let selectedFilter = 'latest';

</script>

<template>

    <Head title="Home" />

    <HomeLayouts>
        <div class="container grid grid-cols-2 gap-4 mx-auto md:grid-cols-3">
            <div v-for="item in posts">
                <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <Link :href="route('post.show', item)">
                        <img class="rounded-t-lg"
                            :src="item.full_image" alt="" />
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
                        <Link :href="route('post.show', item)"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </HomeLayouts>
</template>
