<template>
  <section>
    <post-form action="/admin/posts" />
  </section>
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
