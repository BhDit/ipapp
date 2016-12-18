<template>
    <div>
        <hr>
        <ul class="no-padding no-style">
            <li v-for="solution in local.solutions">
                <solution-item :solution="solution" />
            </li>
        </ul>
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
        mounted(){
            this.local.solutions = this.solutions;
            Bus.$on('new-solution',(solution) => {
                this.local.solutions.push(solution);
            });
        }}

</script>
