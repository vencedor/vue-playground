import axios from "axios";
axios.defaults.withCredentials = true;
const Api = axios.create({
    baseURL: 'http://js.local/vue_js_playground/vuex-cart/api-php/'
    ,withCredentials:true
    ,headers: {
        'Upgrade-Insecure-Requests': '1'
        ,'content-type': 'application/x-www-form-urlencoded'
        ,'Access-Control-Allow-Credentials': 'true'
    }
});

export default Api;