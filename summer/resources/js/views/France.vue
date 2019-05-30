<template>
    <div>
        <h1>France </h1>
        <button class="btn-primary btn-lg" v-on:click="alertto()">Go Home</button>
    </div>

</template>
<script>
    export default {
        methods:{
            alertto(){
                this.$router.push({name:"Home"})
            }
        }
    }
</script>


