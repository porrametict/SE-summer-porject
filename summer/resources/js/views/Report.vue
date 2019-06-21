<template>
    <div v-if="head">
        <h1>ReportPage</h1>
        <hr>
        <div class="text-center">
        <h3>{{head.survey.name}}</h3>
        </div>
        <div class="row justify-content-center">
            <div id="SexComponent" class="col-3 mt-5 " >
            <select-sex @change="sex_emit($event)"></select-sex>
             </div>

            <div id="testComponent2" class="col-3 mt-5 ">
            <select-age @change="age_emit($event)"></select-age>
            </div>

            <div id="ProvinceComponent" class="col-3 mt-5 " >
                <selectProvinces @change="pronvince_emit($event)"></selectProvinces>
            </div>

            <div id="CareersComponent" class="col-3 mt-5 ">
                <select-careers @change="careers_emit($event)"></select-careers>
            </div>

    </div>

        <div class="card mt-5">
            <div class="card-header">
                Questions
            </div>
            <div v-if="QwithRate.length > 0">
                <ul class="list-group list-group-flush"  :key="i.id" v-for="i in head.question" >
                    <li class="list-group-item">
                        {{i.text}}
                        <div v-for="qr in QwithRate" :key="qr[0].q_id">

                            <div v-if="qr[0].q_id == i.id">
                                <BarCharts :id="i.id.toString()" :data="qr" ></BarCharts>
                            </div>
                        </div>

                    </li>
                </ul>
            </div>

            <div v-else>
                No data
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header">
                Comments
            </div>
            <div class="card-body">
                <ul><li v-for="i in head.comments">{{i.text}}</li></ul>
            </div>
        </div>
</div>

</template>


<script>
    import selectSex from '../components/SC'
    import selectAge from '../components/Age'
    import selectProvinces from '../components/Provinces'
    import selectCareers from '../components/careers'
    import BarCharts from '../components/Barchart'

    export default {
        components: {
            selectSex,
            selectAge,
            selectProvinces,
            selectCareers,
            BarCharts

        },
        created() {
            this.get_data()
        },
        name: "CreateSurvey",
        data: () => ({
            fillter: {
                age:'',
                sex:'',
                province:'',
                career:''
            },
            head : null,
            QwithRate : [

            ]

        }),

        methods: {
            addtext() {
                this.questions.push({no: 0, text: ""})
            },

            pronvince_emit(pronvincedata) {
                //sole.log('provinces id', pronvincedata)
                this.fillter.province = pronvincedata
                this.get_data()
            },
            sex_emit(sexdata) {
               //console.log('sex value', sexdata)
                this.fillter.sex = sexdata
                this.get_data()
            },
            careers_emit(careerdata) {
                //console.log('careers value', careerdata)
                this.fillter.career = careerdata
                this.get_data()
            },
            age_emit(agedata) {
                this.fillter.age = agedata
                this.get_data()
            },
            async get_data(){
                this.head = await axios.get('api/Report/'+this.$route.params.s_id,this.fillter)
                    .then(function (response) {
                        //console.log("success", response.data);
                        return response.data
                    })
                    .catch(function (error) {
                        console.log("error", error);
                        return null
                    });
                this.Checkq_id()
            },

            Checkq_id() {
                let Arr_Qid = []
                  _.filter( this.head.repeats, function(o) {
                                        if (!Arr_Qid.includes(o.q_id)){
                                            Arr_Qid.push(o.q_id)
                                        }
                });
               // console.log(Arr_Qid)
                for (let i = 0 ; i < Arr_Qid.length; i++)
                {
                    let q_id = Arr_Qid[i];
                    let data =  [
                        {rate : 5 , count_n: 0 ,q_id : q_id},
                        {rate : 4 , count_n: 0 , q_id : q_id},
                        {rate : 3 , count_n: 0 , q_id : q_id},
                        {rate : 2 , count_n: 0 , q_id : q_id},
                        {rate : 1 , count_n: 0 , q_id : q_id}
                    ]
                    this.QwithRate.push(data)

                }
                //console.log(this.QwithRate)
                this.mapRate();
            },
            mapRate () {
                let data  = this.QwithRate;
                for (let i = 0 ;i < data.length; i++) {
                        //console.log(data[i])
                    for(let j= 0 ; j < data[i].length;j++){
                        //console.log(data[i][j])
                        let cur_pos = data[i][j]

                        let repeats = this.head.repeats;
                        for (let k = 0 ;k < repeats.length; k ++)
                        {
                            if((repeats[k].q_id == cur_pos.q_id) && (repeats[k].rate == cur_pos.rate))
                            {
                                data[i][j].count_n = repeats[k].count_n;
                            }
                        }
                    }
                }
                this.QwithRate = data;
            }


        }
    }
</script>