<template>
    <div>
        <div class="row">
            <div v-if="loading" class="loading">
                Working on it :).
            </div>
            <div class="col-md-12">
                <select name="filter" id="filter" v-model="selectedLevel" class="form-control">
                    <option value="">All</option>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="hard">Hard</option>
                </select>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul v-show="filteredProblems.length > 0">
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
    ul {
        list-style: none;
        padding: 0;
    }

    .loading {
        width:100%;
        height:100px;
        display: flex;
        justify-content: center;
        align-items: center;
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
