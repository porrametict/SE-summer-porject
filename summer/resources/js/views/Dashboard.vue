<template>
    <div >


        <div clss="col-md-12">

            <h4>สร้างแบบสำรวจความพึงพอใจง่ายๆด้วยตัวคุณเอง</h4>
            <div class="flex-center position-ref mt-5">
                <button type="button" class="btn btn-primary btn-lg" @click="gotoCreateSurvey">สร้างแบบสำรวจ</button>
            </div>


            <br/>



            <hr>
        </div>
        <div clss="col-md-12">
            <h4>แบบสำรวจล่าสุด</h4>
        </div>
        <div class="card text-center mt-2" v-for="i in head">
            <div class="card-body">
                <h5 class="card-title">{{i.name}}</h5>
                <button class="btn btn-primary" @click="gotoReport(i.id)">ดูข้อมูล</button>
            </div>
            <div class="card-footer text-muted">
                2 days ago
            </div>
        </div><br/><br/><br/>

        <div class="col-12 mt-5">
            <button type="button" class="btn btn-outline-secondary btn-block" @click="gotoReport">ReportPage
            </button>
        </div>
        <div class="col-12 mt-5">
            <button type="button" class="btn btn-outline-secondary btn-block" @click="gotoQuestion">gotoQuestion
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        created() {
            this.h_name()
        },
        methods: {
            imformation() {
                this.$route
            },
            gotoCreateSurvey() {
                this.$router.push({name: "CreateSurvey"})
            },
            gotoReport(headdata) {
                this.$router.push({name: "Report" ,params : {s_id : headdata}})


            },
            gotoQuestion() {
                this.$router.push({name: "Question"})
            },
            GotoDetail() {

            },
            async h_name() {
                this.head = await axios.get('api/user_survey/'+3)
                    .then(function (response) {
                        console.log("success", response.data);
                        return response.data.reverse()
                    })
                    .catch(function (error) {
                        console.log("error", error);
                        return null
                    });
            },

        },
        data: () => ({
            head: null,
            form: {
                s_id: null,
                age: null,
                sex: null,
                province: null,
                career: null,
                comment: null,
                ans: [
                    {q_id: 0, rate: 5}
                ]
            },
        })
    }

</script>


<style scoped>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 400px;
        top: 70px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>