<template>
  <tag-index />
</template>

<script>
/**
 * Internal
 */
import tagIndex from '../components/tags/index'
import template from '../mixins/template.js'

export default {
  components: { tagIndex },
  mixins: [template]
}
</script>
