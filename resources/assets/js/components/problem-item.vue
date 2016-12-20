<template>
    <div class="problem">
        <span class="problem-data">
            <span class="id">
            {{problem.id}}.
            </span>
            <span class="title">
                <a :href="'/problem/' + problem.id">{{problem.title}}</a>
            </span>
        </span>
        <span class="problem-details">
            <span class="level">
                <div class="progress">
                  <div class="progress-bar progress-bar-warning"
                       v-if="problem.level == 'medium'"
                       aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                       role="progressbar"
                       style="width: 50%"></div>
                  <div class="progress-bar progress-bar-danger"
                       v-if="problem.level == 'hard'"
                       aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                       role="progressbar"
                       style="width: 80%"></div>
                  <div class="progress-bar progress-bar-success"
                       v-if="problem.level == 'low'"
                       aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                       role="progressbar"
                       style="width: 20%"></div>
                    <span class="sr-only">{{problem.level}}</span>
                </div>
            </span>
            <span class="solvedby">
                Solved by {{users}}
            </span>
        </span>
    </div>
</template>
<style lang="scss">
    .problem {
        display: flex;
        flex-direction: row;
        align-items: center;
        padding-bottom: 10px;
        margin-bottom: 10px;
        border-bottom: 1px dashed #ccc;
        flex-wrap: wrap;
        @media (max-width: 378px) {
            flex-direction: column;
        }
        .problem-data {
            flex:1;
            .id {
                font-size: 20px;
                margin-right: 5px;
            }
            .title {
                font-size: 1.1em;
                flex: 1;
            }
        }
        .problem-details {
            display: flex;
            justify-content:flex-end;
            align-items:flex-end;
            flex:1;
            .level {
                margin: 0 auto;
                width: 100px;
                .progress {
                    margin: 0;
                }
            }
            .solvedby{
                width:130px;
                text-align: right;
            }
        }

    }
</style>
<script lang="javascript">

    export default{
        props: ['problem'],
        data(){
            return{
                users: '',
            }
        },
        beforeMount(){
            this.users = window.pluralize('user',this.problem.solvedBy,true);
        }
    }










</script>
