import Vue from "vue";
import App from "./App.vue";
import VueMaterial from 'vue-material';
import 'vue-material/dist/vue-material.min.css'
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import VueFormulate from '@braid/vue-formulate'

import VueRouter from "vue-router";
import routes from "./routes";


Vue.use(VueFormulate)
// Install BootstrapVue
Vue.use(VueMaterial);
// Optionally install the BootstrapVue icon components plugin
Vue.use(VueRouter);

const router = new VueRouter({
  mode: 'history',
  routes,
  linkActiveClass: "active", // active class for non-exact links.

});

new Vue({
  router,
  el: "#app",
  render: h => h(App)
});
