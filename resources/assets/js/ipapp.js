'use strict';

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
    data: function data() {
        return {
            loadingNotifications: false,
            notifications: null,
            feedbackForm: new Form({
                from: '',
                level: 1,
                subject: '',
                message: ''
            })
        };
    },


    /**
     * The component has been created by Vue.
     */
    created: function created() {
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
    mounted: function mounted() {
        this.listen();
        this.whenReady();
    },


    methods: {
        /**
         * Finish bootstrapping the application.
         */
        whenReady: function whenReady() {
            //
        },
        listen: function listen() {
            Bus.$on('showFeedbackForm', function () {
                if (self.ipapp.user) {
                    self.feedbackForm.from = self.ipapp.user.email;
                }

                $('#modal-feedback').modal('show');

                setTimeout(function () {
                    $('#feedback-subject').focus();
                }, 500);
            });
            Bus.$on('showNewProblemForm', function () {
                $('#new-problem-modal').modal('show');
                setTimeout(function () {
                    $('#npm-title').focus();
                }, 500);
            });
        },

        /**
         * Load the data for an authenticated user.
         */
        loadDataForAuthenticatedUser: function loadDataForAuthenticatedUser() {
            this.getNotifications();
        },


        /**
         * Refresh the current API token every few minutes.
         */
        refreshApiTokenEveryFewMinutes: function refreshApiTokenEveryFewMinutes() {
            var _this = this;

            this.lastRefreshedApiTokenAt = moment();

            setInterval(function () {
                _this.refreshApiToken();
            }, 240000);

            setInterval(function () {
                if (_this.lastRefreshedApiTokenAt.diff(moment(), 'minutes') >= 5) {
                    _this.refreshApiToken();
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
        getUser: function getUser() {
            var _this2 = this;

            this.$http.get('/user/current').then(function (response) {
                _this2.user = response.data;
            });
        },


        /**
         * Get the application notifications.
         */
        getNotifications: function getNotifications() {
            var _this3 = this;

            this.loadingNotifications = true;

            this.$http.get('/notifications/recent').then(function (response) {
                _this3.notifications = response.data;
                _this3.loadingNotifications = false;
            });
        },


        /**
         * Mark the current notifications as read.
         */
        markNotificationsAsRead: function markNotificationsAsRead() {
            if (!this.hasUnreadNotifications) {
                return;
            }

            this.$http.put('/notifications/read', {
                notifications: _.map(this.notifications.notifications, 'id')
            });

            _.each(this.notifications.notifications, function (notification) {
                notification.read_at = new Date();
            });
        },


        /*
         * Update feedback form level
         * */
        updateFeedbackLevel: function updateFeedbackLevel(level) {
            this.feedbackForm.level = level;
        },


        /**
         * Send a customer support request.
         */
        sendFeedbackRequest: function sendFeedbackRequest() {
            var _this4 = this;

            IPAPP.post('/feedback', this.feedbackForm).then(function () {
                $('#modal-feedback').modal('hide');

                _this4.showFeedbackRequestSuccessMessage();

                _this4.feedbackForm.level = 1;
                _this4.feedbackForm.subject = '';
                _this4.feedbackForm.message = '';
            });
        },
        submitNewProblem: function submitNewProblem() {},


        /**
         * Show an alert informing the user their support request was sent.
         */
        showFeedbackRequestSuccessMessage: function showFeedbackRequestSuccessMessage() {
            swal({
                title: 'Got It!',
                text: 'We have received your message and will respond soon!',
                type: 'success',
                showConfirmButton: false,
                timer: 2000,
                onOpen: function onOpen() {
                    console.log('reached');
                }
            });
        },
        logout: function logout() {
            document.getElementById('logout-form').submit();
        },


        /**
         * Show the user's notifications.
         */
        showNotifications: function showNotifications() {
            $("#modal-notifications").modal('show');

            this.markNotificationsAsRead();
        }
    },

    computed: {
        /**
         * Determine if the user has any unread notifications.
         */
        hasUnreadAnnouncements: function hasUnreadAnnouncements() {
            var _this5 = this;

            if (this.notifications && this.user) {
                if (this.notifications.announcements.length && !this.user.last_read_announcements_at) {
                    return true;
                }

                return _.filter(this.notifications.announcements, function (announcement) {
                        return moment.utc(_this5.user.last_read_announcements_at).isBefore(moment.utc(announcement.created_at));
                    }).length > 0;
            }

            return false;
        },


        /**
         * Determine if the user has any unread notifications.
         */
        hasUnreadNotifications: function hasUnreadNotifications() {
            if (this.notifications) {
                return _.filter(this.notifications.notifications, function (notification) {
                        return !notification.read_at;
                    }).length > 0;
            }

            return false;
        }
    }
};