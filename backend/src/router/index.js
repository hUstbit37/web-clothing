/* eslint-disable */
import Vue from "vue";
import VueRouter from "vue-router";
import Dashboard from "@/components/Dashboard";
import ProductList from "@/components/products/index";
import ProductForm from "@/components/products/form"
import CategoryList from "@/components/categories/index"
import CategoryForm from "@/components/categories/form"
import OrderList from "@/components/orders/index"
import LoginForm from "@/components/auth/login"
import {authService} from "@/services/auth";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'dashboard',
            component: Dashboard,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/category',
            name: 'category',
            component: CategoryList,
        },
        {
            path: '/category/create',
            name: 'create-category',
            component: CategoryForm
        },
        {
            path: '/category/edit/:id',
            name: 'edit-category',
            component: CategoryForm
        },
        {
            path: '/product',
            name: 'product',
            component: ProductList
        },
        {
            path: '/product/create',
            name: 'create-product',
            component: ProductForm
        },
        {
            path: '/product/edit/:id',
            name: 'edit-product',
            component: ProductForm
        },
        {
            path: '/order',
            name: 'order',
            component: OrderList,
        },
        {
            path: '/login',
            name: 'auth.login',
            component: LoginForm,
        },
    ]
});
// const originalPush = VueRouter.prototype.push
// VueRouter.prototype.push = function push (location, onResolve, onReject) {
//     if (onResolve || onReject) return originalPush.call(this, location, onResolve, onReject)
//     return originalPush.call(this, location).catch(err => err)
// }
router.beforeEach((to, from, next) => {

    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!authService.isLoggedIn()) {
            next({
                path: '/login',
                query: { redirect: to.fullPath }
            })
        } else {
            next()
        }
    } else {
        next() // make sure to always call next()!
    }
})

export default router;
