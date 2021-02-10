import { createApp } from "vue";
import Sidebar from "../components/layout/SidebarComponent.vue";

createApp({
    name: "SidebarComponent",
    components: {
        sidebar: Sidebar,
    },
}).mount("#sidebar");
