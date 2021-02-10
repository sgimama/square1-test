import { createApp } from "vue";
import SignUp from "../components/auth/SignUpComponent.vue";

createApp({
    name: "SignUpComponent",
    components: {
        signUp: SignUp,
    },
}) .mount("#app");
