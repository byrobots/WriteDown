/**
 * Internal
 */
import API from '../../../library/api';
import getFullHours from '../../../prototypes/get-full-hours.js';
import getFullMinutes from '../../../prototypes/get-full-minutes.js';
import getFullSeconds from '../../../prototypes/get-full-seconds.js';
import spinner from '../../spinner';

// Add prototypes for working with time values.
Date.prototype.getFullHours   = getFullHours;
Date.prototype.getFullMinutes = getFullMinutes;
Date.prototype.getFullSeconds = getFullSeconds;

/**
 * The component
 */
export default {
    components: {spinner},
    data: () => ({
        posts: null,
    }),
    methods: {
        /**
         * Use the response from the API call to populate the posts table.
         *
         * @param  {Object} response The response from the API.
         */
        populateTable (response) {
            const data = response.data.data;
            data.forEach((post, index) => {
                // If we have a publish_at value convert it to a DateTime
                // object. We'll then use that to establish if a post is
                // unpublished, published or scheduled to be published.
                if (null !== post.publish_at) {
                    const timestamp        = Date.parse(post.publish_at.date);
                    data[index].publish_at = new Date(timestamp);
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
        confirmDelete (event) {
            event.preventDefault();

            if (window.confirm('Are you sure? This can not be undone.')) {
                const postID = event.currentTarget.getAttribute('data-post');

                // Delete from database.
                API.post().delete(postID)
                    .then(() => {
                        // Delete from the page.
                        const index = event.srcElement.getAttribute('data-index');
                        this.posts.splice(index, 1);

                        // TODO: Success message
                    })
                    .catch(() => {/* TODO: Error message */});
            }
        },
    },

    /**
     * Once the component is mounted grab the posts from the API.
     */
    mounted: function () {
        API.post().index()
            .then(this.populateTable)
            .catch(/* TODO: Error message */);
    },
};
