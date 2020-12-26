<template>
    <div id="app">
        <app-header :isLoggedIn="isLoggedIn()"/>
        <el-container>
            <transition name="fade" mode="out-in">
            <app-aside v-if="isLoggedIn()"/>
            </transition>
            <el-main :style="{ marginLeft: marginLeftLoggedIn()}">
                <transition name="fade" mode="out-in">
                    <router-view :key="isLoggedIn()"></router-view>
                </transition>
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

        }
    },

    methods: {
        marginLeftLoggedIn() {
          if (!authService.isLoggedIn()){
              return 0
          }
          return null
        },
        isLoggedIn() {
            return authService.isLoggedIn()
        }
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


.fade-enter{
    opacity: 0;
    transform: translateX(-2em);
}
.fade-leave-to {
    opacity: 0;
    transform: translateX(2em);
}

  .fade-enter-active, .fade-leave-active {
    transition: all .3s ease;

}

.el-main {
    overflow: hidden !important;
    margin-top: 60px;
    margin-left: 200px;
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
.messageClass {
    z-index: 9999 !important;
}

</style>
