<script lang="ts" setup>
import HomeLayouts from '../../Layouts/NormalLayouts.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    title: {
        type: String,
        required: true,
    },
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
        <div class="px-6 py-8">
            <div class="container flex justify-between mx-auto">
                <div class="w-full lg:w-8/12">
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Post</h1>
                        <div>
                            <select v-model="selectedFilter"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option>Latest</option>
                                <option>Last Week</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-6" v-for="item in posts">
                        <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                            <div class="flex items-center justify-between"><span class="font-light text-gray-600">{{
                                item.created_at }}</span>
                                <Link :href="(route('GetPostsOfCategorie', item.categorie))"
                                    class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">{{
                                item.categorie.name }}</Link>
                            </div>
                            <div class="mt-2">
                                <Link :href="route('post.show', item)"
                                    class="text-2xl font-bold text-gray-700 hover:underline">{{
                                item.title }}</Link>
                                <p class="mt-2 text-gray-600">{{ item.title.substring(0, 500) + ".." }}</p>
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                <Link :href="route('post.show', item)" class="text-blue-500 hover:underline">Read more
                                </Link>
                                <div>
                                    <Link :href="route('post.show', item)" class="flex items-center"><img
                                        src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                        alt="avatar" class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                                    <h1 class="font-bold text-gray-700 hover:underline">{{ item.user.name }}</h1>
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden w-4/12 -mx-8 lg:block">
                    <div class="px-8">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">Authors</h1>
                        <div class="flex flex-col max-w-sm px-6 py-4 mx-auto bg-white rounded-lg shadow-md">
                            <ul class="-mx-4">
                                <li class="flex items-center mt-6" v-for="item in $page.props.topUsers"><img
                                        src="https://images.unsplash.com/photo-1500757810556-5d600d9b737d?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=735&amp;q=80"
                                        alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                    <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">{{ item.name
                                            }}</a><span class="text-sm font-light text-gray-700">Created {{
                                item.posts_count
                            }} Posts</span></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="px-8 mt-10">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">Categories</h1>
                        <div class="flex flex-col max-w-sm px-4 py-6 mx-auto bg-white rounded-lg shadow-md">
                            <ul>
                                <li v-for="item in $page.props.categories">
                                    <a href="#"
                                        class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">-
                                        {{ item.name }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="px-8 mt-10">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">Recent Post</h1>
                        <div class="flex flex-col max-w-sm px-8 py-6 mx-auto bg-white rounded-lg shadow-md">
                            <div class="flex items-center justify-center"><a href="#"
                                    class="px-2 py-1 text-sm text-green-100 bg-gray-600 rounded hover:bg-gray-500">Laravel</a>
                            </div>
                            <div class="mt-4"><a href="#"
                                    class="text-lg font-medium text-gray-700 hover:underline">Build
                                    Your New Idea with Laravel Freamwork.</a></div>
                            <div class="flex items-center justify-between mt-4">
                                <div class="flex items-center"><img
                                        src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                        alt="avatar" class="object-cover w-8 h-8 rounded-full"><a href="#"
                                        class="mx-3 text-sm text-gray-700 hover:underline">Alex John</a></div><span
                                    class="text-sm font-light text-gray-600">Jun 1, 2020</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </HomeLayouts>
</template>
