<template>
    <div>
        <!--Answer form-->
        <div class="row">
            <div class="col-md-12">
                <span>
                    <answer-form v-if="!solved"
                                 :problem-id="problem.id"
                                 class="pull-right"
                                 @solved="solved = true"
                    > </answer-form>
                    <div v-else
                         class="alert alert-info"
                    >You have solved this problem
                    </div>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!--Solution Form-->
                <span v-if="!cheated && solved && !posted">
                    <solution-form
                            :problem-id="problem.id"
                            @posted="posted=true"
                    > </solution-form>
                </span>
                <!--Solutions list-->
                <span v-if="solved || cheated">
            <hr>
            <solutions-list :solutions="problem.solutions"
                            :problem-id="problem.id">
            </solutions-list>
        </span>
                <!--If not solved problem-->
                <div v-else>
                    <br>
                    <div class="alert alert-warning">
                        <button type="button" class="btn btn-danger pull-right">Cheat</button>
                        <strong>You can Cheat!</strong> but loose 5 points.
                        <br>
                        <strong>PS: </strong>There is a chance the app won't catch you.
                        <div class="clearfix"></div>
                    </div>
                    <p>
                        You can post the solution and see other's only if you solve the problem.
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
<style>

</style>
<script lang="javascript">
    import answerForm from './answer-form.vue'
    import solutionForm from './solution-form.vue'
    import solutionsList from './solutions-list.vue'

    export default{
        components: {
            answerForm, solutionForm, solutionsList
        },
        props: {
            problem: {
                type: Object
            },
            userProblemStats: {
                type: Object
            }
        },
        data(){
            return {
                posted: false,
                cheated: false,
                solved: false
            }
        },
        beforeMount(){
            this.solved = this.userProblemStats.solved;
            this.cheated = this.userProblemStats.cheated;
            this.posted = this.userProblemStats.posted;
        },
    }
</script>
