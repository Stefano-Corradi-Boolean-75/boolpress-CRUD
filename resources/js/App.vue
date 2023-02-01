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


         <router-view v-slot="{ Component, route }" class="page">
            <transition
                :enter-active-class="route.meta.enterClass"
                :leave-active-class="route.meta.leaveClass"
            >
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


</style>

animate__animated animate__fadeOut
