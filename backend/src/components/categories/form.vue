<template>
    <div>
        <el-breadcrumb separator="/">
            <el-breadcrumb-item :to="{ path: '/' }">Home</el-breadcrumb-item>
            <el-breadcrumb-item :to="{ path: '/category' }">category</el-breadcrumb-item>
            <el-breadcrumb-item>{{ urlName }}</el-breadcrumb-item>
        </el-breadcrumb>

        <el-col :span="16">
            <el-form :model="category" :rules="rules" ref="formCategory" label-width="150px">
                <el-form-item label="Tên danh mục" prop="name">
                    <el-input v-model="category.name" @change="covertToSlug" @input="covertToSlug">
                    </el-input>
                    <div class="el-form-item__error">{{ errors.name }}</div>
                </el-form-item>
                <el-form-item label="Slug" prop="slug">
                    <el-input v-model="category.slug"></el-input>
                </el-form-item>
                <el-form-item label="Danh mục cha" prop="parent_id">
                    <el-select v-model="category.parent_id">
                        <el-option
                            v-for="category in categories"
                            :key="category.id"
                            :label="category.name"
                            :value="category.id">
                        </el-option>
                    </el-select>
                </el-form-item>
                <el-form-item prop="is_home" label="Hiển thị ở trang chủ">
                    <el-checkbox v-model="category.is_home">Show/Hide</el-checkbox>
                </el-form-item>

                <el-form-item label="Meta Title">
                    <el-input v-model="category.meta_title"></el-input>
                </el-form-item>
                <el-form-item label="Meta Description">
                    <el-input v-model="category.meta_desc" type="textarea"></el-input>
                </el-form-item>
                <el-form-item label="Meta keyword">
                    <el-input v-model="category.meta_keyword" type="textarea"></el-input>
                </el-form-item>
                <el-form-item>
                    <el-button
                        type="primary" size="small" icon="el-icon-s-promotion" plain
                        @click="storeOrUpdate('formCategory')">
                        Lưu
                    </el-button>
                    <el-button type="danger" size="small" icon="el-icon-s-release" plain
                               @click="resetForm('formCategory')">
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
            category_id: null,
            errors: {
                name: ''
            },
            category: {
                'name': '',
                'slug': '',
                'parent_id': 0,
                'is_home': 0,
                'meta_title': '',
                'meta_desc': '',
                'meta_keyword': '',
            },
            rules: {
                name: [
                    {required: true, message: 'Tên danh mục không để trống', trigger: 'blur'},
                    {min: 3, max: 255, message: 'Độ dài không hợp lệ', trigger: 'blur'}
                ]
            },

            categories: [{
                'id': 0,
                'name': 'Root'
            }]
        }
    },
    created() {
        console.log('this router', this.$router.currentRoute)
        this.getCategories()
        if (this.$router.currentRoute.params.id) {
            this.category_id = this.$router.currentRoute.params.id
            this.urlName = 'edit'
            this.$axios.get(`api/v1/category/${this.category_id}`).then((res => {
                // console.log(res.data)
                this.category = res.data
                this.category.is_home = !!this.category.is_home

            }))
        }
    },
    methods: {
        storeOrUpdate(formName) {
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    if (!this.category_id) {
                        this.$axios.post('api/v1/category', this.category).then((res) => {
                            if (res.data.error) {
                                this.errors.name = res.data.error.message.name[0]
                            } else {
                                this.$router.push('/category')
                                this.$message({
                                    message: 'Bạn đã thêm thành công danh mục mới.',
                                    type: 'success'
                                });
                            }
                        }).catch((error) => {
                            console.log(error)
                        })
                    } else {
                        this.$axios.put(`api/v1/category/${this.category_id}`, this.category).then((res) => {
                            if (res.data.error) {
                                this.errors.name = res.data.error.message.name[0]
                            } else {
                                this.$router.push('/category')
                                this.$message({
                                    message: 'Bạn đã cập nhật thành công danh mục.',
                                    type: 'success'
                                });
                            }
                        }).catch((error) => {
                            console.log(error)
                        })
                    }
                } else {
                    console.log('error submit!!');
                    return false;
                }
            });
        },
        getCategories() {
            this.$axios.get('api/v1/category').then((res) => {
                this.categories = res.data.dataAll
                if (this.category_id){
                    this.categories.forEach((category, index) => {
                        if (category.id === parseInt(this.category_id) ){
                            this.categories.splice(index, 1)
                        }
                    })
                }
            })
        },
        resetForm(formName) {
            this.$refs[formName].resetFields();
        },

        covertToSlug(e) {
            let slug;
            //Đổi chữ hoa thành chữ thường
            slug = e.toLowerCase();

            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, "a");
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, "e");
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, "i");
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, "o");
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, "u");
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, "y");
            slug = slug.replace(/đ/gi, "d");
            //Xóa các ký tự đặt biệt
            slug = slug.replace(
                /\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi,
                ""
            );
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, "-");
            slug = slug.replace(/\-\-\-\-/gi, "-");
            slug = slug.replace(/\-\-\-/gi, "-");
            slug = slug.replace(/\-\-/gi, "-");
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = "@" + slug + "@";
            slug = slug.replace(/\@\-|\-\@|\@/gi, "");
            //In slug ra textbox có id “slug”
            this.category.slug = slug;
        },
    }
}
</script>

<style scoped>
.el-breadcrumb {
    background-color: #545c64;
    padding: 15px;
}

.el-select {
    width: 100%;
}

.el-form {
    margin-top: 15px;
}
</style>
