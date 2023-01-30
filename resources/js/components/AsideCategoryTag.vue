<script>

import axios from 'axios';
import {BASE_URL} from '../data/data'
import {store} from '../data/store'

export default {
    name: 'AsideCategoryTag',
    data(){
        return{
            store
        }
    },
    methods:{
         getApiByCategoryTag(uri,id){
            console.log(`${BASE_URL}posts/${uri}/${id}`);
            axios.get(`${BASE_URL}posts/${uri}/${id}`)
                .then( result => {
                    console.log(result.data);
                    store.posts = result.data;
                    store.show_paginate = false;
                })
        },
        setMainTitle(title){
            store.main_title = title;
        }
    }
}
</script>


<template>
<aside>
            <div class="categories">

                <h2>Categorie</h2>
                <button v-for="category in store.categories" :key="'cat'+category.id"
                    @click="getApiByCategoryTag('post-category',category.id); setMainTitle('Elenco post per categoria '+category.name)"
                 >
                    {{category.name}}
                </button>

                <h2>Tag</h2>
                <button v-for="tag in store.tags" :key="'tags'+tag.id"
                    @click="getApiByCategoryTag('post-tag',tag.id); setMainTitle('Elenco post per tag '+tag.name)"
                 >
                    {{tag.name}}
                </button>

                <button
                    @click="$emit('getApi')"
                 >
                   Tutti i post
                </button>
            </div>
        </aside>
</template>


<style lang="scss" scoped>
.categories{
        padding-left: 90px;
        button{
            display: block;
            margin: 20px 0;
            padding: 5px 10px;
        }
    }
</style>
