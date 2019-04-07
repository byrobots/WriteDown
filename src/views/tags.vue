<template>
  <section>
    <tag-form />
    <tag-index />
  </section>
</template>

<script>
/**
 * Internal
 */
import tagForm from '../components/tags/form'
import tagIndex from '../components/tags/index'
import template from '../mixins/template.js'

export default {
  components: { tagIndex },
  mixins: [template]
}
</script>
