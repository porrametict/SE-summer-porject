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
            <div class="col-12 mt-5">
                    <h3>รายงานแบบสอบถาม</h3>
                    <hr>
            </div>
        </div>

        <div v-for="q in nm">
        <div class="row">
            <div class="col-12">
                <div class="d-flex mt-2">
                    <input type="text" class="form-control">
                    <button class="btn btn-danger mx-2">x</button>
                </div>
            </div>
        </div>
        </div>

        <div class="col-12 mt-3">
                <button class="btn btn-primary float-right">เพิ่มรายการ</button>
        </div>


        <div class="mt-5">
            <div align="right">
                <button class="btn btn-outline-info btn-lg">Create</button>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "CreateSurvey",
        data: () => ({
            nm : 3 ,
            form: {
                hSurvey: "",
                questions: [],
            },
            questions: [],
            question: {
                no: 1,
                text: ""
            }
        }),
        methods: {
            addtext() {

            }
        }
    }
</script>

<style scoped>

</style>