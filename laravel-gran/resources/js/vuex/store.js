import Vue from 'vue';
import Vuex from 'vuex';

import Bancas from './modules/bancas/bancas';

Vue.use(Vuex);

export default store = new Vuex.Store({
    modules: {
        bancas: Bancas
    }
})
