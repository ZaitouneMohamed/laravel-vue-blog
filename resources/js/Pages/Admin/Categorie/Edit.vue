<template>
    <div class="flex items-center justify-center p-12">
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="mx-auto w-full max-w-[550px]">
            <form @submit.prevent="form.put('/admin/categorie/' + categorie.id)">
                <!-- {{ form }} -->
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
</template>


<script lang="ts" setup>
import { useForm } from '@inertiajs/vue3';
import InputError from '../../../Components/InputError.vue';

const props = defineProps({
    categorie: {
        type: Object,
        required: true,
    },
});


let form = useForm({
    name: props.categorie.name,
});
</script>
