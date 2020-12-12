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
                    <el-avatar src="https://cube.elemecdn.com/0/88/03b0d39583f48206768a7534e55bcpng.png"></el-avatar>
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
                    default-active="$route.path"
                    background-color="#545c64"
                    text-color="#FFF"
                    active-text-color="#ffd04b">
                    <el-menu-item index="category" :route="{ name: 'category'}">
                        <i class="el-icon-menu"></i>
                        <span>Quản lý danh mục</span>
                    </el-menu-item>
                    <el-menu-item index="product" :route="{ name: 'product'}">
                        <i class="el-icon-s-goods"></i>
                        <span>Quản lý sản phẩm</span>
                    </el-menu-item>
                    <el-menu-item index="order" :route="{ name: 'order'}">
                        <i class="el-icon-s-order"></i>
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

};
</script>

<style>
* {
    margin: 0;
    padding: 0;
}

.el-header {
    background-color: #B3C0D1;
    color: #333;
    position: relative;
    /*text-align: center;*/
    /*line-height: 60px;*/
}

.el-aside {
    background-color: #545c64;
    border-right: 1px solid #E9EEF3;
}

.el-aside ul li:hover {
    padding-left: 25px !important;
    transition: 0.8s;
}

.el-menu {
    border-right: none !important;
}

.el-main {
    background-color: #E9EEF3;
    color: #333;
    padding: 0 !important;
}

.el-breadcrumb__inner a, .el-breadcrumb__inner.is-link, .el-breadcrumb__inner {
    color: #ffffff !important;
}

.el-pagination {
    float: right;
    padding: 10px !important;
}
</style>
