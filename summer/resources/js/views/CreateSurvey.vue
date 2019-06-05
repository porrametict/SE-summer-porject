<template>
    <div align="right">
        <button class="btn btn-outline-info btn-lg">Create</button>
    </div>
</template>
<script>
    export default {
        name: "CreateSurvey",
        data : () => ({
            form : {
                hSurvey : "",
                questions : [],
            },
            questions: [],
            question:{
                no : 1,
                text : ""
            }
        })
    }
</script>

<style scoped>

</style>