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
</template>

<script>
export default {
    name: "app-aside"
}
</script>

<style scoped>

</style>
