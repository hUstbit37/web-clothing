<template>
    <div>
        <el-row style="padding: 10px">
            <el-col :span="12">
                <h1>Danh sách sản phẩm</h1>
            </el-col>
            <el-col :span="12">
                <el-button type="primary" size="small" icon="el-icon-plus" plain
                           @click="showFormCreate()">
                    Thêm mới
                </el-button>
            </el-col>
        </el-row>

        <el-table
            @selection-change="handleSelectionChange"
            :default-sort = "{prop: 'name', order: 'descending'}"
            v-loading="loading"
            :data="products"
            border
            style="width: 100%">
            <el-table-column
                type="selection"
                width="55">
            </el-table-column>
            <el-table-column sortable prop="name" label="Tên sản phẩm" width="180">
            </el-table-column>
            <el-table-column prop="slug" label="Slug">
            </el-table-column>
            <el-table-column prop="price" label="Giá tiền" width="100">
                <template slot-scope="scope">
                   {{formatPrice(scope.row.price)}}
                </template>
            </el-table-column>
            <el-table-column prop="discount" label="Discount" width="100">
            </el-table-column>
            <el-table-column prop="" label="Danh mục" width="150">
            </el-table-column>

            <el-table-column prop="" label="Hành động" width="150">
                <template slot-scope="scope">
                    <el-button
                        size="mini"
                        @click="handleEdit(scope.$index, scope.row)">Sửa</el-button>
                    <el-button
                        size="mini"
                        type="danger"
                        @click="handleDelete(scope.$index, scope.row)">Xóa</el-button>
                </template>
            </el-table-column>

        </el-table>
        <el-pagination
            background
            layout="prev, pager, next"
            :current-page="currentPage"
            @current-change="handleCurrentChange"
            :page-size="pageSize"
            :total="total">
        </el-pagination>
    </div>

</template>

<script>
export default {
    data() {
        return {
            loading: false,
            products: [],
            page: 1,
            pageSize: 1,
            total: 1,
            currentPage: 1
        }
    },
    created() {

        this.getData()
    },
    methods: {
        formatPrice(price){
            return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(price)
        },
        handleSelectionChange(val) {
            console.log(val)
            // this.multipleSelection = val;
        },
        handleEdit(index, row) {
            console.log(index, row);
            this.$router.push({ path: `product/edit/${row.id}`})
        },
        handleDelete(index, row) {
            console.log(index, row);
            this.$confirm('Bạn có muốn xóa không?', {
                confirmButtonText: 'OK',
                cancelButtonText: 'Cancel',
                type: 'warning'
            }). then(() => {
                // this.products.forEach(item =>{
                //     if (item.id === row.id){
                //         this.products.splice(index,1)
                //     }
                // })
                row.splice(index, 1)
                this.$axios.delete(`api/v1/product/${row.id}`).then((res) => {
                    this.getData()
                }).catch((err) => {
                    console.log(err)
                })
            })
        },
        showFormCreate() {
            this.$router.push('/category/create');
        },

        handleCurrentChange(val) {
            // console.log(val)
            this.currentPage = val
            this.getData()
        },
        getData() {
            this.loading = true
            this.$axios.get(`api/v1/product?page=${this.currentPage}`).then((res) => {
                console.log(res.data.data)
                this.pageSize = res.data.data.per_page
                this.total = res.data.data.total;
                this.products = res.data.data.data
                this.loading = false
            }).catch((error) => {
                console.log(error)
                this.loading = false
            })
        },

    }
}
</script>

<style scoped>
.el-button--primary.is-plain {
    float: right;
}

.el-table {
    /*margin-top: 10px;*/
}

</style>
