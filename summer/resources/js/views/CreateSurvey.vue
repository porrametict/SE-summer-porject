<template>
    <div class="col-12">

        <div class="row">
            <div class="col-md-6 mt-3 ">
                <h5>หัวข้อแบบสำรวจความพึงพอใจ&nbsp;&nbsp;:</h5>
            </div>
            <div class="col-md-12 mt-2">
                <input type="text" class="form-control form-control-lg btn-outline-primary btn-lg"
                       placeholder="กรุณากรอกหัวข้อแบบสำรวจของท่าน" v-model="form.hSurvey">
            </div>
        </div>

        <div class="col-12 mt-5">
            <h5>คำถาม&nbsp;&nbsp;:</h5>
        </div>
        <hr>

        <div v-for="(q,index) in questions">
            <div class="col-12">
                <div class="d-flex mt-4 col-12">
                    <!--<div class="col-1">{{index}}</div>-->
                    <input type="text" class="form-control" v-model="questions[index].text">
                    <button class="btn btn-danger mx-2" @click="removeQuestion(index)" v-if="!(questions.length == 1) ">
                        x
                    </button>
                </div>
            </div>
        </div>

        <div class="col-12 mt-4 ">
            <button class="btn btn-pink float-right" @click="addtext">เพิ่มรายการ</button>
        </div>
        <br/>

        <div class="col-12 mt-5">
            <div align="right">
                <button class="btn btn-outline-pink btn-lg" @click="save">Create</button>
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
                u_id: null,
                questions: [],
            },
            questions: [
                {no: 0, text: ""}
            ],


        }),
        created() {
            // axios.get('api/user').then(response => {
            //     console.log(response.body);
            // })
        },
        methods: {

            addtext() {
                this.questions.push({no: 0, text: ""})
            },
            checkQuestion () {
                let tf = false;
                let qs= this.questions
                for(let i = 0 ;i < qs.length;i++) {
                    if(qs[i].text.trim() == "") {
                        tf = true;
                        return true;
                    }
                }
                console.log("tf",tf)
                return tf;
            },
             checkData () {
                    if(this.form.hSurvey.trim() == "")
                    {
                        console.log("name")
                        return false;
                    }else if (this.checkQuestion()) {
                        console.log("question")
                        return false;
                    }else {
                        return  true
                    }
            },

            save() {
                if (!this.checkData()){
                    console.log('error')
                        swal('Fail','กรุณากรอกข้อมูลให้ครบ','error' )
                        return ;
                }

                let vm = this
                this.form.u_id = this.$userId;
                this.form.questions = this.questions
                console.log(this.form)
                axios.post('/api/survey', this.form)
                    .then(function (response) {
                        console.log(response.data.id);
                        //swal("Finished", , "success");
                        vm.ShowSuccess("http://127.0.0.1:8000/ans#/ans/" + response.data.id);
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

            },
            ShowSuccess (text) {
                let vm = this ;
                Swal.fire({
                    type: 'success',
                    title: 'Finished',
                    html:
                        '<div class="text-center mb-3">copy your link</div>'+
                        '<div class="d-flex">' +
                        '<input type="text" value="'+text+'" id="myInput" class="form-control mr-2" readonly>'+
                        '<button onclick="CopyToCB" class="btn btn-secondary" id="cpTocb" >Copy</button>'+
                        '</div>' ,
                    focusConfirm: false,
                }).then(function() {
                    // Redirect the user
                    // window.location.href = "new_url.html";
                    console.log('The Ok Button was clicked.');
                    vm.$router.push({name: "dashboard"})
                });


                $("#cpTocb").click( function () {
                    /* Get the text field */
                    let copyText = document.getElementById("myInput");
                    /* Select the text field */
                    copyText.select();

                    /* Copy the text inside the text field */
                    document.execCommand("copy");



                    /* Alert the copied text */
                    //swal("Copied the text: " + copyText.value);
                    Swal.fire({
                        type: 'success',
                        title: "Copied the text: " + copyText.value,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1200
                    }).then(function() {
                        console.log('The Ok Button was clicked.');
                        vm.$router.push({name: "dashboard"})
                    });
                });



            },



        }
    }


</script>

