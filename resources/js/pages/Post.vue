<template>
    <div class="container mt-3">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col">
                <div class="card">
                    <img
                        v-if="post.image"
                        :src="'/storage/' + post.image"
                        class="card-img-top"
                        :alt="post.title"
                    />
                    <img
                        v-else
                        src="/storage/uploads/default.png"
                        class="card-img-top"
                        :alt="post.title"
                    />
                    <div class="card-body">
                        <h5 class="card-title">{{ post.title }}</h5>
                        <p class="card-text">{{ post.content }}</p>
                    </div>
                </div>
                <router-link class="btn btn-success mt-2" :to="{ name: 'home' }"
                    >Home</router-link
                >
                <router-link
                    class="btn btn-success mt-2"
                    :to="{ name: 'posts' }"
                    >All Posts</router-link
                >
            </div>
        </div>
    </div>
</template>

<script>
import Axios from "axios";
export default {
    name: "Post",
    props: ["id"],
    data() {
        return {
            post: [],
        };
    },
    created() {
        const url = "http://127.0.0.1:8000/api/v1/posts/" + this.id;
        this.getPost(url);
    },

    methods: {
        getPost(url) {
            Axios.get(url, {
                headers: { Authorization: "Bearer 1234abcd" },
            }).then((result) => {
                this.post = result.data.results.data;
            });
        },
    },
};
</script>

<style></style>
