<template>
    <Head title="post details" />
    <LandingLayouts>
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <section class="single-block-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="single-post">
                            <div class="post-header mb-5 text-center">
                                <div class="meta-cat">
                                    <Link :href="route('PostsOfCategorie', post.categorie)"
                                        class="post-category font-extra text-color text-uppercase font-sm letter-spacing-1"
                                        href="#">{{ post.categorie.name }}</Link>
                                </div>
                                <h2 class="post-title mt-2">
                                    {{ post.title }}
                                </h2>

                                <div class="post-meta">
                                    <span class="text-uppercase font-sm letter-spacing-1 mr-3">by {{ post.user.name
                                    }}</span>
                                    <span class="text-uppercase font-sm letter-spacing-1">{{ post.created_at }}</span>
                                </div>
                                <div class="post-featured-image mt-5">
                                    <img src="images/fashion/bg-banner.jpg" class="img-fluid w-100" alt="featured-image">
                                </div>
                            </div>
                            <div class="post-body">
                                <div class="entry-content">
                                    {{ post.body }}
                                </div>

                                <div class="post-tags py-4">
                                    <a href="#" v-for="post in post.tags">#Health</a>
                                </div>


                                <div
                                    class="tags-share-box center-box d-flex text-center justify-content-between border-top border-bottom py-3">

                                    <span class="single-comment-o"><i class="fa fa-comment-o"></i>{{ post.comments.length }}
                                        comment</span>

                                    <!-- <div class="post-share">
                                        <span class="count-number-like">2</span>
                                        <a class="penci-post-like single-like-button"><i class="ti-heart"></i></a>
                                    </div>

                                    <div class="list-posts-share">
                                        <a target="_blank" rel="nofollow" href="#"><i class="ti-facebook"></i></a>
                                        <a target="_blank" rel="nofollow" href="#"><i class="ti-twitter"></i></a>
                                        <a target="_blank" rel="nofollow" href="#"><i class="ti-pinterest"></i></a>
                                        <a target="_blank" rel="nofollow" href="#"><i class="ti-linkedin"></i></a>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="post-author d-flex my-5">
                            <div class="author-img">
                                <img alt="" src="images/author.jpg" class="avatar avatar-100 photo" width="100"
                                    height="100">
                            </div>

                            <div class="author-content pl-4">
                                <h4 class="mb-3"><a href="#" title="" rel="author" class="text-capitalize">{{ post.user.name
                                }}</a>
                                </h4>
                                <p>Hey there. My name is Liam. I was born with the love for traveling. I also love taking
                                    photos with my phone in order to capture moment..</p>

                                <a target="_blank" class="author-social" href="#"><i class="ti-facebook"></i></a>
                                <a target="_blank" class="author-social" href="#"><i class="ti-twitter"></i></a>
                                <a target="_blank" class="author-social" href="#"><i class="ti-google-plus"></i></a>
                                <a target="_blank" class="author-social" href="#"><i class="ti-instagram"></i></a>
                                <a target="_blank" class="author-social" href="#"><i class="ti-pinterest"></i></a>
                                <a target="_blank" class="author-social" href="#"><i class="ti-tumblr"></i></a>
                            </div>
                        </div>
                        <nav class="post-pagination clearfix border-top border-bottom py-4">
                            <div class="prev-post" v-if="next">
                                <Link :href="route('post.details', next)">
                                <span class="text-uppercase font-sm letter-spacing">Next</span>
                                <h4 class="mt-3"> {{ next.title }}</h4>
                                </Link>
                            </div>
                            <div class="next-post" v-if="previous">
                                <Link :href="route('post.details', previous)">
                                <span class="text-uppercase font-sm letter-spacing">Previous</span>
                                <h4 class="mt-3">{{ previous.title }}</h4>
                                </Link>
                            </div>
                        </nav>

                        <div class="comment-area my-5">
                            <h3 class="mb-4 text-center">{{ post.comments.length }} Comments</h3>
                            <div class="comment-area-box media" v-for="comment in post.comments">
                                <img alt="" src="images/blog-user-2.jpg" class="img-fluid float-left mr-3 mt-2">

                                <div class="media-body ml-4">
                                    <h4 class="mb-0">{{ comment.user.name }} </h4>
                                    <span class="date-comm font-sm text-capitalize text-color"><i
                                            class="ti-time mr-2"></i>{{ comment.created_at }} </span>

                                    <div class="comment-content mt-3">
                                        <p>
                                            {{ comment.body }}
                                        </p>
                                    </div>
                                    <div class="comment-meta mt-4 mt-lg-0 mt-md-0">
                                        <a href="#" class="text-underline ">Reply</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <Comment :postid="post.id" />

                    </div>
                    <SharedSection />
                </div>
            </div>
        </section>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="LoginForm">
                            <div class="mb-3">
                                <label for="email">Email :</label>
                                <input type="email" name="email" autofocus id="email" class="form-control" required
                                    v-model="form.email">
                                <span>{{ form.errors.email }}</span>
                            </div>
                            <div class="mb-3">
                                <label for="password">Password :</label>
                                <input type="password" name="password" class="form-control" required
                                    v-model="form.password">
                                <span>{{ form.errors.password }}</span>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </LandingLayouts>
</template>
<script setup>
import { Head, Link, useForm, router } from '@inertiajs/vue3';
import LandingLayouts from '../../../Layouts/LandingLayouts.vue';
import SharedSection from '../shared/Trending.vue';
import Comment from './Comment.vue';

function submit() {
    router.post('/users', form)
}

defineProps({
    post: {
        type: Array,
    },
    next: {
        type: Array,
    },
    previous: {
        type: Array,
    },
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const CommentForm = useForm({
    body: '',
});

const LoginForm = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>
