<template>
<div class="sticky top-0">
    <h1 class="text-xl my-8 px-4">
        <span class="sr-only">Square1 Blog</span>
        <div class="w-48">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 163.82 30.69">
                <g data-name="Layer 2">
                    <g data-name="Layer 1">
                        <path d="M17.36 2.87l-3.69 4.05c-1.95-1.14-3.35-1.72-4.2-1.72a2.25 2.25 0 00-1.7.8 2.45 2.45 0 00-.72 1.77c0 1.36 1.23 2.53 3.7 3.53a25.07 25.07 0 014.09 2.09 7.41 7.41 0 012.32 2.59 7.12 7.12 0 01.93 3.59 8.14 8.14 0 01-2.86 6.18 9.69 9.69 0 01-6.77 2.62c-2.86 0-5.67-1.35-8.46-4l3.91-4.56c1.74 1.8 3.38 2.71 4.9 2.71a3 3 0 002.07-1 2.79 2.79 0 001-2q0-2.16-4.55-3.8a14.45 14.45 0 01-3.7-1.78 6.18 6.18 0 01-1.83-2.41A7.38 7.38 0 011 8.25a7.88 7.88 0 012.39-6A8.67 8.67 0 019.68 0a10.86 10.86 0 017.68 2.87zm28.11 21.37l3.4 3.91-4 2.54L41.78 27a18.45 18.45 0 01-6.24 1.28 13.28 13.28 0 01-10-4.06 14.4 14.4 0 01-3.94-10.47 13.81 13.81 0 013.81-9.48A12.92 12.92 0 0135.5 0a13.4 13.4 0 019.89 4 13.49 13.49 0 014 9.93 14.39 14.39 0 01-4 10.24zm-7.58-1.8L35 19l3.9-2.55 2.67 3.16a7.65 7.65 0 001.63-5.29 9.24 9.24 0 00-2.1-6.39 7 7 0 00-5.6-2.39A7.13 7.13 0 0030 7.9a8.72 8.72 0 00-2.16 6.1 9.4 9.4 0 002.05 6.24 6.49 6.49 0 005.21 2.45 18 18 0 002.79-.25zM54.48.37h5.85v16.86A5.38 5.38 0 0061.64 21a4.41 4.41 0 003.42 1.43A4.93 4.93 0 0068.84 21a5.7 5.7 0 001.34-4.06V.37H76v17.85a11.3 11.3 0 01-1.2 4.88 8.37 8.37 0 01-3.75 3.9 11.83 11.83 0 01-5.66 1.35c-3.77 0-6.54-1.05-8.29-3.16a10.26 10.26 0 01-2.62-6.64V.37zm35.32 0h4.59l11.26 27.57h-6l-2.26-5.42H86.87l-2.16 5.42h-5.94L89.8.37zm2.3 9l-3.21 8.13h6.53L92.1 9.4zm17.83-9H119a9.37 9.37 0 016.54 2.19 7.57 7.57 0 012.4 5.9 10.17 10.17 0 01-1.1 4.4 7.65 7.65 0 01-4.06 3.59l7.7 11.49h-6.8l-7.14-10.66h-.67v10.66h-5.94V.37zm6 4.92v7.18h1.28q4.64 0 4.64-3.8a2.92 2.92 0 00-1.21-2.47 5.42 5.42 0 00-3.35-.91zm19.3-4.92h15.52v5.46h-9.58v16.65h13.6v5.46h-19.54V.37zm17 11.1h-5.38v5.37h5.38v-5.37z" fill="#fff" />
                        <path fill="#ed1c24" d="M154.45.37h9.37v27.57h-5.85V5.83h-4.54l1.02-5.46z" />
                    </g>
                </g>
            </svg>
        </div>
    </h1>

    <div class="flex flex-col mb-6 px-4 space-y-4 text-xl">

        <a href="/" class="text-white no-underline hover:text-red-500 transition">Home</a>
        
        <template v-if="isLogin">
            <a href="/my-posts" class="text-white no-underline hover:text-red-500 transition">My posts</a>
            <a href="/post/create" class="text-white no-underline hover:text-red-500 transition">New post</a>
            <button @click="logout()" class="outline-none text-white bg-red-600 border-0 p-2 rounded mb-0 text-lg ">Logout</button>
        </template>
        <template v-else>
            <a href="/login" class="text-white no-underline hover:text-red-500 transition">Login</a>
            <a href="/sign-up" class="text-white no-underline hover:text-red-500 transition">Sign up</a>
        </template>
    </div>

</div>
</template>

<script>

import { Localit } from 'localit';
import { ref } from "vue";
import { getDataWithToken , postData} from "../../hooks/api";
export default {
    setup(){
        const store = new Localit();
        const userId = ref(0);
        let isLogin = ref(false);

        if(store.get('token')){
            isLogin.value = true;
            userId.value = store.get('user').id;
        }

        const logout = async () => {
            const response = await postData("/api/auth/logout");
            if(response.message == 'ok') {
                store.remove('token');
                store.remove('user');
                isLogin.value = false;
                window.location = "/";
            }
        };

         return { isLogin, logout, userId };
    }
}
</script>