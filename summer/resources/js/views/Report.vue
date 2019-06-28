<template>
    <div v-if="head">
        <h5>ReportPage</h5>
        <survey-status-select :s_id="$route.params.s_id" :status="head.survey.status"></survey-status-select>

        <hr>
        <div class="text-center">
        <h5>{{head.survey.name}}</h5>
        </div>
        <div>
             <h3> คนตอบทั้งหมด {{head.all_repeats[0].num}}</h3>

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
                กราฟเเสดงผล
            </div>
            <div v-if="chartRender">
                <div v-if="QwithRate.length > 0">
                    <ul class="list-group list-group-flush"  :key="i.chart_id" v-for="i in head.question" >
                        <li class="list-group-item">
                            {{i.text}}
                            <div v-for="qr in QwithRate" :key="qr[0].chart_id">
                                <div v-if="qr[0].q_id == i.id">
                                    <BarCharts :id="i.id.toString()" :data="qr" ></BarCharts>
                                </div>
                            </div>

                        </li>
                    </ul>
                </div>

                <div v-else>
                    <h3 class="text-secondary text-center my-2">ไม่มีข้อมูล</h3>
                </div>
            </div>

        </div>

        <div class="card mt-5">
            <div class="card-header">
                Comments
            </div>

            <div class="card-body" v-if="head.comments.data">
                <div v-if="head.comments.data.length > 0">
                    <ul >
                        <li v-for="i in head.comments.data">{{i.text}}</li>
                    </ul>


                    <div class="row-12 mt-3" v-if="(head.comments.data.length > 0 && head.comments.last_page > 1 )">
                        <div class="card text-center">
                            <div class="card-footer text-muted row-12 justify-content-center">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item">
                                            <button class="page-link" aria-label="Previous" @click="getPage(head.comments.prev_page_url)" v-if="head.comments.prev_page_url">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </button>

                                            <button class="page-link" aria-label="Previous" disabled v-else>
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </button>
                                        </li>

                                        <div v-for="(i,index) in allPage">

                                            <li class="page-item active" v-if="head.comments.current_page == index+1">
                                                <button class="page-link" @click="getPage(i)">{{index+1}}</button>
                                            </li>

                                            <li class="page-item" v-else>
                                                <button class="page-link" @click="getPage(i)">{{index+1}}</button>
                                            </li>
                                        </div>
                                        <li class="page-item">
                                            <button class="page-link" aria-label="Next" @click="getPage(head.comments.next_page_url)" v-if="head.comments.next_page_url">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>
                                            </button>
                                            <button class="page-link" aria-label="Next" disabled v-else>
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>
                                            </button>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-else>
                    <h3 class="text-secondary text-center my-2">ไม่มีข้อมูล</h3>
                </div>
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
    import SurveyStatusSelect from '../components/SurveyStatusSelect'

    export default {
        components: {
            selectSex,
            selectAge,
            selectProvinces,
            selectCareers,
            BarCharts,
            SurveyStatusSelect

        },
        async created() {
           await this.get_data()
        },
        name: "CreateSurvey",
        data: () => ({
            allPage: null,
            chartRender:true,
            fillter: {
                age:'',
                sex:'',
                province:'',
                career:''
            },
            head : null,
            QwithRate : []

        }),

        methods: {
            makeid(length) {
                let result = '';
                let characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                let charactersLength = characters.length;
                for (let i = 0; i < length; i++) {
                    result += characters.charAt(Math.floor(Math.random() * charactersLength));
                }
                return result;
            },
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
                this.QwithRate = []
                this.chartRender = false ;
                this.head = await axios.get('api/Report/'+this.$route.params.s_id,{
                    params: this.fillter
                })
                    .then(function (response) {
                        return response.data
                    })
                    .catch(function (error) {
                        console.log("error", error);
                        return null
                    });
                console.log(this.QwithRate,"QWR 2 time")


                this.Checkq_id()
                this.chartRender = true ;
                this.get_comment()


            },
            async get_comment () {
                this.head.comments = await axios.get('api/report_comment/'+this.$route.params.s_id,{
                    params: this.fillter
                })
                    .then(function (response) {
                        return response.data
                    })
                    .catch(function (error) {
                        console.log("error", error);
                        return null
                    });
                this.generatePageLink(this.head.comments.last_page)

            },
            generatePageLink(last_page) {
                let arr = []
                for (let i = 1; i <= last_page; i++) {
                    let s = "http://127.0.0.1:8000/api/report_comment/" + this.$route.params.s_id + "?page=" + i;
                    arr.push(s)
                }
                this.allPage = arr;
            },
            async getPage(page) {
                this.head.comments = await axios.get(page)
                    .then(function (response) {
                        return response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            Checkq_id() {
                console.log(this.head.repeats,"repeat")
                let Arr_Qid = []
                  _.filter( this.head.repeats, function(o) {
                      if (!Arr_Qid.includes(o.q_id))
                      {
                          Arr_Qid.push(o.q_id)
                      }
                });

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
                this.mapRate();
            },
            mapRate () {
                let data  = this.QwithRate;
                console.log(data)
                for (let i = 0 ;i < data.length; i++) {
                        //console.log(data[i])
                    for(let j= 0 ; j < data[i].length;j++){
                       // console.log(data[i][j])
                        let cur_pos = data[i][j]

                        let repeats = this.head.repeats;
                        for (let k = 0 ;k < repeats.length; k ++)
                        {
                            if((repeats[k].q_id == cur_pos.q_id) && (repeats[k].rate == cur_pos.rate))
                            {
                                data[i][j].count_n = repeats[k].count_n;
                            }
                            data[i][j].chart_id = this.makeid(10) + '_' + repeats[k].q_id

                        }
                    }
                }
                this.QwithRate = data;
            }


        }
    }
</script>