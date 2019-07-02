<template>
    <div v-if="head">
        <div v-if="head.survey.status == 1">
            <div class="text-center">
                <h5 class="texthead">{{head.survey.name}}</h5>
            </div>
            <hr>

            <div class="row justify-content-center">


                <div id="" class="col-12 col-md-6 mb-2" v-if="renderSex">
                    <select-sex @change="sex_emit($event)" :sex-i-d="form.sex"
                                 :error="sexError">

                    </select-sex>
                </div>


                <div id="testComponent2" class="col-12 col-md-6 mb-2">
                    <select-age @change="age_emit($event)" :ageID="form.age" :error="ageError"></select-age>
                </div>


                <div id="ProvinceComponent" class="col-12 col-md-6 mb-2">
                    <selectProvinces @change="pronvince_emit($event)" :province-i-d="form.province" :error="provinceError"></selectProvinces>
                </div>


                <div id="CareersComponent" class="col-12 col-md-6 mb-2">
                    <selectcareers @change="careers_emit($event)" :careers-i-d="form.career" :error="careerError"></selectcareers>
                </div>

            </div>

            <div class="mt-5">
                <h5>รายการแบบสำรวจความพึงพอใจ</h5>
                <div class="mt-4">
                    <answer :sid="s_id" @change="answer_emit($event)"></answer>
                </div>

            </div>

            <div class="mt-5">
                <h5>ข้อเสนอแนะอื่นๆ</h5>
            </div>
            <div class="">
                <textarea class="form-control" v-model="form.comment"></textarea>
            </div>


            <button class="btn btn-pink mt-5 col-md-2 offset-md-10" @click="submit">
                Submit
            </button>
        </div>
        <div v-else>
            <h1>แบบสำรวจนี้ปิดรับการตอบกลับเเล้ว</h1>
        </div>


    </div>

</template>


<script>


    import answer from '../components/Answer'
    import selectSex from '../components/SC'
    import selectAge from '../components/Age'
    import selectProvinces from '../components/Provinces'
    import selectcareers from '../components/careers'

    var moment = require('moment');
    moment.locale('th');



    export default {
        components: {
            selectcareers,
            answer,
            selectSex,
            selectAge,
            selectProvinces

        },
        created() {
            if(this.$userId) {
                console.log("user",this.$userId)
                this.getUser();
            }
            this.s_id = parseInt(this.$route.params.s_id);
            console.log(this.s_id, "s_Id");
            this.h_name()
            this.form.s_id = this.s_id
        },

        data: () => ({
            renderSex : true,
            user : null,
            s_id: null,
            head: null,
            sexError : false,
            provinceError : false,
            ageError : false,
            careerError : false,
            form: {
                s_id: null,
                age: null,
                sex: null,
                province: null,
                career: null,
                comment: null,
                ans: [
                ]
            }
        }),

        methods: {
            async getUser () {
                this.user = await axios.get('api/user/' + this.$userId)
                    .then(function (response) {
                        console.log("success", response.data);
                        return response.data
                    })
                    .catch(function (error) {
                        console.log("error", error);
                        return null
                    });
                this.fillable()
            },
             fillable ()
            {
                console.log( this.user.province_id, "gg")
                this.form.age =  moment().diff(this.user.b_date, 'year')
                this.form.sex =  this.user.sex_id
                this.form.province =  this.user.province_id
                this.form.career =  this.user.career
            },

            checkData() {

                this.sexError = false
                this.ageError = false
                this.careerError = false
                this.provinceError = false


                if (this.form.sex == null) {
                    this.sexError = true
                    return true;
                } else if (this.form.age == null) {
                    console.log("age Error",this.form.age)
                    this.ageError = true
                    return true;
                } else if (this.form.province == null) {
                    this.provinceError = true
                    return true;
                } else if (this.form.career == null) {
                    this.careerError = true
                    return true;
                }
                if (this.form.ans.length == 0){
                    return true
                }
                for (let i = 0;i < this.form.ans.length;i++) {
                    if (this.form.ans[i].rate == 0) {
                        return true;
                    }

                }
            },
            pronvince_emit(pronvincedata) {
                console.log('provinces id', pronvincedata)
                this.form.province = pronvincedata
            },
            careers_emit(careersdata) {
                console.log('careers id', careersdata)
                this.form.career = careersdata
            },
            answer_emit(answerdata) {
                console.log('answer id', answerdata)
                this.form.ans = answerdata
            },
            sex_emit(sexdata) {
                console.log('sex value', sexdata)
                this.form.sex = sexdata
            },
            age_emit(agedata) {
                console.log('age value', agedata)
                this.form.age = agedata
            },
            submit() {
                if (this.checkData()) {
                    swal('Fail', 'กรุณากรอกข้อมูลให้ครบ', 'error')
                    return;
                }

                console.log(this.form)
                axios.post('/api/repeats', this.form)
                    .then(function (response) {
                        console.log(response.data.id);
                        swal("Finished", "ขอบคุณสำหรับคำตอบ", "success")
                            .then(function () {
                                // Redirect the user
                                // window.location.href = "new_url.html";
                                console.log('The Ok Button was clicked.');
                                window.location.href = "http://127.0.0.1:8000";
                            });
                        ;
                        // vm.ShowSuccess("127.0.0.1/ans/" + response.data.id);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            async h_name() {
                this.head = await axios.get('api/survey/' + this.$route.params.s_id)
                    .then(function (response) {
                        console.log("success", response.data);
                        return response.data
                    })
                    .catch(function (error) {
                        console.log("error", error);
                        return null
                    });
            },


        },

    }

</script>
