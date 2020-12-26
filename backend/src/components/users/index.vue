<template>
    <div>
    <el-row style="padding: 10px">
        <el-col :span="12">
            <h1>Danh sách thành viên</h1>
        </el-col>
        <el-col :span="12">
            <el-button type="primary" size="small" icon="el-icon-plus" plain
                       @click="showFormCreate()">
                Thêm mới
            </el-button>
        </el-col>
    </el-row>
    <el-table
        v-loading="loading"
        :data="users"
        border
        style="width: 100%">
        <el-table-column type="selection" width="45" align="center">
        </el-table-column>
        <el-table-column align="center" type="index" min-width="45" label="#" :index="customIndex">
        </el-table-column>
        <el-table-column label="Họ tên" prop="name">
        </el-table-column>
        <el-table-column label="Email" prop="email">
        </el-table-column>
        <el-table-column label="Điện thoại" prop="phone">
        </el-table-column>
        <el-table-column label="Địa chỉ" prop="address">
        </el-table-column>
        <el-table-column label="Giới tính" :formatter="renderGender">
        </el-table-column>
        <el-table-column label="Hành động">
            <template slot-scope="scope">
                <el-button
                    size="mini"
                    @click="handleEdit(scope.$index, scope.row)">Sửa
                </el-button>
                <el-button
                    size="mini"
                    type="danger"
                    @click="handleDelete(scope.$index, scope.row)">Xóa
                </el-button>
            </template>
        </el-table-column>
    </el-table>
        <el-pagination
            background
            layout="total,prev, pager, next, jumper"
            :current-page.sync="currentPage"
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
            page: null,
            pageSize: null,
            total: null,
            currentPage: 1,
            users: []

        }
    },
    created() {
        localStorage.setItem('pathCurrentRouter',  this.$route.path)
        this.getUsers()
    },
    methods: {
        getUsers() {
            this.loading = true
            this.$axios.get(`api/v1/user?page=${this.currentPage}`).then((res) => {
                console.log(res.data)
                this.pageSize = res.data.meta.per_page
                this.total = res.data.meta.total;
                this.users = res.data.data
                this.loading = false
            }).catch((error) => {
                console.log(error)
                this.loading = false
            })
        },
        customIndex(index) {
            return this.pageSize * (this.currentPage - 1)  + 1 + index;
        },
        handleCurrentChange(val) {
            // console.log(val)
            this.currentPage = val
            this.getUsers()
        },
        renderGender(row){
          return row.gender === 1 ? 'Nam' : 'Nữ'
        },
        handleEdit(index, row){
            this.$router.push(`/user/edit/${row.id}`)
            console.log(row)
        },
        handleDelete(index, row) {
            console.log(row)
        },
        showFormCreate() {
            this.$router.push('/user/create')
        }
    }
}
</script>

<style scoped>

</style>
