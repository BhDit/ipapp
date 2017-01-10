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
                    ><span class="glyphicon glyphicon-info-sign"></span> You have solved this problem
                    </div>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!--Solution Form-->
                <span v-if="solved && !posted">
                    <solution-form
                            :problem-id="problem.id"
                            @posted="posted=true"
                    > </solution-form>
                </span>
                <!--Solutions list-->
                <span v-if="solved">
                    <hr>
                    <solutions-list :solutions="problem.solutions"
                                    :problem-id="problem.id">
                    </solutions-list>
                </span>
                <!--If not solved problem-->
                <div v-else>
                    <br>
                    <div class="alert alert-warning">
                        <button type="button" class="btn btn-danger pull-right" @click="cheat">Cheat</button>
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
<script lang="babel">
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
                solved: false
            }
        },
        beforeMount(){
            this.solved = this.userProblemStats.solved;
            this.posted = this.userProblemStats.posted;

            this.$http.get('/xhr/problem/' + this.problem.id + '/solutions')
                .then(response => {
                    this.problem.solutions = response.data;
                }).catch()
        },
        methods: {
            cheat(){
                console.log(this);
                this.$http.post('/xhr/problem/' + this.problem.id + '/cheat')
                    .then(data  => {
                        data = data.body;
                        console.log(data, data.caught == true, data.caught === true);
                        if (data.caught) {
                            swal("Yikes!", "You lost some points. You should learn from this.", "info");
                            Bus.$emit('lost-points', data.lostPoints);
                        } else if (! data.caught) {
                            swal("Congrats!", "You were lucky .. this time", "info")
                        }
                        this.solved = true;
                    }).catch(error => {
                        console.log(error);
                        if(error.status == 401){
                            swal('Whoops.',error.body,'warning');
                        } else {
                            swal('Whoops.','It looks like we encountered a problem. You could try to refresh the page','error');
                        }
                    })
            }
        }
    }
</script>
