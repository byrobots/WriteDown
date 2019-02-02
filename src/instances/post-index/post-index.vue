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
                <tr v-for="post in posts">
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
                    <td>Edit</td>
                    <td>Delete</td>
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

Date.prototype.getFullHours = getFullHours;
Date.prototype.getFullMinutes = getFullMinutes;
Date.prototype.getFullSeconds = getFullSeconds;

export default {
    beforeMount () {
        API.post().index()
            .then(response => {
                let data = response.data.data;
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
            }).catch();
    },
    data: () => ({
        posts: [],
    }),
    mixins: [template],
};
</script>
