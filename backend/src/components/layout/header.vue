<template>
    <el-header>
        <span class="admin-title">
            <i class="el-icon-s-home"></i>
            Trang quản trị
        </span>
        <span @click="showRegister" v-if="!isLoggedIn" class="admin-register">Sign Up</span>
        <el-dropdown v-if="isLoggedIn" class="admin-dropdown">
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
    name: "app-header",
    props: ['isLoggedIn'],
    data() {
        return {

        }
    },
    methods: {
        showRegister() {
            this.$router.push('/register')
        }
    }
}
</script>

<style scoped>
.el-header {
    background-color: #304156;
    color: #FFFFFF;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 5999;
}

.admin-title {
    position: absolute;
    top: 20px;
    font-size: 20px;
    cursor: pointer
}
.admin-register {
    position: absolute;
    right: 50px;
    top: 35%;
    cursor: pointer;
    font-weight: 600;
}
.admin-register:hover {
    color: #40c9c6;
}

.admin-dropdown {
    position: absolute;
    right: 50px;
    top: 10px;
}
</style>
