<template>
    <el-aside width="200px">
        <el-menu
            class="el-menu-vertical-demo"
            :router="true"
            :default-active="$route.name"
            background-color="#545c64"
            text-color="#FFF"
            active-text-color="#40c9c6">
            <el-menu-item index="dashboard" :route="{ name: 'dashboard'}">
                <i class="el-icon-s-marketing aside-icon"></i>
                <span>Dashboard</span>
            </el-menu-item>
            <el-menu-item index="category" :route="{ name: 'category'}">
                <i class="el-icon-menu aside-icon"></i>
                <span>Quản lý danh mục</span>
            </el-menu-item>
            <el-menu-item index="product" :route="{ name: 'product'}">
                <i class="el-icon-s-goods aside-icon"></i>
                <span>Quản lý sản phẩm</span>
            </el-menu-item>
            <el-menu-item index="order" :route="{ name: 'order'}">
                <i class="el-icon-shopping-cart-full aside-icon"></i>
                <span>Quản lý đơn hàng</span>
            </el-menu-item>
            <el-menu-item index="user" :route="{ name: 'user'}">
                <i class="el-icon-user-solid aside-icon"></i>
                <span>Quản lý thành viên</span>
            </el-menu-item>
        </el-menu>
    </el-aside>
</template>

<script>
export default {
    name: "app-aside"
}
</script>

<style scoped>
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
.aside-icon {
    color: #40c9c6 !important;
    border: 1px solid #40c9c6;
    border-radius: 5px;
}
.el-menu {
    border-right: none !important;
}
.el-menu-item.is-active {
    padding-left: 25px !important;
    font-weight: 600;
}
</style>
