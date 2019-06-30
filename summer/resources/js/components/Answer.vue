<template>
    <div v-if="head ">
        <div  class="overflow-auto">
            <table class="table table-striped  table-bordered ">
                <thead>
                <tr>
                    <th scope="col" class="text-center">คำถาม</th>
                    <th scope="col" class="text-center">ดีมาก</th>
                    <th scope="col" class="text-center">ดี</th>
                    <th scope="col" class="text-center">ปานกลาง</th>
                    <th scope="col" class="text-center">พอใช้</th>
                    <th scope="col" class="text-center">ปรับปรุง</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(i,index) in head.data">
                    <th scope="row">{{head.data[index].text}}</th>
                    <td class="text-center" @click="form.repeats[index + (head.from - 1)].rate = 5"><input type="radio" value="5" v-model="form.repeats[index + (head.from - 1)].rate" @change="export_select"></td>
                    <td class="text-center" @click="form.repeats[index + (head.from - 1)].rate = 4"><input type="radio" value="4" v-model="form.repeats[index + (head.from - 1) ].rate" @change="export_select"></td>
                    <td class="text-center" @click="form.repeats[index + (head.from - 1)].rate = 3"><input type="radio" value="3" v-model="form.repeats[index + (head.from - 1) ].rate" @change="export_select"></td>
                    <td class="text-center" @click="form.repeats[index + (head.from - 1)].rate = 2"><input type="radio" value="2" v-model="form.repeats[index + (head.from - 1) ].rate" @change="export_select"></td>
                    <td class="text-center" @click="form.repeats[index + (head.from - 1)].rate = 1"><input type="radio" value="1" v-model="form.repeats[index + (head.from - 1) ].rate" @change="export_select"></td>
                </tr>
                </tbody>

            </table>
        </div>

        <div v-if="head.data">
            <div class="row-12" v-if="(head.data.length > 0 && head.last_page > 1 )">
                <div class=" text-center">
                    <div class=" text-muted row-12 justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <button class="page-link" aria-label="Previous" @click="getPage(head.prev_page_url)" v-if="head.prev_page_url">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </button>

                                    <button class="page-link" aria-label="Previous" disabled v-else>
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
                                    <button class="page-link" aria-label="Next" @click="getPage(head.next_page_url)" v-if="head.next_page_url">
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

    </div>
</template>

<script>
    export default {
        name : "gdgdgd",
        props : {
            sid : Number
        },
        created(){
            this.hh_name()
        },
        data: () => ({
            allPage : null,
            head : null,
            form : {
                head : null,
                age : null,
                sex : null,
                province : null,
                career : null,
                comment : null,
                repeats : [
                ]
            }
        }),
        methods: {
            create_repeated(num_q) {
                for (let i =0 ; i < num_q.length;i++) {
                    if(this.form.repeats.length > 0 ){

                        let itHave = false;
                        for(let j = 0;j < this.form.repeats.length;j++) {
                            if(num_q[i].id == this.form.repeats[j].q_id) {
                                itHave = true

                            }else {
                            }
                        }
                        if(!itHave){
                            this.form.repeats.push({q_id : num_q[i].id,rate : 0})
                        }

                    }else {

                        this.form.repeats.push({q_id : num_q[i].id,rate : 0})

                    }

                }
                console.log("repeat",this.form.repeats)
            },
            async hh_name() {
                let vm = this
                this.head = await axios.get('api/questions',{params : {"s_id":this.sid}})
                    .then(function (response) {
                        console.log("success erer", response.data);
                        vm.create_repeated(response.data.data)
                        return response.data

                    })
                    .catch(function (error) {
                        console.log("error", error);
                        return null
                    });
                this.generatePageLink(this.head.last_page)
            },
            generatePageLink(last_page) {
                let arr = []
                for (let i = 1; i <= last_page; i++) {
                    let s = i;
                    arr.push(s)
                }
                this.allPage = arr;
            },
            async getPage(page) {
                this.head = await axios.get('api/questions',{params : {"s_id":this.sid,page:page}})
                    .then(function (response) {
                        return response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                this.create_repeated(this.head.data)
            },
            export_select() {
                this.$emit('change', this.form.repeats)
            },
        },
    }
</script>

<style scoped>

</style>