<template>
    <div id="app">
        <el-header>Admin</el-header>
        <el-container>
            <el-aside width="200px">
                <el-menu
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
                        <i class="el-icon-menu"></i>
                        <span>Quản lý sản phẩm</span>
                    </el-menu-item>
                    <el-menu-item>
                        <i class="el-icon-menu"></i>
                        <span>Quản lý đơn hàng</span>
                    </el-menu-item>
                    <el-menu-item>
                        <i class="el-icon-menu"></i>
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
    text-align: center;
    line-height: 60px;
}

.el-aside {
    background-color: #545c64;
    border-right: 1px solid #E9EEF3;
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
</style>
