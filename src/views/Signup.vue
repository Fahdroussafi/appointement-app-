<template>
  <section class="vh-100" style="background-color: #eee">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
                    Please Register your account
                  </p>

                  <form class="mx-1 mx-md-4" v-on:submit.prevent="Signup">
                    <!-- eslint-disable-line -->
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input
                          type="text"
                          class="form-control"
                          id="inputEmail4"
                          placeholder=" Enter Your First Name"
                          required
                          v-model="clientData.firstname"
                        />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input
                          type="text"
                          class="form-control"
                          id="inputPassword4"
                          placeholder="Enter Your Last Name"
                          required
                          v-model="clientData.lastname"
                        />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input
                          type="number"
                          class="form-control"
                          id="inputAddress2"
                          placeholder="Enter Your Age"
                          min="18"
                          required
                          v-model="clientData.age"
                        />
                      </div>
                    </div>
                    <div
                      class="d-flex justify-content-center mx-4 mb-3 mb-lg-4"
                    >
                      <button type="submit" class="btn btn-outline-dark btn-lg"> 
                        Create Account 
                      </button>
                    </div>
                    <div>
                      <p class="mb-5 pb-lg-2" style="color: #393f81">
                        Already have an account ?
                        <router-link :to="{ path: '/login' }"
                          >Login</router-link
                        >
                      </p>
                    </div>
                  </form>
                </div>

                <div
                  class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2"
                >
                  <img
                    src="https://www.freevector.com/uploads/vector/preview/30815/DOCTOR.jpg"
                    class="img-fluid" style="border-radius: 150px;"
                    alt="doctor"
                  />
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
export default {
  name: "Signup",
  data() {
    return {
      clientData: {
        reference: "",
        firstname: "",
        lastname: "",
        age: "",
      },
    };
  },
  methods: {
    async Signup() {
      // GET request using fetch with async/await
      const response = await fetch(
        "http://localhost/brief-6/back-end/api/User/addUser",
        {
          method: "POST",
          headers: {
            // headers: { 'Content-Type': 'application/json' }
            "Content-Type": "application/json", // or 'application/x-www-form-urlencoded'
          },
          body: JSON.stringify(this.clientData), // data can be `string` or {object}!
        }
      );
      const data = await response.json(); // parses JSON response into native JavaScript objects
      console.log({ data });
      this.ref = data.reference;
      // console.log(this.ref);
      this.ref = "";
      this.clientData.firstname = "";
      this.clientData.lastname = "";
      this.clientData.age = "";
      this.$swal(
        "This is your ID. Please don't lose it.</br>" + data.reference
      );
      this.$router.push("/login");
    },
  },
};
</script>
