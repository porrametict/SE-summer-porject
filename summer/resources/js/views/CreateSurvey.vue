<template>
    <div>
        <div class="row">
            <div class="col-md-3">
                <h3>หัวข้อแบบสอบถาม &nbsp; &nbsp;:</h3>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control form-control-lg btn-outline-primary btn-lg"
                       placeholder="กรุณากรอกหัวข้อแบบสอบถามของท่าน" v-model="form.hSurvey">
            </div>
            <div class="col-12 mt-5">
                <h3>รายงานแบบสอบถาม</h3>
                <hr>
            </div>
        </div>

        <div v-for="(q,index) in questions">
            <div class="col-12">
                <div class="d-flex mt-2 col-12">
                    <!--<div class="col-1">{{index}}</div>-->
                    <input type="text" class="form-control" v-model="questions[index].text">
                    <button class="btn btn-danger mx-2" @click="removeQuestion(index)">x</button>
                </div>
            </div>
        </div>
        <div class="col-12 mt-3">
            <button class="btn btn-primary float-right" @click="addtext">เพิ่มรายการ</button>
        </div>

        <!--        <div>-->
        <!--            <ul>-->
        <!--                <li v-for="q in questions ">{{q}}</li>-->
        <!--            </ul>-->
        <!--        </div>-->
        <!---->
        <!--{{form.hSurvey}}-->
        <div class="mt-5">
            <div align="right">
                <button class="btn btn-outline-info btn-lg" @click="save">Create</button>
            </div>
        </div>

        <hr>
        <div id="testComponent">
            <select-sex @change="sexID = $event" v-bind:sexID="1"></select-sex>
            {{sexID}}
        </div>
    </div>
</template>

<script>
    import selectSex from  '../components/SC'
    export default {
        components : {
            selectSex
        },
        name: "CreateSurvey",
        data: () => ({
            sexID : null,
            form: {
                hSurvey: "",
                questions: [],
            },
            questions: [
                {no: 0, text: ""}
            ],

        }),
        methods: {

            addtext() {
                this.questions.push({no: 0, text: ""})
            },
            save() {

                this.form.questions = this.questions
                console.log(this.form)
            },
            removeQuestion(index) {
                 this.questions = this.arrayRemove(this.questions,this.questions[index])
                console.log(this.questions)

            },
            arrayRemove(arr, value) {
                return arr.filter(function (ele) {
                        return ele != value
                });

            }


        }
    }
</script>