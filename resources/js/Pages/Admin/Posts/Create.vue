<template>
    <div class="flex items-center justify-center p-12">
        <div class="mx-auto w-full max-w-[550px]">
            {{ form }}
            <form @submit.prevent="form.post('/admin/post')">
                <div class="mb-5">
                    <label for="guest" class="mb-3 block text-base font-medium text-[#07074D]">
                        Post Title
                    </label>
                    <input type="text" v-model="form.title" id="guest"
                        class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    <InputError class="mt-2" :message="form.errors.title" />
                </div>
                <div class="mb-5">
                    <label for="guest" class="mb-3 block text-base font-medium text-[#07074D]">
                        Body
                    </label>
                    <textarea name="" id="" cols="30" v-model="form.body"
                        class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        rows="10"></textarea>
                    <InputError class="mt-2" :message="form.errors.body" />
                </div>
                <div class="mb-5">
                    <label for="guest" class="mb-3 block text-base font-medium text-[#07074D]">
                        Categorie
                    </label>
                    <select v-model="form.categorie_id"
                        class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        id="">
                        <option v-for="(item, index) in categories" :key="index" :value="item.id">  {{ item.name }}</option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.categorie_id" />
                </div>
                <!-- <div class="mb-5">
                    <label for="guest" class="mb-3 block text-base font-medium text-[#07074D]">
                        Image
                    </label>
                    <input type="file" name="guest" id="guest"
                        class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    <InputError class="mt-2" :message="form.errors.image" />
                </div> -->
                <div>
                    <button
                        class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { Head, useForm, router, usePage } from '@inertiajs/vue3';
import InputError from '../../../Components/InputError.vue';
import { ref, computed } from 'vue';

const page = usePage()

const categories = computed(() => page.props.allCategories)

const form = useForm({
    title: null,
    body: null,
    categorie_id: null,
})


</script>
