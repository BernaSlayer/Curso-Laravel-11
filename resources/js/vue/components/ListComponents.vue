<template>
    <div>
        <h1> Post List</h1>
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
       </o-table>

       <o-pagination
        v-if="posts.data && posts.data.length > 0" 
       @change="updatePage"
       :total="posts.total"
        v-model:curent="currentPage"
        :range-before="2"
        :range-after="2"
        size="small"
        :simple="false"
        :rounded="true"
        :perPage="posts.per_page"
       
       
       >


       </o-pagination>

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
        updatePage(){
            console.log(this.currentPage)
        },
        listPage() {
            this.$axios.get('/api/post?page='+this.currentPage).then((res) => { 
                this.posts = res.data
                this.isLoading = false
            })
        }
    },
}
</script> 
 