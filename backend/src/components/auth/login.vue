<template>
    <div class="login">
        <div class="login-container">
            <h1 class="login-header">Đăng nhập</h1>
            <el-button class="login-social">
                <i class="fa fa-google login-social-icon"></i>
                <span class="login-social-text">Đăng nhập với Google</span>
            </el-button>
            <div class="login-or"><span>Hoặc</span></div>
            <el-form autocomplete="on" label-position="left" ref="loginForm" :model="user" :rules="rules">
                <el-form-item label="Email" prop="email">
                    <el-input class="login-input" v-model="user.email" placeholder="Eg: johndoe@gmail.com"></el-input>
                </el-form-item>
                <el-form-item label="Mật khẩu" prop="password">
                    <el-input show-password type="password" class="login-input" v-model="user.password"
                              placeholder="Eg: *******"></el-input>
                </el-form-item>
                <el-form-item>
                    <el-button class="login-submit" type="primary" @click="login('loginForm')" plain>Đăng nhập
                    </el-button>
                </el-form-item>
            </el-form>
            <div class="login-already">
                <span>Bạn chưa có tài khoản?</span>
                <a href="#">Đăng ký</a>
            </div>
        </div>
    </div>
</template>

<script>
import {authService} from "@/services/auth";

export default {
    name: 'LoginComponent',
    props: {},
    data() {
        return {
            user: {
                email: '',
                password: ''
            },
            rules: {
                email: [
                    {required: true, message: 'Vui lòng nhập email', trigger: 'blur'}
                ],
                password: [
                    {required: true, message: 'Vui lòng nhập mật khẩu', trigger: 'blur'}
                ]
            }
        }
    },
    methods: {
        login(formName) {
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    authService.login(this.user.email, this.user.password)
                    this.$router.push('/')

                }
            })
        }
    }
}
</script>
<style scoped>
@import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css");

.login {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.login-container {
    background-color: #E9EEF3;
    padding: 55px 45px;
    text-align: center;
    width: 400px;
    /*border-radius: 20px;*/
    /*margin-top: 15px;*/
}

.login-header {
    margin-bottom: 35px;
    text-align: center;
}

.login-social {
    background-color: rgb(64 158 255);
    width: 100%;
    border-radius: 15px;
    border: 0;
    outline: 0;
    font-size: 16px;
    color: #FFFFFF;
    /*display: flex;*/
    /*justify-content: center;*/
    padding: 5px;
    box-shadow: 0 5px 10px 0 rgba(64, 158, 255, 0.5);
}

.login-social:hover {
    background: rgb(48 65 86);
    border-color: rgb(48 65 86);
    color: #FFF;
}

.login-social-icon {
    /*height: 35px;*/
    /*width: 35px;*/
    background: conic-gradient(from -45deg, #ea4335 110deg, #4285f4 90deg 180deg, #34a853 180deg 270deg, #fbbc05 270deg) 73% 55%/150% 150% no-repeat;
    -webkit-background-clip: text;
    /*background-clip: text;*/
    color: transparent;
    -webkit-text-fill-color: transparent;
    font-size: 35px;
    /*background-color: #fff;*/
    /*color: rgb(76, 110, 244);*/
    border-radius: 10px;
    float: left;
    /*display: flex;*/
    /*align-items: center;*/
    /*justify-content: center;*/
}

.login-social-text {
    font-weight: 600;
    line-height: 36px;

}

.login-or {
    margin-top: 30px;
    margin-bottom: 20px;
    position: relative;
}

.login-or:before {
    content: "";
    width: 100%;
    height: 1px;
    background-color: #545c64;
    position: absolute;
    top: 50%;
    right: 0;
    transform: translateY(-50%);
}

.login-or span {
    background-color: #E9EEF3;
    padding: 0 10px;
    position: relative;
    z-index: 2;
}

.login-input >>> .el-input__inner {
    border-radius: 10px !important;
}

.login-submit {
    background-color: rgb(48 65 86) !important;
    width: 100%;
    border-radius: 15px;
    border: 0;
    outline: 0;
    font-size: 18px;
    color: #FFFFFF;
    display: flex;
    justify-content: center;
    padding: 14px;
    box-shadow: 0 5px 10px 0 rgba(76, 110, 244, 0.5);
    margin-top: 20px;
    margin-bottom: 10px;
    font-weight: 600;
}

.login-already a {
    text-decoration: none;
    margin-left: 5px;
}

.login-already a:hover {
    color: rgb(64 158 255);
}
</style>
