<template>
  <section>
    <spinner v-if="null === posts" />

    <p v-if="null !== posts && posts.length < 1">
      No posts yet. Why not write one?
    </p>

    <table
      v-if="null !== posts && posts.length > 0"
      id="posts-table"
      class="tabulated-data"
    >
      <thead>
        <tr>
          <th class="post-id-column">
            #
          </th>
          <th class="post-title-column">
            Title
          </th>
          <th class="post-published-column">
            Published?
          </th>
          <th class="post-edit-column" />
          <th class="post-delete-column" />
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="(post, index) in posts"
          :key="post.id"
        >
          <td v-text="post.id" />
          <td v-text="post.title" />
          <td>
            <span v-if="null === post.publish_at">No</span>
            <span v-else-if="new Date() > post.publish_at">Yes</span>
            <span v-else>
              Scheduled for
              {{ post.publish_at.toLocaleDateString() }} at
              {{ getFullHours(post.publish_at) }}:{{ getFullMinutes(post.publish_at) }}:{{ getFullSeconds(post.publish_at) }}
            </span>
          </td>
          <td>
            <a
              :href="`/admin/posts/${post.id}/edit`"
              :data-post="post.id"
            >Edit</a>
          </td>
          <td>
            <a
              :href="`/admin/posts/${post.id}/delete`"
              :data-post="post.id"
              :data-index="index"
              @click="confirmDelete"
            >Delete</a>
          </td>
        </tr>
      </tbody>
    </table>
  </section>
</template>

<script>
import getFullHours from "../../../helpers/get-full-hours.js";
import getFullMinutes from "../../../helpers/get-full-minutes.js";
import getFullSeconds from "../../../helpers/get-full-seconds.js";
</script>

<script src="./component.js"></script>
