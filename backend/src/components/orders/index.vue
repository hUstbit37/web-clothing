<template>
    <div>
        <el-row style="padding: 10px">
            <el-col :span="12">
                <h1>Danh sách đơn hàng</h1>
            </el-col>
        </el-row>
    <el-table
        :data="tableData"
        border
        style="width: 100%">
        <el-table-column type="selection" width="45" align="center">
        </el-table-column>
        <el-table-column align="center" type="index" min-width="45" label="#" :index="customIndex">
        </el-table-column>
        <el-table-column type="expand">
            <template slot-scope="props">
                <p>State: {{ props.row.state }}</p>
                <p>City: {{ props.row.city }}</p>
                <p>Address: {{ props.row.address }}</p>
                <p>Zip: {{ props.row.zip }}</p>
            </template>
        </el-table-column>
        <el-table-column label="Ngày đặt hàng" prop="date">
        </el-table-column>
        <el-table-column label="Trạng thái" prop="status">
        </el-table-column>
        <el-table-column label="Mã đơn hàng" prop="code">
        </el-table-column>
        <el-table-column label="Tên khách hàng" prop="name">
        </el-table-column>
        <el-table-column label="Số điện thoại" prop="phone">
        </el-table-column>
        <el-table-column label="Hành động" prop="name">
            <template slot-scope="scope">
                <el-select v-model="value" placeholder="Chọn hành động">
                    <el-option
                        v-for="item in options"
                        :key="item.value"
                        :label="item.label"
                        :value="item.value">
                    </el-option>
                </el-select>
            </template>
        </el-table-column>
    </el-table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            options: {},
            value: '',
            tableData: [{
                date: '2016-05-03',
                name: 'Tom',
                state: 'California',
                city: 'Los Angeles',
                address: 'No. 189, Grove St, Los Angeles',
                zip: 'CA 90036'
            }, {
                date: '2016-05-02',
                name: 'Tom',
                state: 'California',
                city: 'Los Angeles',
                address: 'No. 189, Grove St, Los Angeles',
                zip: 'CA 90036'
            }, {
                date: '2016-05-04',
                name: 'Tom',
                state: 'California',
                city: 'Los Angeles',
                address: 'No. 189, Grove St, Los Angeles',
                zip: 'CA 90036'
            }, {
                date: '2016-05-01',
                name: 'Tom',
                state: 'California',
                city: 'Los Angeles',
                address: 'No. 189, Grove St, Los Angeles',
                zip: 'CA 90036'
            }, {
                date: '2016-05-08',
                name: 'Tom',
                state: 'California',
                city: 'Los Angeles',
                address: 'No. 189, Grove St, Los Angeles',
                zip: 'CA 90036'
            }, {
                date: '2016-05-06',
                name: 'Tom',
                state: 'California',
                city: 'Los Angeles',
                address: 'No. 189, Grove St, Los Angeles',
                zip: 'CA 90036'
            }, {
                date: '2016-05-07',
                name: 'Tom',
                state: 'California',
                city: 'Los Angeles',
                address: 'No. 189, Grove St, Los Angeles',
                zip: 'CA 90036'
            }]
        }
    },
    created() {
        sessionStorage.setItem('pathCurrentRouter', this.$route.path)
    },
    methods: {
        customIndex(index) {
            return this.pageSize * (this.currentPage - 1)  + 1 + index;
        },
    }
}
</script>

<style scoped>

</style>
