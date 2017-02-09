
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
window.app = new Vue({
    mixins: [require('./ipapp')],
    data: {
        user: window.IPAPP.user,
    },
    created(){
        let self = this;
        Bus.$on('received-points',function (points) {
            window.IPAPP.user.points += points;
            window.IPAPP.user.xp += points*10;
        });
        Bus.$on('lost-points',function (points) {
            window.IPAPP.user.points -= points;
        });
        Bus.$on('userDataUpdated', userData =>{
            this.user = userData;
            window.IPAPP.user = userData;
        });
    },
});
