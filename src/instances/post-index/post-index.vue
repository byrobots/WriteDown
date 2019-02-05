<template>
    <section>
        <p v-if="posts.length < 1">No posts yet. Why not write one?</p>

        <table class="tabulated-data" id="posts-table" v-if="posts.length > 0">
            <thead>
                <tr>
                    <th class="post-id-column">#</th>
                    <th class="post-title-column">Title</th>
                    <th class="post-published-column">Published?</th>
                    <th class="post-edit-column"></th>
                    <th class="post-delete-column"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(post, index) in posts">
                    <td v-text="post.id" />
                    <td v-text="post.title" />
                    <td>
                        <span v-if="null === post.publish_at">No</span>
                        <span v-else-if="new Date() > post.publish_at">Yes</span>
                        <span v-else>
                            Scheduled for {{ post.publish_at.toLocaleDateString() }} at
                            {{ post.publish_at.getFullHours() }}:{{ post.publish_at.getFullMinutes() }}:{{ post.publish_at.getFullSeconds() }}
                        </span>
                    </td>
                    <td>
                        <a
                            v-bind:href="`/admins/posts/${post.id}/edit`"
                            v-bind:data-post="post.id"
                        >
                            Edit
                        </a>
                    </td>
                    <td>
                        <a
                            v-bind:href="`/admin/posts/${post.id}/delete`"
                            v-bind:data-post="post.id"
                            v-bind:data-index="index"
                            @click="confirmDelete"
                        >
                            Delete
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</template>

<script>
/**
 * Internal
 */
import API from '../../library/api';
import getFullHours from '../../prototypes/get-full-hours.js';
import getFullMinutes from '../../prototypes/get-full-minutes.js';
import getFullSeconds from '../../prototypes/get-full-seconds.js';
import template from '../../mixins/template.js';

/**
 * Add prototypes for working with time values.
 */
Date.prototype.getFullHours   = getFullHours;
Date.prototype.getFullMinutes = getFullMinutes;
Date.prototype.getFullSeconds = getFullSeconds;

export default {
    /**
     * Before we mount the componet request the posts from the API.
     */
    beforeMount () {
        API.post().index()
            .then(this.populateTable)
            .catch(/* TODO */);
    },
    data: () => ({
        posts: [],
    }),
    methods: {
        /**
         * Use the response from the API call to populate the posts table.
         *
         * @param  {Object} response The response from the API.
         */
        populateTable: function (response) {
            const data = response.data.data;
            data.forEach((post, index) => {
                // If we have a publish_at value convert it to a DateTime
                // object. We'll then use that to establish if a post is
                // unpublished, published or scheduled to be published.
                if (null !== post.publish_at) {
                    data[index].publish_at = new Date(
                        Date.parse(post.publish_at.date)
                    );
                }
            });

            this.posts = data;
        },

        /**
         * Confirm the user wants to delete the post. When confirmed the post
         * will be deleted.
         *
         * @param {Object} event The click event, which will contain the element
         *                       that was clicked.
         */
        confirmDelete: function (event) {
            event.preventDefault();

            if (window.confirm('Are you sure? This can not be undone.')) {
                const postID = event.currentTarget.getAttribute('data-post');

                // Delete from database.
                API.post().delete(postID)
                    .then(() => {
                        // Delete from the page.
                        this.posts = this.posts.splice(event.currentTarget.getAttribute('data-index'), 1);

                        // TODO: Success message
                    })
                    .catch(/* TODO: Error message */);
            }
        },
    },
    mixins: [template],
};
</script>
