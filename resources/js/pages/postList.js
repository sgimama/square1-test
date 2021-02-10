import { createApp } from "vue";
import PostList from "../components/post/PostListComponent.vue";

createApp({
    name: "PostListComponent",
    components: {
        post_list: PostList,
    },
}).mount("#app");
