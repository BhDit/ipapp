/**
 * Export the root application.
 */
module.exports = {

    el: '#ipapp',

    /**
     * Holds the timestamp for the last time we updated the API token.
     */
    lastRefreshedApiTokenAt: null,


    /**
     * The application's data.
     */
    data() {
        return {
            loadingNotifications: false,
            notifications: null,
            feedbackForm: new Form({
                from: '',
                level: 1,
                subject: '',
                message: ''
            }),
        }
    },


    /**
     * The component has been created by Vue.
     */
    created() {
        var self = this;

        if (IPAPP.userId) {
            this.loadDataForAuthenticatedUser();
        }

        if (IPAPP.userId && IPAPP.usesApi) {
            this.refreshApiTokenEveryFewMinutes();
        }
    },


    /**
     * Prepare the application.
     */
    mounted() {
        this.listen();
        this.whenReady();
    },


    methods: {
        /**
         * Finish bootstrapping the application.
         */
        whenReady() {
            //
        },

        listen() {
            Bus.$on('showFeedbackForm', function () {
                if (self.ipapp.user) {
                    self.feedbackForm.from = self.ipapp.user.email;
                }

                $('#modal-feedback').modal('show');

                setTimeout(() => {
                    $('#feedback-subject').focus();
                }, 500);
            });
            Bus.$on('userDataUpdated', userData =>{
                    this.ipapp.user = userData;
            });
        },
        /**
         * Load the data for an authenticated user.
         */
        loadDataForAuthenticatedUser() {
            // this.getNotifications();
        },


        /**
         * Refresh the current API token every few minutes.
         */
        refreshApiTokenEveryFewMinutes() {
            this.lastRefreshedApiTokenAt = moment();

            setInterval(() => {
                this.refreshApiToken();
            }, 240000);

            setInterval(() => {
                if (this.lastRefreshedApiTokenAt.diff(moment(), 'minutes') >= 5) {
                    this.refreshApiToken();
                }
            }, 5000);
        },


        /**
         * Refresh the current API token.
            refreshApiToken() {
                this.lastRefreshedApiTokenAt = moment();

                this.$http.put('/ipapp/token');
            },
         */


        /*
         * Get the current user of the application.
         */
        getUser() {
            this.$http.get('/user/current')
                .then(response => {
                    this.user = response.data;
                });
        },

        /**
         * Get the application notifications.
         */
        getNotifications() {
            this.loadingNotifications = true;

            this.$http.get('/notifications/recent')
                .then(response => {
                    this.notifications = response.data;
                    this.loadingNotifications = false;
                });
        },

        /**
         * Mark the current notifications as read.
         */
        markNotificationsAsRead() {
            if (!this.hasUnreadNotifications) {
                return;
            }

            this.$http.put('/notifications/read', {
                notifications: _.pluck(this.notifications.notifications, 'id')
            });

            _.each(this.notifications.notifications, notification => {
                notification.read = 1;
            });
        },

        /*
         * Update feedback form level
         * */
        updateFeedbackLevel(level){
            this.feedbackForm.level = level;
        },

        /**
         * Send a customer support request.
         */
        sendFeedbackRequest() {
            IPAPP.post('/feedback', this.feedbackForm)
                .then(() => {
                    $('#modal-feedback').modal('hide');

                    this.showFeedbackRequestSuccessMessage();

                    this.feedbackForm.level = 1;
                    this.feedbackForm.subject = '';
                    this.feedbackForm.message = '';
                });
        },

        /**
         * Show an alert informing the user their support request was sent.
         */
        showFeedbackRequestSuccessMessage() {
            swal({
                title: 'Got It!',
                text: 'We have received your message and will respond soon!',
                type: 'success',
                showConfirmButton: false,
                timer: 2000,
                onOpen: ()=>{
                    console.log('reached');
                }
            });
        },
        logout(){
            document.getElementById('logout-form').submit();
        },
    },


    computed: {
        /**
         * Determine if the user has any unread notifications.
         */
        hasUnreadAnnouncements() {
            if (this.notifications && this.user) {
                if (this.notifications.announcements.length && !this.user.last_read_announcements_at) {
                    return true;
                }

                return _.filter(this.notifications.announcements, announcement => {
                        return moment.utc(this.user.last_read_announcements_at).isBefore(
                            moment.utc(announcement.created_at)
                        );
                    }).length > 0;
            }

            return false;
        },


        /**
         * Determine if the user has any unread notifications.
         */
        hasUnreadNotifications() {
            if (this.notifications) {
                return _.filter(this.notifications.notifications, notification => {
                        return !notification.read;
                    }).length > 0;
            }

            return false;
        },
    }
};
