<script>

import axios from 'axios';
import {BASE_URL} from '../data/data'
import {store} from '../data/store'

import PostItem from '../components/PostItem.vue'
import FormSearch from '../components/FormSearch.vue'
import AsideCategoryTag from '../components/AsideCategoryTag.vue'

export default {
    name: 'App',
    components:{
        PostItem,
        FormSearch,
        AsideCategoryTag
    },
    data(){
        return {
            BASE_URL,
            store,
            contentMaxLength: 150,
            active_base_url: BASE_URL + 'posts'
        }
    },
    methods:{

        getApi(url){
            axios.get(url)
                .then(result => {
                    store.main_title = 'Elenco post';
                    store.posts = result.data.posts.data;
                    store.links = result.data.posts.links;
                    store.categories = result.data.categories;
                    store.tags = result.data.tags;
                    store.show_paginate = true;
                    //console.log(store.tags);
                })
        },



    },
    mounted(){
        this.getApi(this.active_base_url);
    }
}
</script>

<template>

    <div class="wrapper">
        <div class="container-posts">
            <h1>{{store.main_title}}</h1>

            <FormSearch />

            <PostItem v-for="post in store.posts" :key="'post'+post.id" :post="post" />


            <div v-if="store.show_paginate" class="paginator">
                <button
                    v-for="link in store.links" :key="link.label"
                    :disabled="link.active || !link.url"
                    @click="getApi(link.url)"
                    v-html="link.label" ></button>

            </div>
        </div>

        <AsideCategoryTag @getApi="getApi()" />

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
.wrapper{
    display: flex;
    .container-posts{
        width: 70%;
    }


}

</style>
