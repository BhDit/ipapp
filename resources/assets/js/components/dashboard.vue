<template>
    <div class="flex flex-wrap chart-container">
        <div class="panel panel-default text-center">
        	  <div class="panel-heading">
        			<h3 class="panel-title ">Solved Problems</h3>
        	  </div>
        	  <div class="panel-body">
                  <level-pie :chart-data="levelPieData" ></level-pie>
        	  </div>
        </div>

        <div class="panel panel-default text-center">
            <div class="panel-heading">
                <h3 class="panel-title ">Solved Problems</h3>
            </div>
            <div class="panel-body">
                <level-pie :chart-data="levelPieData" ></level-pie>
            </div>
        </div>

    </div>
</template>
<style lang="scss">
    .chart-container{
        justify-content:space-around;
    }
</style>
<script lang="babel">
    import levelPie from './level-pie'

    export default{
        components: {levelPie},
        data(){
            return {
                msg: 'hello vue',
                levelPieData: {},
            }
        },
        beforeMount(){
            this.$http.get('/xhr/user/level-chart').then( data => {
                this.levelPieData = data.body;
            });
        },
    }
</script>
