<template>
    <div>
        <div class="row">
            <div class="col-sm-12 problems-header">
                <span style="font-size:24px">Problems
                <span class="add-problem" v-if="authority">
                    <a class="btn btn-primary btn-sm" data-toggle="tooltip" title="Add new Problem" @click="showNewProblemForm">
                        <i class="icon glyphicon glyphicon-plus"></i> Add Problem
                    </a>
                </span>
                </span>
                <form class="form-inline level-form" @submit.prevent="">
                    <div class="form-group">
                        <input
                                type="search"
                                name="search"
                                id="search"
                                class="form-control"
                                v-model="search"
                                placeholder="Search"
                                title="Search">
                    </div>
                    <div class="form-group">
                        <label class="control-label vis">Difficulty: </label>
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

    @media (max-width: 400px) {
        .problems-header {
            flex-direction: column;
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
        props:['authority'],
        data(){
            return {
                problems: [],
                selectedLevel: '',
                search:'',
            }
        },
        beforeMount(){
            Bus.$on('new-problem-inserted',(data)=>{
               this.problems.push(data);
            });
            this.initialize();
        },
        computed: {
            filteredProblems() {
                let problems = this.problems;
                if(this.search.trim() != ''){
                    problems =  _.filter(problems, (problem)=>{
                        return problem.title.search(this.search) > -1
                    })
                }
                if (this.selectedLevel != '') {
                    problems =  _.filter(problems, {'level': this.selectedLevel})
                }
                return problems
            }
        },
        methods: {
            initialize(){
                this.$http.get('/xhr/problems').then(data => {
                    this.problems = _.sortBy(data.body,'id');
                })
            },
            showNewProblemForm(){
                Bus.$emit('showNewProblemForm');
            }
        },

    }
</script>
