require("./bootstrap");
window.Vue = require("vue");
import { createApp } from "vue";

import router from "./router/index";
import App from "./App.vue";

const app = createApp({});

app.use(router);

// give the vue component a name for use
app.component("app", App);
app.component("video-chat", require("./components/VideoChat.vue").default);

// insert Vue app to the div with id #app in the blade view
app.mount("#app");

// createApp({
//     components: { App },
// }).mount("#app");
