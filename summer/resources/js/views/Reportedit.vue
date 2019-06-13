<template>
    <div>
        <h1>ReportPage</h1>
        <hr>


        <!--        <div id="testComponent" class="col-2">-->
        <!--            <select-sex @change="sexID = $event" v-bind:sexID="0"></select-sex>-->
        <!--            {{sexID}}-->
        <!--        </div>-->
        <cat title="สมัย" :num_n="5" @change="pronvince_emit($event)"></cat>

    </div>
</template>




<script>
    import selectSex from '../components/SC'
    import cat from '../views/Vuetesto'

    export default {
        components: {
            selectSex,
            cat
        },
        name: "CreateSurvey",
        data: () => ({
            provinceid : null
            // sexID: null,
            // form: {
            //     hSurvey: "",
            //     questions: [],
            // },
            // questions: [
            //     {no: 0, text: ""}
            // ],
        }),
        methods: {
            pronvince_emit(data) {
                console.log('provinces id',data)
                this.provinceid = data
            },
            // addtext() {
            //     this.questions.push({no: 0, text: ""})
            // },
            // save() {
            //
            //     this.form.questions = this.questions
            //     console.log(this.form)
            // },
            // f_name() {
            //     axios.get('api/sexes')
            //         .then(function (response) {
            //             console.log("success",response.data);
            //         })
            //         .catch(function (error) {
            //             console.log("error",error);
            //         });
            // }
        }
    }
</script>
