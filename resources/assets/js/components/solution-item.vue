<template>
    <div>
        <div class="media">
            <div class="media-left">
                <avatar :name="solution.owner.name"></avatar>
            </div>
            <div class="media-body">
                <h4 class="media-heading">{{solution.owner.name}}
                    <small class="pull-right">Posted {{solution.created_at}}</small>
                </h4>
                <pre class="html"><code>{{solution.body}}</code></pre>
                <div class="media-footer">
                    <span class="pull-left">{{ upvotesText }}</span>
                    <span class="pull-right">
                    <button type="button" class="btn btn-primary" @click="toggleUpvote" :disabled="upvote.busy"><span
                            class="glyphicon glyphicon-thumbs-up"></span> {{ (voted)?'Downvote':'Upvote' }}</button>
                </span>
                </div>
            </div>
        </div>
    </div>
</template>
<style lang="scss">
    .media {
        margin-bottom: 20px;
        .media-body .media-footer {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            > i {
                margin-right: 10px;
            }
        }
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
            return {
                upvotes: 0,
                voted: false,
                upvote: {
                    busy: false
                }
            }
        },
        beforeMount(){
            this.upvotes = this.solution.likeCount;
            this.voted = this.solution.liked;
        },
        computed: {
            upvotesText() {
                return window.pluralize('upvote', this.upvotes, true);
            }
        },
        methods: {
            toggleUpvote(){
                this.upvote.busy = true;
                this.$http.put('/xhr/vote/' + this.solution.id, {})
                    .then(resp => {
                        this.voted = !this.voted;
                        this.upvotes = resp.data.upvotes;
                        this.upvote.busy = false;
                    }).catch( () => {
                    this.upvote.busy = false;
                });
            }
        }
    }
</script>
