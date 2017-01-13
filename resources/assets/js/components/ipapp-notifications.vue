<template>
    <div>
        <div class="modal docked docked-right" id="modal-notifications" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <div class="btn-group">
                            <button class="btn btn-default" :class="{'active': showingNotifications}" @click="showNotifications" style="width: 50%;">
                                Notifications
                            </button>

                            <button class="btn btn-default" :class="{'active': showingAnnouncements}" @click="showAnnouncements" style="width: 50%;">
                                Announcements <i class="glyphicon glyphicon-circle text-danger p-l-xs" v-if="hasUnreadAnnouncements"></i>
                            </button>
                        </div>
                    </div>

                    <div class="modal-body">
                        <!-- Informational Messages -->
                        <!--<div class="notification-container" v-if="loadingNotifications">
                            <i class="glyphicon glyphicon-refresh gly-spin"></i>Loading Notifications
                        </div>-->

                        <div class="notification-container" v-if=" ! loadingNotifications && activeNotifications.length == 0">
                            <div class="alert alert-warning m-b-none">
                                We don't have anything to show you right now! But when we do,
                                we'll be sure to let you know. Talk to you soon!
                            </div>
                        </div>

                        <!-- List Of Notifications -->
                        <div class="notification-container" v-if="showingNotifications && hasNotifications">
                            <div class="notification" v-for="notification in notifications.notifications">

                                <!-- Notification -->
                                <div class="notification-content">
                                    <div class="meta">
                                        <div class="title">
                                            {{ notification.data.title }}
                                        </div>
                                        <div class="date">
                                            {{ notification.created_at | relative }}
                                        </div>
                                    </div>

                                    <div v-html="notification.data.body" class="notification-body">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- List Of Announcements -->
                        <div class="notification-container" v-if="showingAnnouncements && hasAnnouncements">
                            <div class="notification" v-for="announcement in notifications.announcements">

                                <!-- Notification Icon -->
                                <figure>
                                    <img :src="announcement.creator.photo_url" class="spark-profile-photo">
                                </figure>

                                <!-- Announcement -->
                                <div class="notification-content">
                                    <div class="meta">
                                        <p class="title">{{ announcement.creator.name }}</p>

                                        <div class="date">
                                            {{ announcement.created_at | relative }}
                                        </div>
                                    </div>

                                    <div class="notification-body">
                                        {{ announcement.parsed_body }}
                                    </div>

                                    <!-- Announcement Action -->
                                    <a :href="announcement.action_url" class="btn btn-primary" v-if="announcement.action_text">
                                        {{ announcement.action_text }}
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="babel">
    export default{
        props: ['notifications','hasUnreadAnnouncements','loadingNotifications'],

        /**
         * The component's data.
         */
        data() {
            return {
                showingNotifications: true,
                showingAnnouncements: false
            }
        },


        methods: {
            /**
             * Show the user notifications.
             */
            showNotifications() {
                this.showingNotifications = true;
                this.showingAnnouncements = false;
            },


            /**
             * Show the product announcements.
             */
            showAnnouncements() {
                this.showingNotifications = false;
                this.showingAnnouncements = true;

                this.updateLastReadAnnouncementsTimestamp();
            },


            /**
             * Update the last read announcements timestamp.
             */
            updateLastReadAnnouncementsTimestamp() {
                this.$http.put('/user/last-read-announcements-at')
                    .then(() => {
                        this.$dispatch('updateUser');
                    });
            }
        },


        computed: {
            /**
             * Get the active notifications or announcements.
             */
            activeNotifications() {
                if ( ! this.notifications) {
                    return [];
                }

                if (this.showingNotifications) {
                    return this.notifications.notifications;
                } else {
                    return this.notifications.announcements;
                }
            },


            /**
             * Determine if the user has any notifications.
             */
            hasNotifications() {
                return this.notifications && this.notifications.notifications.length > 0;
            },


            /**
             * Determine if the user has any announcements.
             */
            hasAnnouncements() {
                return this.notifications && this.notifications.announcements.length > 0;
            }
        }

    }
</script>
