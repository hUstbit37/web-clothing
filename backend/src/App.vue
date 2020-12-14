<template>
    <div id="app">
        <el-header>
            <span
                style="position: absolute; top: 20px; font-size: 20px; cursor: pointer">
                <i class="el-icon-s-home"></i>
                Trang quản trị
            </span>
            <el-dropdown style="position: absolute; right: 50px; top: 10px;">
                <span class="el-dropdown-link">
                    <el-avatar
                        src="https://wpimg.wallstcn.com/f778738c-e4f8-4870-b634-56703b4acafe.gif?imageView2/1/w/80/h/80"></el-avatar>
                </span>
                <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item disabled>Hello Đức</el-dropdown-item>
                    <el-dropdown-item>Log Out</el-dropdown-item>
                </el-dropdown-menu>
            </el-dropdown>
        </el-header>
        <el-container>
            <el-aside width="200px">
                <el-menu
                    class="el-menu-vertical-demo"
                    :router="true"
                    :default-active="$route.name"
                    background-color="#545c64"
                    text-color="#FFF"
                    active-text-color="#40c9c6">
                    <el-menu-item index="dashboard" :route="{ name: 'dashboard'}">
                        <i class="el-icon-s-marketing"></i>
                        <span>Dashboard</span>
                    </el-menu-item>
                    <el-menu-item index="category" :route="{ name: 'category'}">
                        <i class="el-icon-menu"></i>
                        <span>Quản lý danh mục</span>
                    </el-menu-item>
                    <el-menu-item index="product" :route="{ name: 'product'}">
                        <i class="el-icon-s-goods"></i>
                        <span>Quản lý sản phẩm</span>
                    </el-menu-item>
                    <el-menu-item index="order" :route="{ name: 'order'}">
                        <i class="el-icon-shopping-cart-full"></i>
                        <span>Quản lý đơn hàng</span>
                    </el-menu-item>
                    <el-menu-item index="user" :route="{ name: 'user'}">
                        <i class="el-icon-user-solid"></i>
                        <span>Quản lý thành viên</span>
                    </el-menu-item>
                </el-menu>
            </el-aside>
            <el-main>
                <router-view/>
            </el-main>
        </el-container>
    </div>
</template>

<script>
export default {
    name: "app",
    created() {
        let route = this.$route
        let router = this.$router
        console.log('route', route)
        console.log('router', router)
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
