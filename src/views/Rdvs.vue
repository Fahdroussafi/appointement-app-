<template>
  <section
    class="bg-image"
    style="
      background-image: url('https://wallpaperaccess.com/full/619985.jpg');
      background-size: cover;
      height: 100vh;
      background-position: center;
    "
  >
    <!-- eslint-disable -->

    <div class="container-fluid affcont">
      <div class="row rdvherd">
        <div class="col-10" style="text-align: left"></div>
        <div class="col-2"></div>
      </div>
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-10">
            <div class="card text-black" style="border-radius: 25px">
              <div class="card-body p-md-5">
                <div class="row justify-content-center">
                  <div class="container">
                    <div class="row">
                      <router-link
                        class="btn btn-sm btn-light"
                        style="width: 10vh"
                        :to="{ path: '/login' }"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="16"
                          height="16"
                          fill="currentColor"
                          class="bi bi-door-open-fill"
                          viewBox="0 0 16 16"
                        >
                          <path
                            d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"
                          />
                        </svg>
                        <path
                          d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"
                        />

                        <path
                          fill-rule="evenodd"
                          d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"
                        />
                        <path
                          fill-rule="evenodd"
                          d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"
                        />
                      </router-link>
                      <router-link
                        class="btn btn-dark"
                        style="width: 10vh"
                        :to="{ path: '/reservation/'}"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="16"
                          height="16"
                          fill="currentColor"
                          class="bi bi-calendar2-plus-fill"
                          viewBox="0 0 16 16"
                        >
                          <path
                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 3.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5H2.545c-.3 0-.545.224-.545.5zm6.5 5a.5.5 0 0 0-1 0V10H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V11H10a.5.5 0 0 0 0-1H8.5V8.5z"
                          />
                        </svg>
                      </router-link>
                      <div class="card-body">
                        <div class="badge bg-secondary">
                          Reference : {{ ref }}
                        </div>
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Date</th>
                                <th>Timeframe</th>
                                <th>Consultation Type</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="elemt in rdvs" v-bind:key="elemt.id">
                                <template v-if="editClient.id == elemt.id">
                                  <td><input v-model="date" type="date" /></td>
                                  <!-- <td><input v-model="editClient.horaire" type="text"></td> -->
                                  <td>
                                    <select
                                      class="form-control"
                                      id="exampleFormControlSelect1"
                                      v-model="editClient.horaire"
                                    >
                                      <option disabled>
                                        choisir un horaire
                                      </option>
                                      <option
                                        v-for="(el, index) in horairesPr"
                                        :key="index"
                                        :disabled="el.etat"
                                      >
                                        {{ el.val }}
                                      </option>
                                    </select>
                                  </td>
                                  <td>
                                    <input
                                      v-model="editClient.typeCons"
                                      type="text"
                                    />
                                  </td>
                                  <td>
                                    <button
                                      class="btn btn-success btn-sm rounded-0"
                                      @click="update()"
                                    >
                                      Update
                                    </button>
                                    &nbsp;<button
                                      class="btn btn-sm rounded-0"
                                      @click="cancel()"
                                    >
                                      <i class="fa fa-ban"></i>
                                    </button>
                                  </td>
                                </template>
                                <template v-else>
                                  <td>{{ elemt.date }}</td>
                                  <td>{{ elemt.horaire }}</td>
                                  <td>{{ elemt.typeCons }}</td>
                                  <td>
                                    <button
                                      class="btn btn-danger btn-sm rounded-0"
                                      @click="
                                        slectU(elemt.id);
                                        del();
                                      "
                                    >
                                      <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-trash-fill"
                                        viewBox="0 0 16 16"
                                      >
                                        <path
                                          d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"
                                        />
                                      </svg>
                                    </button>
                                    &nbsp;<button
                                      class="btn btn-primary btn-sm rounded-0"
                                      @click="edit(elemt.id)"
                                    >
                                      <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-pencil-fill"
                                        viewBox="0 0 16 16"
                                      >
                                        <path
                                          d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"
                                        />
                                      </svg>
                                    </button>
                                  </td>
                                </template>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
/* eslint-disable */
export default {
  name: "RendezVous",
  data() {
    return {
      rdvs: [],
      ref: "",
      date: "",
      curentElment: "",
      editReser: "",
      editClient: {
        id: "",
        date: "",
        horaire: "",
        typeCons: "",
      },
      horairesPr: [
        { val: "08:00-09:00", etat: false },
        { val: "09:00-10:00", etat: false },
        { val: "10:00-11:00", etat: false },
        { val: "11:00-12:00", etat: false },
        { val: "13:00-14:00", etat: false },
        { val: "14:00-15:00", etat: false },
        { val: "15:00-16:00", etat: false },
        { val: "16:00-17:00", etat: false },
        { val: "17:00-18:00", etat: false },
      ],
      horaires: [],
    };
  },
  mounted(){
     this.refer();
     this.getAll();
 
  },
  methods:{
    async getAll(){
    const response = await fetch('http://localhost/brief-6/back-end/api/rdv/afficherRdv/'+this.ref);
    const data = await response.json();
    console.log(data);
    this.rdvs=data;
    },
    refer(){
        this.ref = localStorage.getItem('refl');
        },
    slectU(x){
       this.curentElment=x;
    },

    async del() {
        await fetch('http://localhost/brief-6/back-end/api/rdv/supprimerRdv/'+this.curentElment,{
            method:"DELETE",
            
        });
       await this.getAll();
               this.$swal("Success!", "Your reservation has been deleted!", "success");

    },
    async edit(x){
        fetch('http://localhost/brief-6/back-end/api/rdv/getoneRdv/'+x)
        .then(response => response.json())
        .then(data =>{
            this.editReser=data.id;
            this.editClient.id=data.id;
            this.editClient.date=data.date;
            this.date=data.date;
            this.editClient.horaire=data.horaire;
            this.editClient.typeCons=data.typeCons;
            this.filtrerH(data.date);
            // console.log(this.editClient.horaire);
            
        })
    },
   async update(){
        console.log(JSON.stringify(this.editClient));
       await fetch(' http://localhost/brief-6/back-end/api/rdv/modifierRdv/'+this.editClient.id,{
            method: 'PUT',
            headers:{
                'Content-Type': 'application/json',
            },
            body:JSON.stringify(this.editClient),
        });
        await this.getAll();
        this.editReser='';
        this.editClient.id='';
        this.editClient.date='';
        this.editClient.horaire='';
        this.editClient.typeCons='';
        console.log(JSON.stringify(this.editClient));
        this.$swal("Success!", "Your reservation has been update!", "success");

        
    },
    cancel(){
        this.editReser='';
        this.editClient.id=''
        this.editClient.date='';
        this.editClient.horaire='';
        this.editClient.typeCons='';
    },
     async getTime(val) {
            
            const response = await fetch(
                "http://localhost/brief-6/back-end/api/rdv/afficherHr/" + val
            );
            const data = await response.json();
            this.horaires = data;
        },
         async filtrerH (val) {
            
            await this.getTime(val);
            await (this.editClient.date = val);
            await (this.editClient.reference = this.$route.params.ref);
            await console.log(this.editClient);
            //    await (console.log(this.horaires.length));
             for (var i = 0; i < this.horairesPr.length; i++) {
                await (this.horairesPr[i].etat = false);
                for (var j = 0; j < this.horaires.length; j++) {
                    if (this.horairesPr[i].val == this.horaires[j]) {
                        // console.log(this.horairesPr[i].etat);
                         await (this.horairesPr[i].etat = true);
                        console.log( this.horaires[j] + "///eg///");
                       
                    }
                }
            }
        }
  },
  watch: {
        date: async function (val) {
            this.editClient.horaire = "choisir un horaire";
            this.filtrerH (val);
        },
    },
 
};
</script>
<style>
        .affcont{
            position: absolute;
            /* top: 10%; */
            padding: 5%;
            /* left: 5%; */
            /* transform: translate(-50%, -50%); */
        }
    .rdvherd{
        height: 10vh;
    }
    .btn-info{color:#fff;}
    table th{
        color: #2475a0;
    }

    </style>