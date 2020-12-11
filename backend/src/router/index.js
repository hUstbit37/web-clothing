/* eslint-disable */
import Vue from "vue";
import VueRouter from "vue-router";
import HelloWorld from "@/components/HelloWorld";
import ProductList from "@/components/products/index";
import CreateProduct from "@/components/products/create-product"
import CategoryList from "@/components/categories/index"
import CategoryForm from "@/components/categories/form"
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'HelloWorld',
            component: HelloWorld
        },
        {
            path: '/category',
            name: 'category',
            component: CategoryList
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
            component: CreateProduct
        },
    ]
});
export default router;
