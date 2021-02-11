import { createApp } from "vue";
import SignUp from "../components/auth/SignUpComponent.vue";

createApp({
    name: "SignUpComponent",
    components: {
        signup: SignUp,
    },
}) .mount("#app");
