<script>

import Header from './partials/Header.vue'

export default {
    name:'App',
    components:{
        Header
    }
}
</script>


<template>

    <Header />
    <main class="container">
        <!-- qui vengono caricati tutti i componenti delle pagine del router -->


         <router-view v-slot="{ Component }" class="page">
            <transition name="fade">
                <component :is="Component" />
            </transition>
         </router-view>


    </main>

</template>



<style lang="scss" scoped>
.container{
    position: relative;
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
    .page{
        position: absolute;
    }
}


.fade-enter-from,
.fade-leave-to{
    opacity: 0;
}

.fade-enter-active,
.fade-leave-active{
    transition: opacity 1s ease-out;
}

</style>
