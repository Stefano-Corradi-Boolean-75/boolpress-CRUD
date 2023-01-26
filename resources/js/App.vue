<script>

import axios from 'axios';

export default {
    name: 'App',
    data(){
        return {
            baseUrl: 'http://127.0.0.1:8000/api/',
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
            axios.get(this.baseUrl + 'posts', {
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
        truncateText(text){
            if(text.length > this.contentMaxLength){
                return text.substr(0, this.contentMaxLength) + ' ...';
            }
            return text;
        }
    },
    mounted(){
        this.getApi(1);
    }
}
</script>

<template>
<div class="container">

    <h1>Elenco post</h1>

    <div>
        <div v-for="post in posts" :key="post.id" class="post-box">
            <h3>{{post.title}}</h3>
            <h4 v-if="post.category">Categoria: {{post.category.name}}</h4>
            <div class="tags" v-if="post.tags.length" >
                <span v-for="tag in post.tags" :key="tag.id">{{tag.name}}</span>
            </div>
            <p v-html="truncateText(post.text)"></p>
            <p class="caption">By {{post.user.name}}</p>
        </div>
    </div>

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

</div>
</template>



<style>

</style>
