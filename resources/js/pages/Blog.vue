<script>

import axios from 'axios';
import {BASE_URL} from '../data/data'

import PostItem from '../components/PostItem.vue'

export default {
    name: 'App',
    components:{
        PostItem
    },
    data(){
        return {
            BASE_URL,
            posts : [],
            contentMaxLength: 150,
            pagination:{
                current: 1,
                last:null
            }
        }
    },
    methods:{
        getApi(page){
            this.pagination.current = page;
            axios.get(this.BASE_URL + 'posts', {
                params:{
                    page: this.pagination.current
                }
            })
                .then(result => {
                    this.posts = result.data.posts.data;
                    this.pagination.current = result.data.posts.current_page
                    this.pagination.last = result.data.posts.last_page
                    console.log(this.pagination);
                })
        },

    },
    mounted(){
        this.getApi(1);
    }
}
</script>

<template>

    <h1>Elenco post</h1>

    <PostItem v-for="post in posts" :key="post.id" :post="post" />


    <div class="paginator">
        <button
            :disabled="pagination.current === 1"
            @click="getApi(1)"
            > |	&lt; </button>

        <button
            :disabled="pagination.current === 1"
            @click="getApi(pagination.current - 1)"
            > &larr; </button>

        <button
            v-for="i in pagination.last" :key="i"
            :disabled="pagination.current === i"
            @click="getApi(i)"
            > {{i}} </button>

        <button
            :disabled="pagination.current === pagination.last"
            @click="getApi(pagination.current + 1)"
            > &rarr; </button>

        <button
            :disabled="pagination.current === pagination.last"
            @click="getApi(pagination.last)"
            > >| </button>
    </div>


</template>



<style lang="scss" scoped>

.paginator{
    text-align: center;
    button{
        padding: 5px 10px;
        margin: 0 3px;
    }

}

</style>
