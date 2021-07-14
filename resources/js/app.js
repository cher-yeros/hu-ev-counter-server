require("./bootstrap");

window.Vue = require("vue");

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component(
    "home-graph",
    require("./components/Admin/HomeGraph.vue").default
);

Vue.component("tesebakis", require("./components/Admin/Tesebakis.vue").default);
Vue.component(
    "sebaki-request",
    require("./components/Admin/SebakiRequest.vue").default
);

Vue.component("my-profile", require("./components/Admin/Profile.vue").default);
Vue.component("admin-home", require("./components/Admin/Home.vue").default);
Vue.component(
    "admin-navbar",
    require("./components/Admin/AdminNavbar.vue").default
);
Vue.component(
    "admin-sidebar",
    require("./components/Admin/AdminSidebar.vue").default
);

Vue.component(
    "activity-log",
    require("./components/Admin/Activities.vue").default
);
Vue.component(
    'yesemu-list',
    require('./components/Admin/Yesemu.vue').default
);
const app = new Vue({
    el: "#app"
});
