<template>
    <div>
        <div>{{problemId}}</div>
        <form @submit.prevent="checkAnswer">
            <!-- Answer -->
            <div class="form-group" :class="{'has-error': form.errors.has('answer')}">
                <label class="control-label" for="answer">Answer*</label>
                <input type="text" class="form-control" id="answer" name="answer" v-model="form.answer"
                       required="required">
                <span class="help-block" v-show="form.errors.has('answer')">
                    {{ form.errors.get('answer') }}
                </span>
            </div>
        </form>
    </div>
</template>
<style>

</style>
<script>
    export default{
        props:[ 'problemId' ],
        data(){
            return{
                form: new Form({
                    'answer': ''
                })
            }
        },
        methods: {
            checkAnswer(){
                swal("Correct","One done. More to go","success");
            }
        }
    }
</script>
