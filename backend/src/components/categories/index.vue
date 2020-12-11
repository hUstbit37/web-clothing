<template>
    <div>
        <el-row style="padding: 10px">
            <el-col :span="12">
                <h1>Danh sách danh mục</h1>
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
            :data="category"
            border
            style="width: 100%">
            <el-table-column
                type="selection"
                width="55">
            </el-table-column>
            <el-table-column sortable prop="name" label="Tên danh mục" width="180">
            </el-table-column>
            <el-table-column prop="slug" label="Slug">
            </el-table-column>
            <el-table-column prop="parent_id" label="Danh mục cha" width="150">
            </el-table-column>
            <el-table-column prop="is_home" label="Hiển thị trang chủ" width="150">
            </el-table-column>
            <el-table-column prop="product_count" label="Tổng số sản phẩm" width="150" :formatter="totalproduct">
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
            @size-change="handleSizeChange"
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
            category: [],
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
        totalproduct(row){
            return row.products.length
        },
        handleSelectionChange(val) {
            console.log(val)
            // this.multipleSelection = val;
        },
        handleEdit(index, row) {
            console.log(index, row);
            this.$router.push({ path: `/category/edit/${row.id}`})
        },
        handleDelete(index, row) {
            console.log(index, row);
            this.$confirm('Bạn có muốn xóa không?', {
                confirmButtonText: 'OK',
                cancelButtonText: 'Cancel',
                type: 'warning'
            }). then(() => {
                this.category.forEach(item =>{
                    if (item.id === row.id){
                        this.category.splice(index,1)
                    }
                })
                this.$axios.delete(`api/v1/category/${row.id}`).then((res) => {
                    this.getData()
                }).catch((err) => {
                    console.log(err)
                })
            })

        },
        showFormCreate() {
            this.$router.push('/category/create');
        },
        handleSizeChange(size) {
            // this.pagesize = size;
            console.log(size)
        },
        handleCurrentChange(val) {
            // console.log(val)
            this.currentPage = val
            this.getData()
        },
        getData() {
            this.loading = true
            this.$axios.get(`api/v1/category?page=${this.currentPage}`).then((res) => {
                console.log(res.data.data)
                this.pageSize = res.data.data.per_page
                this.total = res.data.data.total;
                this.category = res.data.data.data
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

.el-pagination {
    float: right;
    padding: 5px;
}

</style>
