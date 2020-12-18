<template>
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
</template>

<script>
export default {
name: "app-header"
}
</script>

<style scoped>

</style>
