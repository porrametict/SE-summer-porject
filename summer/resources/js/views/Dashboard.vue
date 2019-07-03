<template>
    <div>
        <div class="row mt-3">
            <div class="col-9 mt-2 card-text">
                <h5>สร้างแบบสำรวจความพึงพอใจง่ายๆด้วยตัวคุณเอง</h5>
            </div>
            <div class="col-3 text-center card-text">
                <button type="button" class="btn btn-pink btn-lg" @click="gotoCreateSurvey">
                    <div class="d-flex">
                        <i class="mdi mdi-plus mdi-18px mx-0"></i>
                        <span class="d-none d-md-block">
                        สร้างแบบสำรวจ
                    </span>
                    </div>


                </button>
            </div>
        </div>
        <br/>
        <hr>



        <div v-if="head">
            <div v-if="head.data.length > 0">
                <div class="row mt-1">
                    <div class="col-10 ">
                        <div class="row flex-nowrap">
                            <div class="col-8">
                                <b>รายงานแบบสำรวจความพึงพอใจ</b>
                            </div>
                            <div class="col-2 text-center">
                                <b>สร้างเมื่อ</b>
                            </div>
                            <div class="col-2 text-center">
                                <b>สถานะ</b>
                            </div>
                        </div>

                    </div>

                    <div class="col-2 p-0 text-center">
                        <b>คัดลอกลิงก์.</b>
                    </div>
                </div>
                <div class="card mt-2 card-text card-hover" v-for="i in head.data" >
                    <div class="card-body mx-0 card-text">
                       <div class="row flex-nowrap m-0">
                           <div class="col-10" @click="gotoReport(i.id)">
                               <div class="row">
                                   <div class="col-8">
                                       <p class="card-text">
                                           <i class="mdi mdi-file-document mdi-16px mx-2"></i>
                                           {{i.name}}
                                       </p>
                                   </div>
                                   <div class="col-2 text-center card-text">
                                       {{formatDate(i.created_at)}}
                                   </div>

                                   <div class="col-2 text-center card-text">
                                       <span v-if="i.status == 1" class="text-success text-center">เปิด</span>
                                       <span v-else class="text-danger text-center">ปิด</span>
                                   </div>
                               </div>

                           </div>
                           <div class="col-2 text-right " @click="copylink(i.id)">
                               <span class="" tabindex="0" data-toggle="tooltip" title="Copy link">
                                    <i class="mdi mdi-content-copy mdi-16px pr-md-4"></i>
                                </span>
                           </div>

                       </div>
                    </div>
                </div>
            </div>

            <div v-else class="row justify-content-center text-secondary mt-5">
                <div class="card text-center card-body card-title bg-light">
                    <h4>ยังไม่มีแบบสำรวจความพึงพอใจ</h4>
                </div>
            </div>

        </div>

        <div class="row-12 mt-3" v-if="head && (head.data.length > 0 && head.last_page > 1 )">
            <div class="card text-center">
                <div class="card-footer text-muted row-12 justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <button class="page-link btn-pink" aria-label="Previous"
                                        @click="getPage(head.prev_page_url)" v-if="head.prev_page_url">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </button>

                                <button class="page-link btn-pink" aria-label="Previous" disabled v-else>
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </button>
                            </li>

                            <div v-for="(i,index) in allPage">

                                <li class="page-item active" v-if="head.current_page == index+1">
                                    <button class="page-link btn-outline-pink" @click="getPage(i)">{{index+1}}</button>
                                </li>

                                <li class="page-item" v-else>
                                    <button class="page-link btn-outline-pink" @click="getPage(i)">{{index+1}}</button>
                                </li>
                            </div>
                            <li class="page-item">
                                <button class="page-link btn-pink" aria-label="Next"
                                        @click="getPage(head.next_page_url)" v-if="head.next_page_url">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </button>
                                <button class="page-link btn-pink" aria-label="Next" disabled v-else>
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
            allPage: null,
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
            formatDate (date) {
                return moment(date).format('DD/MM/YYYY')
            },
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
                if (this.head) {
                    if (this.head.data[0]) {
                        this.calDateDiff();
                        this.generatePageLink(this.head.last_page, this.head.data[0].u_id)
                    }
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
            generatePageLink(last_page, u_id) {
                let arr = []
                for (let i = 1; i <= last_page; i++) {
                    let s = "http://127.0.0.1:8000/api/user_survey/" + u_id + "?page=" + i;
                    arr.push(s)
                }
                this.allPage = arr;
            }
        },
    }

</script>


<style scoped>
    .card-hover:hover{
        -webkit-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
        -moz-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
        box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
    }
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

    .mdi-16px {
        font-size: 16px;
    }

    .mdi-18px {
        font-size: 18px;
    }

    .mdi-19px {
        font-size: 19px;
    }

    .mdi-20px {
        font-size: 20px;
    }

    .mdi-24px {
        font-size: 24px;
    }

    .mdi-26px {
        font-size: 30px;
    }

    .mdi-28px {
        font-size: 30px;
    }

    .mdi-30px {
        font-size: 30px;
    }

    .mdi-36px {
        font-size: 36px;
    }

    .mdi-48px {
        font-size: 48px;
    }

    .mdi-dark {
        color: rgba(0, 0, 0, 0.54);
    }

    .mdi-dark.mdi-inactive {
        color: rgba(0, 0, 0, 0.26);
    }

    .mdi-light {
        color: rgba(255, 255, 255, 1);
    }

    .mdi-light.mdi-inactive {
        color: rgba(255, 255, 255, 0.3);
    }
</style>
