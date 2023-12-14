<template>
    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
        <div class="sidebar sidebar-right">
            <div class="sidebar-wrap mt-5 mt-lg-0">

                <div class="sidebar-widget mb-5 ">
                    <h4 class="text-center widget-title">Trending Posts</h4>

                    <div class="media border-bottom py-3 sidebar-post-item" v-for="post in $page.props.trending_posts"
                        :key="post.id">
                        <a href="#"><img class="mr-4" src="images/news/thumb-1.jpg" alt=""></a>
                        <div class="media-body">
                            <span class="text-muted letter-spacing text-uppercase font-sm">{{
                                post?.created_at }}</span>
                            <h4>
                                <Link :href="route('post.details', post)">{{ post.title }}</Link>
                            </h4>
                        </div>
                    </div>
                </div>


                <div class="sidebar-widget category mb-5">
                    <h4 class="text-center widget-title">Categories</h4>
                    <ul class="list-unstyled">
                        <li class="align-items-center d-flex justify-content-between"
                            v-for="(item, index) in $page.props.randomCategories">
                            <Link :href="route('PostsOfCategorie',item)">{{ item.name }}</Link>
                            <span>{{ item.posts_count }}</span>
                        </li>
                    </ul>
                </div>

                <div class="sidebar-widget sidebar-adv mb-5">
                    <a href="#"><img src="images/sidebar-banner3.png" alt="" class="img-fluid w-100"></a>
                </div>

            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

// defineProps({
//     posts: {
//         type: Array,
//     },
//     categorie: {
//         type: Array,
//     },
// });
</script>
