<template>
  <section>
    <p
      v-if="null !== posts && posts.length < 1"
      class="no-content-placeholder"
    >
      No posts yet. Why not <a href="/admin/posts/new">write one</a>?
    </p>

    <ol
      v-if="null !== posts && posts.length > 0"
      class="item-list post-list"
    >
      <li
        v-for="(post, index) in posts"
        :key="post.id"
        class="item-list__item"
      >
        <h3
          class="post-list__title"
          v-text="post.title"
        />

        <p class="post-list__publish-information">
          <span v-if="null === post.publish_at">Not Published</span>
          <span v-else-if="new Date() > post.publish_at">Published</span>
          <span v-else>Scheduled for {{ post.date_string }}</span>
        </p>

        <p
          v-if="post.excerpt"
          v-text="post.excerpt"
        />

        <p class="post-list__tools">
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

    <pagination
      v-if="postPagination.total_pages > 1"
      :key="componentKey"
      :pagination="postPagination"
      @gotoPage="gotoPage"
    />
  </section>
</template>

<script src="./component.js"></script>
