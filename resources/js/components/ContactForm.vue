<script>
import axios from 'axios'
import {BASE_URL} from '../data/data'

export default {
    name: 'ContactForm',
    data(){
        return{
            name: '',
            email: '',
            message: '',
            errors : {},
            loading: false,
            showform: true
        }
    },
    methods:{
        sendForm(){
            this.loading = true;
            const data = {
                name: this.name,
                email: this.email,
                message: this.message
            }

            axios.post(`${BASE_URL}contacts`, data)
                .then(result => {
                    this.loading = false;
                    this.showform = false;
                    if(!result.data.success){
                        this.errors = result.data.errors;
                    }else{
                        // ripulisco il form
                        this.name = '';
                        this.email = '';
                        this.message = '';
                        this.errors = {};
                    }
                })
        }
    }
}
</script>

<template>
<form v-if="showform" @submit.prevent="sendForm()">
    <div>
        <input :class="{'is-invalid': errors.name}" v-model.trim="name" type="text" placeholder="Nome">
        <p v-for="(error, index) in errors.name" :key="'name'+index" class="error">{{error}}</p>
    </div>
    <div>
        <input :class="{'is-invalid': errors.email}" v-model.trim="email" type="text"  placeholder="Email">
        <p v-for="(error, index) in errors.email" :key="'email'+index" class="error">{{error}}</p>
    </div>
    <div>
        <textarea  :class="{'is-invalid': errors.message}" v-model.trim="message"   id="" cols="30" rows="10"></textarea>
        <p v-for="(error, index) in errors.message" :key="'message'+index" class="error">{{error}}</p>
    </div>
    <button type="submit" :disabled="loading">{{ loading ? 'invio in corso...' : 'Invia' }}</button>
</form>
<h3 v-else> Email inviata correttamente </h3>

</template>


<style lang="scss" scoped>
form{
    div{
        padding-bottom: 30px;
    }
    input, textarea{
        width: 400px;
        padding: 5px 10px;
        border-radius: 5px;
        border: 1px solid lightgray;
        margin-right: 20px;
    }

    button{
        cursor: pointer;
        background-color: white;
        padding: 5px 10px;
        border: 1px solid brown;
        border-radius: 5px;
    }
    .is-invalid{
        border: 1px solid red;
    }
    .error{
        font-size: .9rem;
        color: red;
        margin: 0;
    }
}
</style>
