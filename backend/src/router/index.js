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
import UserList from "@/components/users/index"
import UserForm from "@/components/users/form"

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
            meta: {
                requiresAuth: true,
            }
        },
        {
            path: '/category/create',
            name: 'create-category',
            component: CategoryForm,
            meta: {
                requiresAuth: true,
            }
        },
        {
            path: '/category/edit/:id',
            name: 'edit-category',
            component: CategoryForm,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/product',
            name: 'product',
            component: ProductList,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/product/create',
            name: 'create-product',
            component: ProductForm,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/product/edit/:id',
            name: 'edit-product',
            component: ProductForm,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/order',
            name: 'order',
            component: OrderList,
            meta: {
                requiresAuth: true,
            }
        },
        {
            path: '/login',
            name: 'auth.login',
            component: LoginForm,
        },
        {
            path: '/user',
            name: 'user',
            component: UserList,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/user/create',
            name: 'create-user',
            component: UserForm,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/user/edit/:id',
            name: 'edit-user',
            component: UserForm,
            meta: {
                requiresAuth: true
            }
        },
    ]
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!authService.isLoggedIn()) {
            console.log('to1', to)
            next({
                path: '/login',
                query: {redirect: to.fullPath}
            })
        } else {
            next()
        }
    } else if (to.name === 'auth.login' && authService.isLoggedIn()) {
        console.log('LoggedIn')
        next({
            path: sessionStorage.getItem('pathCurrentRouter'),
        })
    } else {
        next() // make sure to always call next()!
    }
})

export default router;
