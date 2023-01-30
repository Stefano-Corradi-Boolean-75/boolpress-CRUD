<script>

import axios from 'axios';
import {BASE_URL} from '../data/data'
import {store} from '../data/store'

export default {
    name:'FormSearch',
    data(){
        return{
            tosearch: '',
            store
        }
    },
    methods:{
        getApi(){
            axios.get(BASE_URL + 'posts/search', {
                params:{
                    tosearch: this.tosearch
                }
            })
                .then(result => {
                    this.tosearch = '';
                    store.posts = result.data;
                    store.show_paginate = false;
                })

        }
    }
}
</script>

<template>

    <input v-model.trim="tosearch" @keyup.enter="getApi"  type="text" placeholder="Cerca">
    <button @click="getApi">Invia</button>

</template>


<style lang="scss" scoped>
input{
    margin-bottom: 30px;
    width: 400px;
    padding: 5px 10px;
    border-radius: 5px;
    border: 1px solid brown;
    margin-right: 20px;
}

button{
    cursor: pointer;
    background-color: white;
    padding: 5px 10px;
    border: 1px solid brown;
    border-radius: 5px;
}
</style>
