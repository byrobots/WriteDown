<template>
  <post-index />
</template>

<script>
/**
 * Internal
 */
import postIndex from '../../components/posts/index'
import template from '../../mixins/template.js'
export default {
  components: { postIndex },
  mixins: [template]
}
</script>
