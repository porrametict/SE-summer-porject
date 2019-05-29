<template>
    <div>
        <h1>Dashboard</h1>
        <hr>
        <button class="btn btn-primary btn-lg"
                v-on:click="btnAlert">
            GOTO PAGE 2
        </button>
    </div>
</template>
<script>
    export default {
        methods : {
            btnAlert() {
                this.$router.push({name:"page2"})
            }

        }
    }
</script>