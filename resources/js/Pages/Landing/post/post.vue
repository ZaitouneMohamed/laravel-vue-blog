<template>

    <Head :title="post.title" />
    <HomeLayouts>

        <main class="px-6 py-8">

            <div class="mb-4 md:mb-0 w-full mx-auto relative">
                <div class="px-4 lg:px-0">
                    <h2 class="text-4xl font-semibold text-gray-800 leading-tight">
                        {{ post.title }}
                    </h2>
                    <a href="#" class="py-2 text-green-700 inline-flex items-center justify-center mb-2">
                        {{ post.categorie_name }}
                    </a>
                </div>

                <img src="https://images.unsplash.com/photo-1587614387466-0a72ca909e16?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2100&q=80"
                    class="w-full object-cover lg:rounded" style="height: 28em;" />
            </div>

            <div class="flex flex-col lg:flex-row lg:space-x-12">

                <div class="px-4 lg:px-0 mt-12 text-gray-700 text-lg leading-relaxed w-full lg:w-3/4">
                    <p class="pb-6">{{ post.body }}</p>

                </div>

                <div class="w-full lg:w-1/4 m-auto mt-12 max-w-screen-sm">
                    <div class="p-4 border-t border-b md:border md:rounded">
                        <div class="flex py-2">
                            <img src="https://randomuser.me/api/portraits/men/97.jpg"
                                class="h-10 w-10 rounded-full mr-2 object-cover" />
                            <div>
                                <p class="font-semibold text-gray-700 text-sm"> {{ post.user.name }} </p>
                                <p class="font-semibold text-gray-600 text-xs"> Editor </p>
                            </div>
                        </div>
                        <p class="text-gray-700 py-3">
                            Mike writes about technology
                            Yourself required no at thoughts delicate landlord it be. Branched dashwood do is whatever
                            it.
                        </p>
                        <button
                            class="px-2 py-1 text-gray-100 bg-green-700 flex w-full items-center justify-center rounded">
                            Follow
                            <i class='bx bx-user-plus ml-2'></i>
                        </button>
                    </div>
                </div>

            </div>
            <!-- Comment Form -->
            <div class="px-4 mt-8" v-if="$page.props.auth.user">
                <h2 class="text-xl font-semibold mb-4">Leave a Comment</h2>
                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                    {{ form.progress.percentage }}%
                </progress>
                <form @submit.prevent="form.post('/AddComment')">
                    <div class="mb-4">
                        <label for="comment" class="block text-gray-700 text-sm font-bold mb-2">Your Comment:</label>
                        <textarea id="comment" name="comment" rows="5"
                            class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none"
                            v-model="form.body"></textarea>
                        <div v-if="form.errors.body">
                            {{ form.errors.body }}
                        </div>

                    </div>
                    <div class="mb-6">
                        <button type="submit" :disabled="form.processing"
                            class="w-full px-4 py-2 text-white bg-green-700 rounded-md hover:bg-green-600 focus:bg-green-800 focus:outline-none">Post
                            Comment</button>
                    </div>
                </form>
            </div>
            <div class="px-4 mt-8" v-else>
                <fwb-button @click="showModal">
                    Login 
                </fwb-button>
                <fwb-modal v-if="isShowModal" @close="closeModal">
                    <template #header>
                        <div class="flex items-center text-lg">
                            Terms of Service
                        </div>
                    </template>
                    <template #body>
                        <Login />
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
            </div>
            <div class="px-4 mt-8">
                <h2 class="text-xl font-semibold mb-4">Comments</h2>
                <ul class="divide-y divide-gray-200">
                    <!-- Sample comment -->
                    <li class="py-4" v-for="item in post.comments">
                        <div class="flex space-x-3">
                            <img src="https://randomuser.me/api/portraits/men/97.jpg" class="h-6 w-6 rounded-full"
                                alt="User Avatar">
                            <div class="flex-1 space-y-1">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-sm font-medium">{{ item.user.name }}</h3>
                                    <p class="text-sm text-gray-500">{{ item.created_at }}</p>
                                </div>
                                <p class="text-sm text-gray-500">
                                    {{ item.body }}
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </main>
    </HomeLayouts>
</template>

<script setup>
import HomeLayouts from '../../../Layouts/NormalLayouts.vue';
import Login from '../../../Pages/Auth/Login.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import { FwbButton, FwbModal } from 'flowbite-vue'

const props = defineProps({
    post: {
        type: Array,
        required: true,
    },
});

const form = useForm({
    body: null,
    post_id: props.post.id,
})


const isShowModal = ref(false)

function closeModal() {
    isShowModal.value = false
}
function showModal() {
    isShowModal.value = true
}


</script>
