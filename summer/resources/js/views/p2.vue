<template>
    <div>
        <h1>Page  2 </h1>
        <button class="btn-primary btn-lg" v-on:click="alertto()">Go to France</button>
    </div>

</template>
<script>
    export default {
        methods:{
            alertto(){
                this.$router.push({name:"France"})
            }
        }
    }
</script>