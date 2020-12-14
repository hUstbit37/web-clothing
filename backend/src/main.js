import Vue from 'vue'
import App from './App.vue'
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import locale from 'element-ui/lib/locale/lang/vi'
import axios from 'axios'
import router from "./router/index";

Vue.use(ElementUI, { locale });
window.axios = axios
axios.defaults.baseURL = 'http://127.0.0.1:8001'
axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-url'
axios.defaults.headers.common.Authorization = 'Bearer'

Vue.prototype.$axios = axios;
Vue.config.productionTip = false

new Vue({
    render: h => h(App),
    router,
}).$mount('#app')
