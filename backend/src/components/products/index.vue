<template>
  <div>
    <el-row style="padding: 10px">
      <el-col :span="12">
        <h1>Product List</h1>
      </el-col>
      <el-col :span="12">
        <el-button
            type="primary"
            size="small"
            icon="el-icon-plus"
            plain
        @click="showFormCreate()">
          Thêm mới
        </el-button>
      </el-col>
    </el-row>

    <el-table
        :data="tableData"
        border
        style="width: 100%">
      <el-table-column
          prop="date"
          label="Date"
          width="180">
      </el-table-column>
      <el-table-column
          prop="name"
          label="Name"
          width="180">
      </el-table-column>
      <el-table-column
          prop="address"
          label="Address">
      </el-table-column>
    </el-table>
    <el-pagination
        background
        layout="prev, pager, next"
        :total="1000">
    </el-pagination>
  </div>

</template>

<script>
export default {
  data() {
    return {
      tableData: [{
        date: '2016-05-03',
        name: 'Tom',
        address: 'No. 189, Grove St, Los Angeles'
      }, {
        date: '2016-05-02',
        name: 'Tom',
        address: 'No. 189, Grove St, Los Angeles'
      }, {
        date: '2016-05-04',
        name: 'Tom',
        address: 'No. 189, Grove St, Los Angeles'
      }, {
        date: '2016-05-01',
        name: 'Tom',
        address: 'No. 189, Grove St, Los Angeles'
      }]
    }
  },
  methods: {
    showFormCreate()
    {
      this.$router.push('/product/create');
    }
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
}

</style>