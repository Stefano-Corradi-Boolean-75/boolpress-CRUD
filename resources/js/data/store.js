import {reactive} from 'vue'


export const store = reactive({

    posts:[],
    categories:[],
    tags:[],
    links:[],
    show_paginate: true,
    main_title: 'Elenco post'

});
