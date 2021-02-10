<template>
  <div class="min-h-screen items-center">
    <section class="space-y-8 px-8 my-8">
      <div
        class="rounded-md shadow-sm flex items-center justify-center bg-white py-12 px-4 sm:px-6 lg:px-8"
      >
        <div class="max-w-md w-full space-y-4">
          <div>
            <h2 class="m-0 text-center text-3xl font-extrabold text-gray-900">
              Sign in to your account
            </h2>
          </div>
          <form class="mt-8 space-y-6" @submit.prevent="login">
            <input type="hidden" name="remember" value="true" />
            <div class="rounded-md shadow-sm -space-y-px">
              <div>
                <label for="name" class="sr-only">Name</label>
                <input
                  id="name"
                  v-model="name"
                  name="name"
                  type="text"
                  autocomplete="name"
                  required
                  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                  placeholder="Name"
                />
              </div>
              <div>
                <label for="password" class="sr-only">Password</label>
                <input
                  id="password"
                  v-model="password"
                  name="password"
                  type="password"
                  autocomplete="current-password"
                  required
                  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                  placeholder="Password"
                />
              </div>
            </div>
            <div>
              <button
                type="submit"
                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
              >
                Sign in
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
import { getData, postData } from "../../hooks/api";
import { Localit } from 'localit';

export default {
  setup() {
    const name = ref("");
    const password = ref("");
    const store = new Localit();

    const login = async (evt) => {
      const params = new FormData();
      params.append("name", name.value);
      params.append("password", password.value);
      const response = await postData("/api/auth/login", params);
      console.log(response);
      if(response.access_token){
        store.set('token',`${response.token_type} ${response.access_token}`);
        store.set('user',response.user);
        window.location = "/home";
      }

    };

    return { name, password, login };
  },
};
</script>
