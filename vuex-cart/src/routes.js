import Home from "./pages/Home.vue";
import Product from "./pages/Product.vue";

export default [
    {
        path: (process.env.NODE_ENV === 'production'? '/vue_js_playground/vuex-cart/dist/': '/'),
        component: Home,
        name: 'home'
    },
    {
        path: (process.env.NODE_ENV === 'production'? '/vue_js_playground/vuex-cart/dist/': '/')+'product/:id',
        component: Product,
        name: 'product',
        props: true
    }
]