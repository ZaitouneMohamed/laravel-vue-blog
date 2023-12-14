<template>
    <Head title="post details" />
    <LandingLayouts>
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center">
                            <h2 class="lg-title">{{ category.name }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6" v-for="(item, index) in posts" :key="index">
                                <article class="post-grid mb-5">
                                    <div class="post-thumb mb-4">
                                        <img src="images/news/f1.jpg" alt="" class="img-fluid w-100">
                                    </div>
                                    <span class="cat-name text-color font-extra text-sm text-uppercase letter-spacing-1">{{
                                        item.categorie.name }}</span>
                                    <h3 class="post-title mt-1">
                                        <Link >{{ item.title }}</Link>
                                    </h3>
                                    <span class=" text-muted  text-capitalize">{{ item.created_at }}</span>
                                </article>
                            </div>
                        </div>
                        <!-- <div class="pagination mt-5 pt-4">
                            <ul class="list-inline">
                                <li v-if="pagination.prev" class="list-inline-item">
                                    <Link :href="pagination.prev">Previous</Link>
                                </li>
                                <li v-for="page in pagination.pages" :key="page" class="list-inline-item">
                                    <Link :href="page.url" :class="{ active: page.active }">{{ page.page }}</Link>
                                </li>
                                <li v-if="pagination.next" class="list-inline-item">
                                    <Link :href="pagination.next">Next</Link>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                    <SharedSection />
                </div>
            </div>
        </section>

    </LandingLayouts>
</template>
<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import LandingLayouts from '../../Layouts/LandingLayouts.vue';
import SharedSection from './shared/Trending.vue';

defineProps({
    posts: {
        type: Array,
    },
    category: {
        type: Array,
    },
});
// defineProps(['posts', 'category']);

</script>
