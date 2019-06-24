<template>
    <div>


        <div class="col-md-12">

            <h4>สร้างแบบสำรวจความพึงพอใจง่ายๆด้วยตัวคุณเอง</h4>
            <div class="flex-center position-ref mt-5">
                <button type="button" class="btn btn-primary btn-lg" @click="gotoCreateSurvey">สร้างแบบสำรวจ</button>
            </div>


            <br/>


            <hr>
        </div>
        <div class="col-md-12">
            <h4>แบบสำรวจล่าสุด</h4>
        </div>


        <div v-if="head">
            <div v-if="head.data.length > 0 ">
                <div class="card text-center mt-2" v-for="i in head.data">
                    <div class="card-body">
                        <h5 class="card-title">{{i.name}}</h5>
                        <button class="btn btn-primary" @click="gotoReport(i.id)">ดูรายงาน</button>
                        <button class="btn btn-outline-info" @click="copylink(i.id)">copy link</button>
                    </div>
                    <div class="card-footer text-muted">

                        {{i.dateDiff}} days ago
                    </div>
                </div>
            </div>


            <div v-else class="row justify-content-center text-secondary mt-5">
                <div class="card text-center card-body card-title bg-light">
                    <h4>ยังไม่มีแบบสำรวจความพึงพอใจ</h4>
                </div>
            </div>

        </div>


        <div class="row-12 mt-3" v-if="head">
            <div class="card text-center">
            <div class="card-footer text-muted row-12 justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <button class="page-link" aria-label="Previous" @click="getPage(head.prev_page_url)">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </button>
                        </li>

                       <div v-for="(i,index) in allPage">

                           <li class="page-item active" v-if="head.current_page == index+1">
                               <button class="page-link" @click="getPage(i)">{{index+1}}</button>
                           </li>

                            <li class="page-item" v-else>
                                <button class="page-link" @click="getPage(i)">{{index+1}}</button>
                            </li>
                       </div>
                        <li class="page-item">
                            <button class="page-link" aria-label="Next" @click="getPage(head.next_page_url)">
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
</template>

<script>
    var moment = require('moment');
    moment.locale('th');

    export default {
        created() {
            this.h_name()

        },
        data: () => ({
            allPage : null ,
            head: null,
            form: {
                s_id: null,
                age: null,
                province: null,
                career: null,
                comment: null,
                ans: [
                    {q_id: 0, rate: 5}
                ]
            },
        }),
        methods: {
            copylink(link_id) {
                let copyText = "http://127.0.0.1:8000/ans#/ans/" + link_id
                var el = document.createElement('textarea');
                // Set value (string to be copied)
                el.value = copyText;
                // Set non-editable to avoid focus and move outside of view
                el.setAttribute('readonly', '');
                el.style = {position: 'absolute', left: '-9999px'};
                document.body.appendChild(el);
                // Select text inside element
                el.select();
                // Copy text to clipboard
                document.execCommand('copy');
                // Remove temporary element
                document.body.removeChild(el);

                /* Alert the copied text */
                //swal("Copied the text: " + copyText.value);
                Swal.fire({
                    type: 'success',
                    title: "Copied the text: " + copyText,
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                })

            },

            gotoCreateSurvey() {
                this.$router.push({name: "CreateSurvey"})
            },
            gotoReport(headdata) {
                this.$router.push({name: "Report", params: {s_id: headdata}})
            },
            gotoQuestion() {
                this.$router.push({name: "Question"})
            },

            async h_name() {
                this.head = await axios.get('api/user_survey/' + this.$userId)
                    .then(function (response) {
                        return response.data
                    })
                    .catch(function (error) {
                        console.log("error", error);
                        return null
                    });
                if(this.head.data[0])
                {
                    this.calDateDiff();
                    this.generatePageLink(this.head.last_page,this.head.data[0].u_id)
                }
            },
            calDateDiff() {
                for (let i = 0; i < this.head.data.length; i++) {
                    this.head.data[i].dateDiff = moment().diff(this.head.data[i].created_at, 'day')
                    console.log(this.head.data[i].dateDiff)
                }
            },
            async getPage(page) {
                 this.head = await axios.get(page)
                    .then(function (response) {
                        return response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

                this.calDateDiff();

            },
            generatePageLink (last_page,u_id) {
                let arr = []
                for(let i =1 ;i<=last_page;i++)
                {
                    let s = "http://127.0.0.1:8000/api/user_survey/"+u_id+"?page="+i;
                    arr.push(s)
                }
                this.allPage = arr;
            }
        },
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
        text-align: center;
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