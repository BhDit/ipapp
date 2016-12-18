<template>
    <div>
        <div class="media">
            <div class="media-left">
                <avatar :name="solution.owner.name"></avatar>
            </div>
            <div class="media-body">
                <h4 class="media-heading">{{solution.owner.name}} <small class="pull-right">Posted {{solution.created_at}}</small></h4>
                <pre class="html"><code>{{solution.body}}</code></pre>
            </div>
        </div>
    </div>
</template>
<style lang="scss">
 .media{
     margin-bottom:20px;
 }
</style>
<script lang="javascript">
    export default{
        props: {
            solution: {
                required: true
            }
        },
        data(){
            return {}
        },
    }
</script>
