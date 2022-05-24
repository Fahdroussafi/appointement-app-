<template>
  <div class="container">
    <div class="row">
      <form class="crd col-8">
        <div class="form-group">
          <label for="exampleFormControlInput1">Date</label>
          <input
            type="date"
            class="form-control"
            id="exampleFormControlInput1"
            placeholder="date"
            v-model="date"
          />
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Horaire</label>
          <select class="form-control" id="exampleFormControlSelect1">
            <option v-for="(el, index) in horaires" :key="index">
              {{ el }}
            </option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1"
            >Decrir le sujet de rdv</label
          >
          <textarea
            class="form-control"
            id="exampleFormControlTextarea1"
            rows="3"
          ></textarea>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
/* eslint-disable */
export default {
  name: "Reservation",
  data() {
    return {
      date: "",
      horaires: [],
    };
  },
  methods: {
    inArray(val, tab) {
      var length = tab.length;
      console.log(val + "rrrz");
      for (var i = 0; i < length; i++) {
        if (tab[i] != val) return "disabled";
      }
      return "selected";
    },
    async getTime(val) {
      console.log("im in");
      const response = await fetch(
        "http://localhost/brief-6/back-end/api/rdv/afficherHr/" + val
      );
      const data = await response.json();
      this.horaires = data;
    },
  },
  watch: {
    date: async function (val) {
      await this.getTime(val);
      console.log(this.horaires.length);
    },
  },
};
</script>
<style>
.crd {
  position: absolute;
  top: 20%;
  left: 20%;
}
</style>
