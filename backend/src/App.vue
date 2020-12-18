<template>
    <div id="app">
        <app-header/>
        <el-container>
            <app-aside/>
            <el-main>
                <router-view/>
            </el-main>
        </el-container>
    </div>
</template>

<script>

import AppHeader from "@/components/layout/header";
import AppAside from "@/components/layout/aside";

export default {
    name: "app",
    components: {
        AppAside,
        AppHeader,
    }

};
</script>

<style>
* {
    margin: 0;
    padding: 0;
}

#app {
    position: relative;
    font-family: Helvetica Neue, Helvetica, PingFang SC, Hiragino Sans GB, Microsoft YaHei, Arial, sans-serif;
}

.el-header {
    background-color: #304156;
    color: #FFFFFF;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 5999;
}

.el-aside {
    position: fixed;
    left: 0;
    top: 60px;
    background-color: #304156;
    border-right: 1px solid #E9EEF3;
    height: 100%;
}

.el-aside ul > li {
    background-color: #304156 !important;
}

.el-aside ul li:hover {
    padding-left: 25px !important;
    transition: 0.8s;
}

.el-pagination.is-background .el-pager li:not(.disabled).active {
    background-color: #40c9c6 !important;
}

.el-menu {
    border-right: none !important;
}

.el-menu-item.is-active {
    padding-left: 25px !important;
    font-weight: 600;
}

.el-main {
    margin-top: 60px;
    margin-left: 200px;
    background-color: #E9EEF3;
    color: #333;
    padding: 0 !important;
}

.el-breadcrumb {
    background-color: #40c9c6;
    padding: 15px;
}

.el-breadcrumb__inner a, .el-breadcrumb__inner.is-link, .el-breadcrumb__inner {
    color: #ffffff !important;
}

.el-pagination {
    float: right;
    padding: 10px !important;
}

.el-icon-s-marketing, .el-icon-menu, .el-icon-s-goods,
.el-icon-shopping-cart-full, .el-icon-user-solid {
    color: #40c9c6 !important;
    border: 1px solid #40c9c6;
    border-radius: 5px;
}
</style>
