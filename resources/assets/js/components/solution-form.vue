<template>
    <div>
        <!-- Body -->
        <div class="form-group" :class="{'has-error': form.errors.has('body')}">
            <textarea class="form-control" id="body" name="body" v-model="form.body" required="required">
            </textarea>
            <span class="help-block" v-show="form.errors.has('body')">
                @{{ form.errors.get('body') }}
            </span>
        </div>
    </div>
</template>
<style>
</style>
<script lang="javascript">
    export default{
        data(){
            return {
                form: new Form({
                    body: ''
                })
            }
        },
    }


</script>
