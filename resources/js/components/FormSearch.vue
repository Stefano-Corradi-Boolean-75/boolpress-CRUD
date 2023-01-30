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

            const data = new FormData();
            data.append('tosearch',this.tosearch);

            axios.post(BASE_URL + 'posts/search', data)
                .then(result => {
                    this.tosearch = '';
                    store.posts = result.data.posts.data;
                    console.log(result.data);
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
