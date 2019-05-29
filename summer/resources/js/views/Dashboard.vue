<template>
    <div>
        <h1>Dashboard</h1>
        <hr>
        <button class="btn btn-danger" v-on:click="btnalert()">Go_2_Page_ryeng</button>
        <button class="btn btn-danger" v-on:click="btnalert2()">Go_2_Page_99</button>



    </div>
</template>

<script>
    export default {
        methods: {
            btnalert() {
                this.$router.push({name:"ryeng"})
            },

            btnalert2() {
                this.$router.push({name:"99"})
            }


        }


    }



</script>

