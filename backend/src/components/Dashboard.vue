<template>
    <div class="hello">
        <el-row>
            <el-col :span="6">
                <el-card shadow="always">
                    <div class="card-panel">
                        <div class="card-panel-icon">
                            <i class="el-icon-user"></i>
                        </div>
                        <div class="card-panel-desc">
                            <div class="card-panel-text">New Visits</div>
                            <span class="card-panel-num">100000</span>
                        </div>
                    </div>
                </el-card>
            </el-col>
            <el-col :span="6">
                <el-card shadow="always">
                    <div class="card-panel">
                        <div class="card-panel-icon">
                            <i class="el-icon-sell"></i>
                        </div>
                        <div class="card-panel-desc">
                            <div class="card-panel-text">Total Sale</div>
                            <span class="card-panel-num">100.000</span>
                        </div>
                    </div>
                </el-card>
            </el-col>
            <el-col :span="6">
                <el-card shadow="always">
                    <div class="card-panel">
                        <div class="card-panel-icon">
                            <i class="el-icon-coin"></i>
                        </div>
                        <div class="card-panel-desc">
                            <div class="card-panel-text">Products</div>
                            <span class="card-panel-num">100000</span>
                        </div>
                    </div>
                </el-card>
            </el-col>
            <el-col :span="6">
                <el-card shadow="always">
                    <div class="card-panel">
                        <div class="card-panel-icon">
                            <i class="el-icon-shopping-cart-full"></i>
                        </div>
                        <div class="card-panel-desc">
                            <div class="card-panel-text">Shopping</div>
                            <span class="card-panel-num">100000</span>
                        </div>
                    </div>
                </el-card>
            </el-col>
        </el-row>

    </div>
</template>

<script>
export default {
    data() {
        return {

        }
    },
    created() {
        sessionStorage.setItem('pathCurrentRouter',  this.$route.path)
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.el-card {
    margin: 10px;
}

.el-card .card-panel {
    display: flex;
    cursor: pointer;
    font-family: Helvetica Neue, Helvetica, PingFang SC, Hiragino Sans GB, Microsoft YaHei, Arial, sans-serif;
}

.el-card .card-panel .card-panel-icon {
    font-size: 60px;
    width: 40%;
    text-align: center;
    color: #40c9c6;
}

.el-card .card-panel .card-panel-icon:hover {
    color: #fff;
    background-color: #40c9c6;
    border-radius: 10px;
}

.el-card .card-panel .card-panel-desc {
    font-size: 20px;
    text-align: center;
    font-weight: 550;
}

.el-card .card-panel .card-panel-desc .card-panel-text {
    color: #8c8c8c;
    margin: 10px 5px;
}

.el-card .card-panel .card-panel-desc .card-panel-num {
    font-weight: 700;
    color: #666;
    padding: 5px 5px;
}
</style>
