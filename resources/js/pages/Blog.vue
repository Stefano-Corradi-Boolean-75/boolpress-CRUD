<script>

import axios from 'axios';
import {BASE_URL} from '../data/data'
import {store} from '../data/store'

import PostItem from '../components/PostItem.vue'
import FormSearch from '../components/FormSearch.vue'

export default {
    name: 'App',
    components:{
        PostItem,
        FormSearch
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
                    store.posts = result.data.posts.data;
                    store.links = result.data.posts.links;
                    console.log(store.links);
                })
        },

    },
    mounted(){
        this.getApi(this.active_base_url);
    }
}
</script>

<template>

    <h1>Elenco post</h1>

    <FormSearch />

    <PostItem v-for="post in store.posts" :key="post.id" :post="post" />


    <div class="paginator">
        <button
            v-for="link in store.links" :key="link.label"
            :disabled="link.active || !link.url"
            @click="getApi(link.url)"
             v-html="link.label" ></button>

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
