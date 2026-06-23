import { createRouter, createWebHashHistory } from "vue-router";
const Home = () => import("@/components/Home.vue");
const Register = () => import("@/components/auth/Register.vue");
const Login = () => import("@/components/auth/Login.vue");

const router = createRouter({
    history: createWebHashHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: "/",
            name: "home",
            component: Home,
        },
        {
            path: "/register",
            name: "register",
            component: Register,
        },
        {
            path: "/login",
            name: "login",
            component: Login,
        },
    ],
});

export default router;
