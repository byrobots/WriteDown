/**
 * External
 */
window.SimpleMDE = require('simplemde');

/**
 * The component's defintion
 */
export default {
    data: () => ({
        editor: null,
    }),
    props: ['identifier', 'label'],
    mounted: function () {
        this.editor = new SimpleMDE({
            element: document.getElementById(this.identifier),
        });
    },
};
