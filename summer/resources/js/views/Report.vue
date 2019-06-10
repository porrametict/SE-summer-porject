<template>
    <div>
        <h1>ReportPage</h1>
        <hr>


        <div id="testComponent" class="col-2">
            <select-sex @change="sexID = $event" v-bind:sexID="0"></select-sex>
            {{sexID}}
        </div>

        <div id="testComponent2" class="col-2">
            <select-age @change="ageID = $event" v-bind:ageID="2"></select-age>
            {{ageID}}
        </div>



    </div>
</template>




<script>
    import selectSex from '../components/SC'
    import selectAge from '../components/Age'

    export default {
        components: {
            selectSex,
            selectAge
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
            }

        }
    }
</script>
