<template>
    <div>
        <div id="new-problem-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add new problem</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal">
                            <div class="form-group" :class="{'has-error': newProblemForm.errors.has('title')}">
                                <label for="npm-title" class="control-label">Title: </label>
                                <input type="text" name="title" id="npm-title" class="form-control"
                                       v-model="newProblemForm.title" required="required">
                                <span class="help-block" v-show="newProblemForm.errors.has('title')">
                                            {{ newProblemForm.errors.get('title') }}
                                        </span>

                            </div>
                            <div class="form-group" :class="{'has-error': newProblemForm.errors.has('level')}">
                                <label for="npm-level">Level: </label>
                                <select name="level" v-model="newProblemForm.level" id="npm-level" class="form-control">
                                    <option value=""> -- Select One --</option>
                                    <option value="low"> Low 5</option>
                                    <option value="medium"> Medium 10</option>
                                    <option value="hard"> Hard 15</option>
                                </select>
                                <span class="help-block" v-show="newProblemForm.errors.has('level')">
                                            {{ newProblemForm.errors.get('level') }}
                                        </span>
                            </div>
                            <div class="form-group" :class="{'has-error': newProblemForm.errors.has('answer')}">
                                <label for="npm-answer">Answer: </label>
                                <input type="text" name="answer" id="npm-answer" class="form-control"
                                       v-model="newProblemForm.answer" required="required">
                                <span class="help-block" v-show="newProblemForm.errors.has('answer')">
                                            {{ newProblemForm.errors.get('answer') }}
                                        </span>
                            </div>
                            <div class="form-group" :class="{'has-error': newProblemForm.errors.has('score')}">
                                <label for="npm-score">Score: </label>
                                <input type="number" name="score" id="npm-score" class="form-control" min="0"
                                       v-model="newProblemForm.score" required="required">
                                <span class="help-block" v-show="newProblemForm.errors.has('score')">
                                            {{ newProblemForm.errors.get('score') }}
                                        </span>
                            </div>
                            <div class="form-group" :class="{'has-error': newProblemForm.errors.has('description')}">
                                <label for="npm-description">Description: </label>
                                <textarea name="description" id="npm-description" cols="30" rows="10"
                                          class="form-control" v-model="newProblemForm.description"></textarea>
                                <span class="help-block" v-show="newProblemForm.errors.has('description')">
                                            {{ newProblemForm.errors.get('description') }}
                                        </span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning" @click="newProblemForm.reset">Reset</button>
                        <button type="submit" class="btn btn-primary" :disabled="newProblemForm.busy"  @click="submitNewProblem">Submit</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>
<script lang="babel">
    export default{
        data(){
            return {
                newProblemForm: new Form({
                    title: '',
                    level: '',
                    description: '',
                    score: 0,
                    answer: 0,
                })
            }
        },
        methods: {
            submitNewProblem(){
                IPAPP.post('/problem',this.newProblemForm).then( data =>{
                    swal('Problem Saved','','success');
                    this.newProblemForm.reset();
                    Bus.$emit('new-problem-inserted',data);
                    console.log(data);
                }).catch( error =>{
                    console.log(error);
                    swal('Error occured','','error');
                })
            }
        }
    }
</script>
