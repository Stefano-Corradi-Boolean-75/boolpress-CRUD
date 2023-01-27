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
        <router-view></router-view>
    </main>

</template>



<style lang="scss">

</style>
