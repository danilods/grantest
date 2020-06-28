import Vue from "vue";
import VueRouter from "vue-router";

import App from "../components/App.vue";

import BancasComponent from "../components/admin/pages/bancas/BancasComponent.vue";
import DashboardComponent from "../components/admin/pages/dashboard/DashboardComponent.vue";

Vue.use(VueRouter);

const routes = [
    {
        path: "/admin",
        component: App,
        children: [
            {
                path: "/bancas",
                component: BancasComponent,
                name: "admin.bancas"
            },
            { path: "", component: DashboardComponent, name: "admin.dashboard" }
        ]
    }
];

const router = new VueRouter({
    routes
});

export default router;
