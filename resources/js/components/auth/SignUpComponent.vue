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
              Create new account
            </h2>
          </div>
          <form class="mt-8 space-y-6" @submit.prevent="signUp">
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
                <label for="email" class="sr-only">Email</label>
                <input
                  id="email"
                  v-model="email"
                  name="email"
                  type="email"
                  autocomplete="email"
                  required
                  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                  placeholder="Email"
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
                Sign up
              </button>
            </div>
          </form>
        </div>
      </div>
     <div
        v-if="messageError"
        class="rounded-md shadow-sm flex items-center justify-center bg-red-400 py-3 px-4 sm:px-6 lg:px-8"
      >
        <p class="text-white text-lg">{{messageError}}</p>
      </div>
    </section>
  </div>
</template>


<script>
import { ref } from "vue";
import { postData } from "../../hooks/api";
import Loader from '../ui/Loader';
import { Localit } from 'localit';

export default {
    setup() {
    const isLoading = ref(false);
    const name = ref("");
    const password = ref("");
    const email = ref("");
    const messageError = ref("");
    const store = new Localit();

    const signUp = async (evt) => {
      messageError.value = '';
      isLoading.value = true;

      const params = new FormData();
      params.append("name", name.value);
      params.append("password", password.value);
      params.append("email", email.value);

      const response = await postData("/api/auth/signup", params);
      console.log(response);
      if(response.message == 'ok'){
        const responseLogin = await postData("/api/auth/login", params);
        if(responseLogin.message){
          messageError.value = responseLogin.message;
          isLoading.value = false;
        } 
        if(responseLogin.access_token){
          store.set('token',`${responseLogin.token_type} ${responseLogin.access_token}`);
          store.set('user',responseLogin.user);
          window.location = "/";
        }    
      } 
    };

    return { name, password, email, signUp, messageError, isLoading};
  },
  components:{
    Loader,
  }
};
</script>