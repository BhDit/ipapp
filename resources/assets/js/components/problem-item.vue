<template>
    <div>
        <a :href="'/problem/' + problem.id">{{problem.title}}</a> - {{problem.level}}
    </div>
</template>
<style>
</style>
<script>
    export default{
        props: ['problem'],
        data(){
            return{
                msg:'hello vue'
            }
        },
    }

</script>
