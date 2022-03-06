<template>
  <div class="home">
    <h1>Register</h1>
    <div>
    <h2>Welcome, please log in or register</h2>
       <form>
        <div class="form-group">
          <label for="email">Name</label>
          <input
            type="text"
            class="form-control"
            id="name"
            v-model="data.name"
            placeholder="Enter name"
          />
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input
            type="email"
            class="form-control"
            id="email"
            v-model="data.email"
            placeholder="Enter email"
          />
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input
            type="password"
            class="form-control"
            id="password"
            v-model="data.password"
            placeholder="Password"
          />

        </div>
        <button type="button" @click="register" class="btn btn-primary">
          Register
        </button>
      </form>
    </div>

    
  </div>
</template>

<script>

  import common from "../common";
  import { mapGetters } from 'vuex'

  export default {
      mixins: [common],
      data(){
          return {
              data : {
                  name: '',
                  email : '', 
                  password: ''
              }, 
              isLogging: false, 
              error : ''
          }
      }, 
      methods : {
          async register(){
              // if(this.data.email.trim()=='') return this.e('Email is required')
              // if(this.data.password.trim()=='') return this.e('Password is required')
              // if(this.data.password.length < 6) return this.e('Incorrect login details')
              this.isLogging = true
              const res = await this.callApi('post', '/create_user', this.data)
              if(res.status===200){
                  // this.s(res.data.msg)
                  window.location = '/about'
              }else{
                  if(res.status===401){
                      this.i(res.data.msg)
                  }else if(res.status==422){
                      for(let i in res.data.errors){
                          console.log(res.data.errors[i][0])
                      }
                  }
                  else{
                      this.swr()
                  }
              }
              this.isLogging = false
          }
      }
  }
</script>