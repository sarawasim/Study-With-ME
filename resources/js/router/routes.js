const routes = [
    {
        path: "/",
        component: () => import("../pages/Dashboard.vue"),
        name: "dashboard",
    },
    {
        path: "/about",
        component: () => import("../pages/About.vue"),
        name: "about",
    },
    {
        path: "/register",
        component: () => import("../pages/Register.vue"),
        name: "register",
    },
];

export default routes;
