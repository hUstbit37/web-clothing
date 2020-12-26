<template>
    <div>
        <el-breadcrumb separator="/">
            <el-breadcrumb-item :to="{ path: '/' }">Home</el-breadcrumb-item>
            <el-breadcrumb-item :to="{ path: '/user' }">user</el-breadcrumb-item>
            <el-breadcrumb-item>{{ urlName }}</el-breadcrumb-item>
        </el-breadcrumb>

        <el-col :span="16">
            <el-form :model="user" :rules="rules" ref="formUser" label-width="200px">
                <el-form-item label="Họ tên" prop="name">
                    <el-input v-model="user.name" size="small">
                    </el-input>
                    <div v-if="errors.name" class="el-form-item__error">{{ errors.name }}</div>
                </el-form-item>
                <el-form-item label="Email" prop="email">
                    <el-input autocomplete="off" v-model="user.email" type="email" size="small"></el-input>
                </el-form-item>
                <el-form-item label="Mật khẩu" prop="password">
                    <el-input show-password autocomplete="off" type="password" v-model="user.password" size="small"></el-input>
                    <div v-if="errors.password" class="el-form-item__error">{{ errors.password }}</div>
                </el-form-item>
                <el-form-item label="Điện thoại" prop="phone">
                    <el-input v-model="user.phone" size="small"></el-input>
                    <div v-if="errors.phone" class="el-form-item__error">{{ errors.phone }}</div>
                </el-form-item>
                <el-form-item label="Địa chỉ" prop="address">
                    <el-input v-model="user.address" size="small"></el-input>
                </el-form-item>
                <el-form-item label="Giới tính" prop="gender">
                    <el-radio-group v-model="user.gender">
                    <el-radio :label="1">Nam</el-radio>
                    <el-radio :label="0">Nữ</el-radio>
                    </el-radio-group>
                </el-form-item>
                <el-form-item>
                    <el-button
                        type="primary" size="small" icon="el-icon-s-promotion" plain
                        @click="storeOrUpdate('formUser')">
                        Lưu
                    </el-button>
                    <el-button type="danger" size="small" icon="el-icon-s-release" plain
                               @click="resetForm('formUser')">
                        Hủy
                    </el-button>
                </el-form-item>
            </el-form>
        </el-col>
    </div>
</template>

<script>
export default {
    data() {
        return {
            urlName: 'create',
            errors:[],
            user: {
                name:'',
                email: '',
                password:'',
                phone: '',
                address: '',
                gender: '',
            },
            rules: {
                name: [
                    {required: true, message: 'Tên sản phẩm không để trống', trigger: 'blur'},
                ],
                password: [
                    {required: true, message: 'Mật khẩu không để trống', trigger: 'blur'},
                ],
                email: [
                    {required: true, message: 'Email không để trống', trigger: 'blur'},
                ],
                phone: [
                    {required: true, message: 'Điện thoại không để trống', trigger: 'blur'},
                ],
            },
        }
    },
    watch: {
        $route(to, from){
            console.log('to, from',to, from)
            this.urlName = to
        }
    },
    created() {
        localStorage.setItem('pathCurrentRouter',  this.$route.path)
        if (this.$route.params.id) {
            let user_id = this.$route.params.id
            this.urlName = 'edit'
            this.$axios.get(`api/v1/user/${user_id}`).then((res => {
                this.user = res.data.data
                console.log('user', this.user)
            }))
        }
    },
    methods: {
        storeOrUpdate(formName) {
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    this.user.id ? this.update() : this.store()
                } else {
                    console.log('error submit!!');
                    return false;
                }
            });
        },
        store() {
            this.$axios.post('api/v1/user', this.user).then((res) => {
                if (res.data.error) {
                    this.errors = res.data.error.message
                } else {
                    this.$router.push('/user')
                    this.$message({
                        customClass: 'messageClass',
                        message: 'Bạn đã thêm thành công thanh vien mới.',
                        type: 'success'
                    });
                }
            }).catch((error) => {
                console.log(error)
                this.$alert(error.data.message, 'error', {
                    confirmButtonText: 'OK',
                    type: 'warning',
                    center: true
                })
            })
        },
        update() {
            this.$axios.put(`api/v1/user/${this.user.id}`, this.user).then((res) => {
                if (res.data.error) {
                    this.errors = res.data.error.message
                } else {
                    this.$router.push('/user')
                    this.$message({
                        customClass: 'messageClass',
                        message: 'Bạn đã cập nhật thành công thông tin thành viên.',
                        type: 'success'
                    });
                }
            }).catch((error) => {
                console.log(error)
            })
        },
        resetForm(formName) {
            this.$refs[formName].resetFields();
        },
    }
}
</script>

<style scoped>
.el-breadcrumb {
    background-color: #545c64;
    padding: 15px;
}

.el-form {
    margin-top: 15px;
}
</style>
