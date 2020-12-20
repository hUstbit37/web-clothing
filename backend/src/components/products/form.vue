<template>
    <div>
        <el-breadcrumb separator="/">
            <el-breadcrumb-item :to="{ path: '/' }">Home</el-breadcrumb-item>
            <el-breadcrumb-item :to="{ path: '/product' }">product</el-breadcrumb-item>
            <el-breadcrumb-item>{{ urlName }}</el-breadcrumb-item>
        </el-breadcrumb>

        <el-col :span="16">
            <el-form :model="product" :rules="rules" ref="formProduct" label-width="200px">
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
                <el-form-item label="Danh mục sản phẩm" prop="category_ids">
                    <el-select v-model="product.category_ids" multiple placeholder="Chọn danh mục">
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
                        action=""
                        :auto-upload="false"
                        :on-preview="handlePreview"
                        :on-remove="handleRemove"
                        list-type="picture"
                        :on-change="handleUploadChange"
                        :before-upload="beforeUpload"
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
                'category_ids': [],
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
                category_ids: [
                    {required: true, message: 'Vui lòng chọn danh mục sản phẩm', trigger: 'blur'},
                ]
            },
            categories: [],
            imageList: [],
            image: ''
        }
    },
    watch: {
      $route(to, from){
          console.log('to',this.urlName)
          this.urlName = to
      }
    },
    created() {
        localStorage.setItem('pathCurrentRouter',  this.$route.path)
        this.getCategories()
        if (this.$route.params.id) {
            let product_id = this.$route.params.id
            this.urlName = 'edit'
            this.$axios.get(`api/v1/product/${product_id}`).then((res => {
                this.product = res.data.data
            }))
        }
    },
    methods: {
        handleUploadChange(image, imageList){
           this.imageList = imageList
            this.image = image
        },
        beforeUpload(file){
          console.log('file', file)
        },
        storeOrUpdate(formName) {
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    let formData = new FormData
                    this.imageList.forEach((image) => {
                        formData.append('image[]', image.raw)
                    })
                   for(let key in this.product) {
                       formData.append(key, this.product[key])
                   }
                    const config = { headers: { 'Content-Type': 'multipart/form-data' } };
                    this.$axios.post('api/v1/product', formData, config).then(res => {
                        console.log(res.data)
                    }).catch(e => {
                        console.log(e)
                    })
                    // this.product.id ? this.update() : this.store()
                } else {
                    console.log('error submit!!');
                    return false;
                }
            });
        },
        store() {
            this.$axios.post('api/v1/product', this.product).then((res) => {
                if (res.data.error) {
                    this.errors.name = res.data.error.message.name[0]
                } else {
                    this.$router.push('/product')
                    this.$message({
                        message: 'Bạn đã thêm thành công sản phẩm mới.',
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
            this.$axios.put(`api/v1/product/${this.product.id}`, this.product).then((res) => {
                if (res.data.error) {
                    this.errors.name = res.data.error.message.name[0]
                } else {
                    this.$router.push('/product')
                    this.$message({
                        message: 'Bạn đã cập nhật thành công sản phẩm.',
                        type: 'success'
                    });
                }
            }).catch((error) => {
                console.log(error)
            })
        },
        getCategories() {
            this.$axios.get('api/v1/category').then((res) => {
                this.categories = res.data.dataAll
            })
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
