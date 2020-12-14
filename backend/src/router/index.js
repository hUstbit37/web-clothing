/* eslint-disable */
import Vue from "vue";
import VueRouter from "vue-router";
import Dashboard from "@/components/Dashboard";
import ProductList from "@/components/products/index";
import ProductForm from "@/components/products/form"
import CategoryList from "@/components/categories/index"
import CategoryForm from "@/components/categories/form"

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'dashboard',
            component: Dashboard
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
    ]
});
export default router;
