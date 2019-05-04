<template>
  <post-form />
</template>

<script>
/**
 * Internal
 */
import template from '../../mixins/template.js'
import postForm from '../../components/posts/form'

export default {
  components: { postForm },
  mixins: [template]
}
</script>
