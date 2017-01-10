<template>
    <div>
        <ul class="no-padding no-style" v-if="local.solutions.length">
            <li v-for="solution in local.solutions">
                <solution-item :solution="solution" />
            </li>
        </ul>
        <div v-else>No solutions posted yet</div>
    </div>
</template>
<style>
</style>
<script lang="javascript">
    import solutionItem from './solution-item.vue'

    export default{
        props:['solutions','problemId'],
        components: {
            solutionItem
        },
        data(){
            return {
                local:{
                    solutions: [],
                }
            }
        },
        beforeMount(){
            this.local.solutions = this.solutions;
            Bus.$on('new-solution',(solution) => {
                this.local.solutions.push(solution);
            });
        },
        mounted(){

        }
    }

</script>
