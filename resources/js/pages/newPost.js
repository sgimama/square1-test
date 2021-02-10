import { createApp } from "vue";
import NewPost from "../components/post/NewPostComponent.vue";

createApp({
    name: "NewPostComponent",
    components: {
        new_post: NewPost,
    },
}).mount("#app");
