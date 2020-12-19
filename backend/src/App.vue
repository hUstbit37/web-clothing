<template>
    <div id="app">
        <app-header :isLoggedIn="isloggedIn"/>
        <el-container>
            <app-aside v-if="isloggedIn"/>
            <el-main :style="{ marginLeft: marginLeftNotLogin }">
                <router-view/>
            </el-main>
        </el-container>
    </div>
</template>

<script>

import AppHeader from "@/components/layout/header";
import AppAside from "@/components/layout/aside";
import {authService} from "@/services/auth";

export default {
    name: "app",
    data() {
        return {
            isloggedIn: null,
            marginLeftNotLogin: null
        }
    },

    mounted() {
        this.isloggedIn = authService.isLoggedIn()
    },
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
    font-family: "Popines", sans-serif;
}

.el-main {
    margin-top: 60px;
    margin-left: 200px;
    /*background-color: #E9EEF3;*/
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

.el-pagination.is-background .el-pager li:not(.disabled).active {
    background-color: #40c9c6 !important;
}

</style>
