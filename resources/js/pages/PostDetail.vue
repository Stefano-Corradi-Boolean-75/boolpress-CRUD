<script>

import axios from 'axios'
import {BASE_URL} from '../data/data'
import {formateDate} from '../data/functions'

export default {
    name: 'About',
    data(){
        return{
            post: {}
        }
    },
    methods: {
        getApi(){
            console.log(BASE_URL);
            axios.get(BASE_URL + 'posts/' + this.$route.params.slug)
                .then(res => {
                    this.post = res.data;
                    console.log(res.data);
                })
        }
    },
    computed:{
        formateDate(){
            return formateDate(this.post.date)
        }
    },
    mounted(){
        //console.log(this.$route.params.slug);
        this.getApi();
    }
}
</script>

<template>
      <h1>{{post.title}}</h1>
      <p>{{formateDate}}</p>
      <div v-if="post.category">Categoria: {{post.category.name}}</div>

     <span v-for="tag in post.tags" :key="tag.id" class="tag">{{tag.name}}</span>

     <div>
        <img :src="post.image" :alt="post.title">
     </div>

     <div v-html="post.text"></div>


</template>



<style lang="scss" scoped>
img{
    max-width: 100%;
}

</style>
