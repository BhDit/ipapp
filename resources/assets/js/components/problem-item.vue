<template>
    <div class="problem">
        <span class="title">
            <a :href="'/problem/' + problem.id">{{problem.title}}</a>
        </span>
        <span class="level">
            {{problem.level}}
        </span>
        <span class="button">
            <button type="submit" class="btn btn-primary">Go!</button>
        </span>
    </div>
</template>
<style lang="scss">
    .problem {
        display: flex;
        flex-direction: row;
        align-items:center;
        margin-bottom:20px;
        .title{
            flex:1;
        }
        .level {
            margin-right:30px;
        }
    }
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
