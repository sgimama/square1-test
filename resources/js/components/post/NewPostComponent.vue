<template>
<Loader v-if="isLoading"/>
  <div class="min-h-screen items-center">
    <section class="space-y-8 px-8 my-8">
      <div
        class="rounded-md shadow-sm flex items-center justify-center bg-white py-12 px-4 sm:px-6 lg:px-8"
      >
        <div class="max-w-md w-full space-y-4">
          <div>
            <h2 class="m-0 text-center text-3xl font-extrabold text-gray-900">
              Create new post
            </h2>
          </div>
          <form class="mt-8 space-y-6" @submit.prevent="newPost">
            <input type="hidden" name="remember" value="true" />
            <div class="rounded-md shadow-sm space-y-4">
              <div class="space-y-3">
                <label for="name" class="text-lg">Title</label>
                <input
                  id="name"
                  v-model="title"
                  name="name"
                  type="text"
                  autocomplete="name"
                  required
                  class="mb-4 rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                />
              </div>
              <div class="space-y-2">
                <label for="description" class="text-lg">Description</label>
                <textarea
                  id="description"
                  v-model="description"
                  rows="5"
                  name="description"
                  autocomplete="current-description"
                  required
                  class="mb-4 rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                />
              </div>
            </div>
            <div>
              <button
                type="submit"
                class="group text-lg relative flex justify-center py-2 px-4 border border-transparent font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
              >
                Create
              </button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { ref, computed } from "vue";
import { postData } from "../../hooks/api";
import { Localit } from "localit";
import Loader from '../ui/Loader';

export default {
  setup() {
    const store = new Localit();
    const title = ref("");
    const description = ref("");
    const isLoading = ref(false);

    const newPost = async (evt) => {
      isLoading.value = true;
      const params = new FormData();
      params.append("title", title.value);
      params.append("description", description.value);
      params.append("user_id", store.get("user").id);

      const response = await postData("/api/auth/post/create", params);
      isLoading.value = false;
      window.location = "/";
    };

    return { title, description, newPost };
  },
  components:{
    Loader,
  }
};
</script>
