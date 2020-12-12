<template>
    <div>
        <el-breadcrumb separator="/">
            <el-breadcrumb-item :to="{ path: '/' }">Home</el-breadcrumb-item>
            <el-breadcrumb-item :to="{ path: '/product' }">product</el-breadcrumb-item>
            <el-breadcrumb-item>{{urlName}}</el-breadcrumb-item>
        </el-breadcrumb>

        <el-col :span="16">
            <el-form :model="product" :rules="rules" ref="formProduct" label-width="150px">
                <el-form-item label="Tên sản phẩm" prop="name">
                    <el-input v-model="product.name" @change="covertToSlug" @input="covertToSlug" size="small">
                    </el-input>
                </el-form-item>
                <el-form-item label="Slug" prop="slug">
                    <el-input v-model="product.slug" size="small"></el-input>
                </el-form-item>
                <el-form-item label="Giá tiền" prop="price">
                    <el-input v-model="product.price" type="number" size="small"></el-input>
                </el-form-item>
                <el-form-item label="Discount">
                    <el-input v-model="product.discount" type="number" size="small"></el-input>
                </el-form-item>
                <el-form-item label="Danh mục sản phẩm" prop="category_id">
                    <el-select v-model="product.category_id" multiple placeholder="Chọn danh mục">
                        <el-option
                            v-for="category in categories"
                            :key="category.id"
                            :label="category.name"
                            :value="category.id">
                        </el-option>
                    </el-select>
                </el-form-item>
                <el-form-item label="Tải ảnh lên">
                    <el-upload
                        class="upload-demo"
                        action="https://jsonplaceholder.typicode.com/posts/"
                        :on-preview="handlePreview"
                        :on-remove="handleRemove"
                        list-type="picture"
                    >
                        <el-button size="small" type="primary">Click to upload</el-button>
                        <div slot="tip" class="el-upload__tip">
                            jpg/png files with a size less than 500kb
                        </div>
                    </el-upload>
                </el-form-item>
                <el-form-item label="Meta Title">
                    <el-input v-model="product.meta_title"></el-input>
                </el-form-item>
                <el-form-item label="Meta Description">
                    <el-input v-model="product.meta_desc" type="textarea"></el-input>
                </el-form-item>
                <el-form-item label="Meta keyword">
                    <el-input v-model="product.meta_keyword" type="textarea"></el-input>
                </el-form-item>
                <el-form-item>
                    <el-button
                        type="primary" size="small" icon="el-icon-s-promotion" plain
                        @click="storeOrUpdate('formProduct')">
                        Lưu
                    </el-button>
                    <el-button type="danger" size="small" icon="el-icon-s-release" plain
                               @click="resetForm('formProduct')">
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
            product: {
                'name': '',
                'slug': '',
                'price': 0,
                'discount': 0,
                'category_id': [1,2],
                'meta_title': '',
                'meta_desc': '',
                'meta_keyword': '',
            },
            rules: {
                name: [
                    {required: true, message: 'Tên sản phẩm không để trống', trigger: 'blur'},
                    {min: 5, max: 255, message: 'Độ dài không hợp lệ', trigger: 'blur'}
                ],
                price: [
                    {required: true, message: 'Vui lòng nhập giá sản phẩm', trigger: 'blur'},
                ],
                category_id: [
                    {required: true, message: 'Vui lòng chọn danh mục sản phẩm', trigger: 'blur'},
                ]
            },

            categories: []
        }
    },
    created() {
        if (this.$router.currentRoute.params.id) {
            let product_id = this.$router.currentRoute.params.id
            this.urlName = 'edit'
            this.$axios.get(`api/v1/product/${product_id}`).then((res => {
                console.log(res.data)
                this.product = res.data.data
                // this.product.category_id= res.data.category_id
                res.data.category_id.forEach(item => {
                    console.log(item)
                    // this.product.category_id.push(item)
                })

            }))
        }
    },
    methods: {
        storeOrUpdate(formName) {
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    console.log(this.product)
                } else {
                    console.log('error submit!!');
                    return false;
                }
            });
        },
        resetForm(formName) {
            this.$refs[formName].resetFields();
        },
        handleRemove(file, fileList) {
            console.log(file, fileList);
        },
        handlePreview(file) {
            console.log(file);
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
            this.product.slug = slug;
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
