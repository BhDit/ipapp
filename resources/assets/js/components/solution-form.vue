<template>
    <div>
        <hr>
        <form @submit.prevent="">
            <!-- Body -->
            <div class="form-group" :class="{'has-error': form.errors.has('body')}">
                <label class="control-label">Share your solution:</label>
                <textarea class="form-control editor" id="body" name="body" v-model="form.body" required="required"
                          placeholder="Code goes here">
            </textarea>
                <span class="help-block" v-show="form.errors.has('body')">
                {{ form.errors.get('body') }}
            </span>
            </div>
            <div class="form-group">
                <button type="submit"
                        class="btn btn-primary pull-right"
                        @click="submit"
                        :disabled="form.busy"
                >Share
                </button>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>
</template>
<style lang="scss">
    .editor {
        max-width: 100%;
        height: 200px !important;
    }
</style>
<script type="text/jacascript">
    export default{
        props: ['problemId'],
        data(){
            return {
                form: new Form({
                    body: ''
                }),
                posted: false
            }
        },
        methods: {
            submit(){
                IPAPP.post('/xhr/problem/' + this.problemId + '/solution', this.form)
                    .then(response => {
                        Bus.$emit('new-solution', response);
                        this.$emit('posted');
                        this.posted = true;
                        setTimeout(()=>{
                            $('pre code').each(function (i, block) {
                                hljs.highlightBlock(block);
                            });
                        },2000);
                    }).catch()
            }
        }
    }

</script>
