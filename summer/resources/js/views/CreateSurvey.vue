<template>
    <div class="col-12">

        <div class="row">
            <div class="col-md-4 mt-3">
                <h3>หัวข้อแบบสำรวจความพึงพอใจ &nbsp;&nbsp;:</h3>
            </div>
            <div class="col-md-8 mt-2">
                <input type="text" class="form-control form-control-lg btn-outline-primary btn-lg"
                       placeholder="กรุณากรอกหัวข้อแบบสำรวจของท่าน" v-model="form.hSurvey">
            </div>
        </div>

        <div class="col-12 mt-5">
            <h3>แบบสำรวจความพึงพอใจ</h3>
        </div>
        <hr>

        <div v-for="(q,index) in questions">
            <div class="col-12">
                <div class="d-flex mt-4 col-12">
                    <!--<div class="col-1">{{index}}</div>-->
                    <input type="text" class="form-control" v-model="questions[index].text">
                    <button class="btn btn-danger mx-2" @click="removeQuestion(index)" v-if="!(questions.length == 1) ">x</button>
                </div>
            </div>
        </div>

        <div class="col-12 mt-5">
            <button class="btn btn-primary float-right" @click="addtext">เพิ่มรายการ</button>
        </div>
        <br/>

        <div class="col-12 mt-5">
            <div align="right">
                <button class="btn btn-outline-info btn-lg" @click="save">Create</button>
            </div>
        </div>


    </div>
</template>


<script>
    import selectSex from '../components/SC'

    export default {
        components: {
            selectSex
        },
        name: "CreateSurvey",
        data: () => ({
            sexID: null,
            form: {
                hSurvey: "",
                u_id : null,
                questions: [],
            },
            questions: [
                {no: 0, text: ""}
            ],


        }),
        created () {
            // axios.get('api/user').then(response => {
            //     console.log(response.body);
            // })
        },
        methods: {

            addtext() {
                this.questions.push({no: 0, text: ""})
            },
            save() {
                this.form.u_id = this.$userId;
                this.form.questions = this.questions
                console.log(this.form)
                axios.post('/api/survey', this.form)
                    .then(function (response) {
                        console.log(response);
                        alert('Create Success')
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            removeQuestion(index) {
                this.questions = this.arrayRemove(this.questions, this.questions[index])
                console.log(this.questions)

            },
            arrayRemove(arr, id) {
                return arr.filter(function (ele) {

                    return ele != id
                });

            }


        }
    }
</script>