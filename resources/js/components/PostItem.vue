<script>

import {truncateText, formateDate} from '../data/functions'


export default {
    name: 'PostItem',
    data(){
        return{
            truncateText,
            contentMaxLength: 150
        }
    },
    props:{
        post: Object
    },
    computed:{
        formateDate(){
            return formateDate(this.post.date)
        }
    }
}
</script>


<template>

    <div>
        <div  class="post-box">
            <div class="top">
                 <h3>
                    <router-link :to="{name: 'detail', params:{slug: post.slug} }">{{post.title}}</router-link>
                 </h3>
                 <p class="date">{{formateDate}}</p>
            </div>
            <h4 v-if="post.category">Categoria: {{post.category.name}}</h4>
            <div class="tags" v-if="post.tags.length" >
                <span v-for="tag in post.tags" :key="'tag'+tag.id">{{tag.name}}</span>
            </div>
            <p v-html="truncateText(post.text, contentMaxLength)"></p>
            <p class="caption">By {{post.user.name}}</p>
        </div>
    </div>

</template>


<style lang="scss" scoped>

.post-box{
    border-bottom: 1px solid brown;
    margin-bottom: 20px;
    .top{
        display: flex;
        justify-content: space-between;
    }
}

a{
    text-decoration: none;
    color: brown;
    &:hover{
        text-decoration: underline;
    }
}
.tags{
    span{
        display: inline-block;
        background: brown;
        color: white;
        padding: 2px 5px;
        font-size: .9rem;
        border-radius: 5px;
        margin: 10px 10px;
    }
}

</style>
