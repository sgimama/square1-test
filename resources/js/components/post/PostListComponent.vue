<template>
  <button @click="() => posts.reverse()" 
    class="outline-none text-white bg-red-600 border-0 p-2 rounded m-8 mb-0 text-lg ">
    Sort by date</button>
  <section class="min-h-screen space-y-8 px-8 my-8">
    <Post v-for="post of posts" :data="post" />
  </section>
</template>

<script>
import Post from "./PostComponent.vue";
import { getData } from "../../hooks/api";
import { ref, onMounted } from "vue";
export default {
  setup() {
    const posts = ref([]);
    const getPosts = async () => {
      const params = {
        orderBy: "desc",
      };
      const response = await getData("/post", params);
      posts.value = response.posts;
    };

    onMounted(() => getPosts());

    return { posts };
  },
  components: {
    Post,
  },
};
</script>