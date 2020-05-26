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

import store from "../store";

// Add a response interceptor
Api.interceptors.response.use(function (response) {
    if(typeof response.data!='object')
    store.dispatch('addNotification', {
        type: 'danger',
        message: response.config.url+' -> statusText:'+response.statusText+',Code:'+response.status+', returned:'+(typeof response.data)+' instead of Object'
    }, { root: true });
    return response;
  }, function (error) {
    // Any status codes that falls outside the range of 2xx cause this function to trigger
    if (error.response) {
        store.dispatch('addNotification', {
            type: 'danger',
            message: 'ERR1) '+error
        }, { root: true });
    } else if (error.request) {
        // client never received a response, or request never left
        store.dispatch('addNotification', {
            type: 'danger',
            message: 'ERR2) Cannot reach API('+error.config.method+' '+error.config.baseURL+'): '+error
        }, { root: true });
    } else {
        // anything else
        store.dispatch('addNotification', {
            type: 'danger',
            message: 'ERR3) '+error
        }, { root: true });
    }
    return Promise.reject(error);
  });

export default Api;