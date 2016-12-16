<template>
    <div>
        <solution-form></solution-form>
        <ul class="no-padding no-style">
            <li v-for="solution in solutions">
                <solution-item :solution="solution"></solution-item>
            </li>
        </ul>
    </div>
</template>
<style>
</style>
<script lang="javascript">
    import solutionItem from './solution-item.vue'
    import solutionForm from './solution-form.vue'
    export default{
        data(){
            return {
                solutions: [
                    {body: ''},
                    {body: ''},
                    {body: ''},
                    {body: ''},
                    {body: ''},
                    {body: ''},
                    {body: ''},
                    {body: ''},
                ]
            }
        },
        components: {
            solutionItem,
            solutionForm,
        }
    }

</script>
