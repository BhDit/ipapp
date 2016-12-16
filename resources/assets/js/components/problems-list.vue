<template>
    <div>
        <div class="row">
            <div class="col-md-12 problems-header">
                <span style="font-size:24px">Problems</span>
                <form class="form-inline level-form">
                    <div class="form-group">
                        <label class="control-label vis">Level: </label>
                        <select name="filter" id="filter" v-model="selectedLevel" class="form-control">
                            <option value="">All</option>
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="hard">Hard</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12 problems-body">
                <ul class="no-padding no-style" v-show="filteredProblems.length > 0">
                    <li v-for="problem in filteredProblems">
                        <problem :problem="problem"></problem>
                    </li>
                </ul>
                <span v-show="filteredProblems.length == 0">No problems for this filter</span>
            </div>
        </div>
    </div>
</template>
<style lang="scss">
    hr {
        margin-top: 5px;
        margin-bottom: 20px;
    }

    .problems-header {
        display: flex;
        justify-content: space-between;
    }
    @media (max-width:400px){
        .problems-header{
            flex-direction:column;
        }
    }
</style>
<script lang="javascript">

    import problemItem from './problem-item.vue'

    export default{
        mixin: [require('../utils/loading')],
        components: {
            'problem': problemItem
        },
        data(){
            return {
                problems: [],
                selectedLevel: '',
            }
        },
        beforeMount(){
            this.initialize();
        },
        computed: {
            filteredProblems() {
                if (this.selectedLevel == '') {
                    return this.problems
                }
                return _.filter(this.problems, {'level': this.selectedLevel})
            }
        },
        methods: {
            initialize(){
                this.$http.get('/xhr/problems').then(data => {
                    this.problems = data.body;
                })
            }
        }

    }
</script>
