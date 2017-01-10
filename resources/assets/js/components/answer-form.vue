<template>
    <div>
        <form @submit.prevent="checkAnswer" class="form-inline" v-if="!success">
            <!-- Answer -->
            <div class="form-group" :class="{'has-error': form.errors.has('answer')}">
                <input type="text" class="form-control" id="answer" name="answer" placeholder="Answer"
                       v-model="form.answer"
                       required="required">
                <span class="help-block" v-show="form.errors.has('answer')">
                    {{ form.errors.get('answer') }}
                </span>
            </div>
            <div class="form-group">
                <button type="submit" :disabled="form.busy" class="btn btn-primary">Verify</button>
            </div>
        </form>
        <div v-else>You have answered correctly.</div>
    </div>
</template>
<style>

</style>
<script lang="javascript">
    export default{
        props: ['problemId'],
        data(){
            return {
                form: new Form({
                    'answer': ''
                }),
                success: false,
            }
        },
        methods: {
            checkAnswer(){
                IPAPP.post('/xhr/check-answer/' + this.problemId, this.form)
                    .then(data => {
                        //success
                        if(data.valid){
                            swal("Correct", "Go on and share your solution with the world!", "success");
                            this.success = true;
                            this.$emit('solved');
                            Bus.$emit('received-points',data.points);
                        } else {
                            swal("Whoops.", "Think about it more.", "error");
                        }
                    }).catch(error => {
                        if(error == 'Too Many Attempts.'){
                            swal('Chill boss','Try again in 1 minute','error');
                        }
                    });
            }
        }
    }
</script>
