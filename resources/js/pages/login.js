import { createApp } from "vue";
import Login from "../components/auth/LoginComponent.vue";

createApp({
    name: "LoginComponent",
    components: {
        login: Login,
    },
}).mount("#app");
