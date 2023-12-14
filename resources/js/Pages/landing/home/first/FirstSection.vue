<template>
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6" v-for="post in posts">
                    <div class="category-item">
                        <div class="category-img">
                            <Link :href="route('post.details', post)"><img src="assets/landing/images/cat/cat-4.jpg" alt=""
                                    class="img-fluid w-100"></Link>
                        </div>
                        <div class="content">
                            <a href="#" class="text-color text-uppercase font-sm letter-spacing font-extra">{{
                                post.categorie.name }}</a>
                            <h4>
                                <Link :href="route('post.details', post)">{{ post.title }}</Link>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    posts: {
        type: Array,
    },
});
</script>
