<template>

        <router-link :to="{ name: 'save' }">Create</router-link>
    <div>
        <h1>Post List</h1>
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
            <o-table-column label="Actions" field="category_id" v-slot="p">

                <router-link :to="{ name: 'save', params:{'slug': p.row.slug} }">Edit</router-link>
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
export default {
    data() {
        return {
            posts: {},
            isLoading: true,
            currentPage: 1,
        }
    },

    mounted() {
        this.listPage(this.currentPage)
    },

    methods: {
        updatePage(page) {
            this.currentPage = page;
            this.listPage(page);
        },

        listPage(page) {
            this.isLoading = true;
            this.$axios.get('/api/post?page=' + page).then((res) => {
                this.posts = res.data;
                this.isLoading = false;
            });
        }
    },
}
</script>