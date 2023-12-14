<template>
    <form class="comment-form mb-5 gray-bg p-5" @submit.prevent="AddComment(postid)" id="comment-form"
        v-if="$page.props.auth.user !== null">
        <h3 class="mb-4 text-center">Leave a comment {{ CommentForm }} </h3>
        <div class="row">
            <div class="col-lg-12">
                <textarea class="form-control mb-3" name="comment" id="comment" cols="30" rows="5" 
                    v-model="CommentForm.body" placeholder="Comment"></textarea>
                <span class="text-danger">{{ CommentForm.errors.body }}</span>

            </div>
        </div>

        <input class="btn btn-primary" type="submit" name="submit-contact" id="submit_contact" value="Submit Message">
    </form>
    <div class="sidebar-widget subscribe mb-5" v-else>
        <h4 class="text-center widget-title">please login to Add Comment </h4>
        <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary d-block mt-3">Sign
            Up</button>
    </div>
</template>

<script setup>
import { Head, Link, useForm, router } from '@inertiajs/vue3';

defineProps({
    postid: {
        type: Number,
    },
});
const CommentForm = useForm({
    body: "",
    post_id: null,
});

function AddComment(PostId) {
    CommentForm.post_id = PostId;
    router.post('/AddComment', CommentForm);
}
</script>

