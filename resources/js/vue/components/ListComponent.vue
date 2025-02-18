<template>
 <div>
            <h1>Post List</h1>
            
            <o-button iconLeft="plus" variant="primary" @click="$router.push({name:'save'})">Create</o-button>
                     
          
          <div class="mb-5"></div>

          <o-table :data="posts.data" :loading="isLoading" :current-page="currentPage">
          <o-table-column label="ID" field="id" v-slot="p">
              {{ p.row.id }}
          </o-table-column>
          <o-table-column label="Title" field="title" v-slot="p">
              {{ p.row.title }}
          </o-table-column>
          <o-table-column label="Posted" field="posted" v-slot="p">
              {{ p.row.posted }}
          </o-table-column>
          <o-table-column label="Category" field="category_id" v-slot="p">
              {{ p.row.category_id }}
          </o-table-column>
          <o-table-column label="Content" field="content" v-slot="p">
              {{ p.row.content }}
          </o-table-column>
          <o-table-column label="Actions" v-slot="p">
              <div class="flex items-center gap-6">
            <router-link :to="{ name: 'edit', params: { slug: p.row.slug } }">
              <o-button iconLeft="pencil" variant="primary" rounded size="small">Edit</o-button>
            </router-link>
            <o-button iconLeft="delete" variant="danger" size="small" rounded @click="deletePost(p)">Delete</o-button>
        </div>
          </o-table-column>


      </o-table>
      <o-pagination
          v-if="posts.data && posts.data.length > 0"
          @change="updatePage"
          :total="posts.total"
          v-model:current="currentPage"
          :range-before="2"
          :range-after="2"
          size="small"
          :simple="false"
          :rounded="true"
          :per-page="posts.per_page"
      />
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      posts: {
        data: [],
        total: 0,
        per_page: 10,
      },
      isLoading: true,
      currentPage: 1,
    };
  },
  mounted() {
    this.listPage(this.currentPage);
  },
  methods: {
    updatePage(page) {
      this.currentPage = page;
      this.listPage(page);
    },
    async listPage(page) {
      this.isLoading = true;
      try {
        const res = await axios.get(`/api/post?page=${page}`);
        this.posts = res.data;
      } catch (error) {
        console.error('Error al obtener los posts:', error);
      } finally {
        this.isLoading = false;
      }
    },
    deletePost(row)  { 
        axios.delete('/api/post/' + row.row.id)
        .then(() => {
          this.listPage(this.currentPage);
        })
        .catch(error => {
          console.error('Error al eliminar el post:', error);
        });
      },

},
};
</script>