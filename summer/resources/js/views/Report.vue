<template>
    <div>
        <h1>ReportPage</h1>
        <hr>


        <div id="testComponent" class="col-2">
            <select-sex @change="sexID = $event" v-bind:sexID="0"></select-sex>
            {{sexID}}
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
                this.questions = this.arrayRemove(this.questions, this.questions[index])
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
