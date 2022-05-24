<template>
  <section
    class="bg-image"
    style="
      background-image: url('https://wallpaperaccess.com/full/619985.jpg');
      height: 100vh;
    "
  >
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="container">
                  <div class="row">
                    <div class="alert alert-danger" role="alert" v-if="erreur">
                      {{ erreur }}
                    </div>
                  </div>
                  <form class="mx-1 mx-md-4" v-on:submit.prevent="Submt">
                    <div
                      class="d-flex flex-row justify-content-center align-items-center mb-4"
                    >
                      <div class="form-outline flex-fill mb-0">
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Date :</label>
                          <input
                            type="date"
                            class="form-control"
                            id="exampleFormControlInput1"
                            placeholder="date"
                            v-model="date"
                          />
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlSelect1"
                            >Timeframe :</label
                          >
                          <select
                            class="form-control"
                            id="exampleFormControlSelect1"
                            v-model="rdvData.horaire"
                          >
                            <option selected disabled>
                              Choose a Timeframe
                            </option>
                            <option
                              v-for="(el, index) in horairesPr"
                              :key="index"
                              :disabled="el.etat"
                            >
                              {{ el.val }}
                            </option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1"
                            >Reason for the visit :</label
                          >
                          <select
                            class="form-control"
                            id="exampleFormControlSelect1"
                            v-model="rdvData.typeCons"
                          >
                            <option>Chickenpox</option>
                            <option>Common cold</option>
                            <option>Diphtheria</option>
                            <option>HIV/AIDS</option>
                            <option>Headaches</option>
                            <option>Varicose</option>
                            <option>Diarrhea</option>
                            <option>Allergies</option>
                            <option>Colds and Flu</option>
                          </select>
                        </div>
                        <button
                          type="submit"
                          class="btn btn-outline-dark mt-2 btn-lg"
                        >
                          Book Now
                        </button>
                      </div>
                    </div>
                  </form>
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
import { reference } from '@popperjs/core';
export default {
  name: "Reservation",
  data() {
    return {
      erreur: "",
      date: "",
      horairesPr: [
        { val: "08:00-09-00", etat: false },
        { val: "09:00-10-00", etat: false },
        { val: "10:00-11-00", etat: false },
        { val: "11:00-12-00", etat: false },
        { val: "13:00-14-00", etat: false },
        { val: "14:00-15-00", etat: false },
        { val: "15:00-16-00", etat: false },
        { val: "16:00-17-00", etat: false },
        { val: "17:00-18-00", etat: false },
      ],
      horaires: [],
      rdvData: {
        date: "",
        horaire: "Choose a Timeframe",
        typeCons: "",
        reference: "",
      },
    };
  },
  mounted() {
    this.refer();
  },
  methods: {
    async Submt() {
      if (
        this.rdvData.horaire != "Choose a Timeframe" &&
        this.rdvData.typeCons != ""
      ) {
        
        // GET request using fetch with async/await

        const ref = localStorage.getItem('refl');
        console.log({ref});
        let response = await fetch(
          "http://localhost/brief-6/back-end/api/rdv/ajouterRdv",
          {
            method: "POST", // or 'PUT'
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({...this.rdvData,reference: ref}),
            
          },
        
        );

        this.$router.push("/rdv");
        this.$swal("Success!", "Your reservation has been made!", "success");
      } else {
        this.erreur = "Please fill in all the fields";
      }
    },
    refer(){
        this.ref = (localStorage.getItem('refl'));
        console.log(this.ref);
        },
    async getTime(val) {
      const response = await fetch(
        "http://localhost/brief-6/back-end/api/rdv/afficherHr/" + val
      );
      const data = await response.json();
      this.horaires = data;
    },
  },
  watch: {
    date: async function (val) {
      //
      await this.getTime(val);
      this.rdvData.horaire = "Choose a Timeline";
      await (this.rdvData.date = val);
      await (this.rdvData.reference = this.$route.params.ref);
      if (this.horairesPr.length == this.horaires.length) {
        this.erreur =
          "There are no available timeframes for this date, please choose another one";
      } else {
        this.erreur = "";
      }
      for (var i = 0; i < this.horairesPr.length; i++) {
        this.horairesPr[i].etat = false;
        for (var j = 0; j < this.horaires.length; j++) {
          if (this.horairesPr[i].val == this.horaires[j]) {
            this.horairesPr[i].etat = true;
          }
        }
      }
    },
  },
};
</script>
