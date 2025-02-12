<template>
    <div>
        <h1> Post List</h1>
       <o-table :data="posts" :loading="isLoading" :current-page="currentPage">
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
       </o-table>


    </div>
</template>
<script>
export default {
    data() {
        return {
            posts: [],
            isLoading: true,
            currentPage: 1,
        }
    },

    mounted() {
            this.listPage()
        },

    methods: {
        listPage() {
            this.$axios.get('/api/post').then((res) => { 
                this.posts = res.data.data
                this.isLoading = false
            })
        }
    },
}
</script> 
 