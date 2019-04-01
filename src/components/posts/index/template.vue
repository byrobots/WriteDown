<template>
  <section>
    <p
      v-if="null !== posts && posts.length < 1"
      class="no-content-placeholder"
    >
      No posts yet. Why not write one?
    </p>

    <ol
      v-if="null !== posts && posts.length > 0"
      class="post-list"
    >
      <li
        v-for="(post, index) in posts"
        :key="post.id"
      >
        <h3 v-text="post.title" />

        <p class="publish-information">
          <span v-if="null === post.publish_at">Not Published</span>
          <span v-else-if="new Date() > post.publish_at">Published</span>
          <span v-else>
            Scheduled for
            {{ post.publish_at.toLocaleDateString() }} at
            {{ getFullHours(post.publish_at) }}:{{ getFullMinutes(post.publish_at) }}:{{ getFullSeconds(post.publish_at) }}
          </span>
        </p>

        <p
          v-if="post.excerpt"
          v-text="post.excerpt"
        />

        <p class="post-tools">
          <a
            :href="`/admin/posts/${post.id}/edit`"
            :data-post="post.id"
          >Edit</a>

          <span class="separator">|</span>

          <a
            :href="`/admin/posts/${post.id}/delete`"
            :data-post="post.id"
            :data-index="index"
            @click="confirmDelete"
          >Delete</a>
        </p>
      </li>
    </ol>
  </section>
</template>

<script>
  import getFullHours from "../../../helpers/get-full-hours.js"
  import getFullMinutes from "../../../helpers/get-full-minutes.js"
  import getFullSeconds from "../../../helpers/get-full-seconds.js"
</script>

<script src="./component.js"></script>
