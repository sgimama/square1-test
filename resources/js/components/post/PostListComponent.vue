<template>
  <button @click="() => posts.reverse()" 
    class="outline-none text-white bg-red-600 border-0 p-2 rounded m-8 mb-0 text-lg ">
    Sort by date
    </button>
  <Loader v-if="isLoading"/>
  <section class="min-h-screen space-y-8 px-8 my-8">
    <Post v-for="post of posts" :data="post" />
  </section>
</template>

<script>

import Post from "./PostComponent.vue";
import { getData , postData } from "../../hooks/api";
import { ref, onMounted } from "vue";
import { Localit } from 'localit';
import Loader from '../ui/Loader';

export default {
  setup(props) {
    const store = new Localit();
    const posts = ref([]);
    const isLoading = ref(false);
    
    const getPosts = async () => {
      isLoading.value = true;
      let response = {};

      if(props.mypost && store.get('token')){
        const params = new FormData();
        params.append("user_id", store.get('user').id);
        response = await postData("/api/auth/posts", params);
        
      }else{
       response = await getData("/posts");
      }

      posts.value = response.posts;
      isLoading.value = false;
    };

    onMounted(() => getPosts());

    return { posts, isLoading };
  },
  components: {
    Post,
    Loader,
  },
  props:{
      mypost: {
          type: Boolean,
      }
  }
};
</script>