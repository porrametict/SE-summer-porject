<template>
    <div>
        <div class="row">
            <div class="col-md-3">
                <h3>หัวข้อแบบสอบถาม &nbsp; &nbsp;:</h3>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control form-control-lg btn-outline-primary btn-lg"
                       placeholder="กรุณากรอกหัวข้อแบบสอบถามของท่าน">
            </div>
            <div class="flex-center position-center">

                <button type="button" class="btn btn-primary btn-lg" @click="gotoSurveyAnswers">คำตอบ</button>

            </div>
        </div>
        <br/><br/><br/>
        <div>
            <h3>รายงานแบบสอบถาม</h3>
        </div>

        <hr>


    </div>
</template>

<script>
    export default {
        methods: {
            gotoSurveyAnswers() {
                this.$router.push({name: "SurveyAnswers"})
            }
        }
    }
</script>

<style scoped>

</style>