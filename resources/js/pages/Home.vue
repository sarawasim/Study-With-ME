<template>
  <div class="home">
    <h1>Log In</h1>

    <div v-if="!isLogging">
    <h2>Welcome, please log in or register</h2>
      <div>
        <label>Email</label>
        <input type="text"        
        v-model="data.email" name="email">
      </div>
      <div>
        <label>Password: </label>
        <input type="password" v-model="data.password"  name="password">
      </div>

      <div class="text-center">
        <button type="primary" @click="login" :disabled="isLogging" :loading="isLogging">{{isLogging ? 'Loging...' : 'Login'}}</button>
      </div>
      <p>Don't have an Account? <router-link :to="{name: 'register'}">Register</router-link> </p>
    </div>


    <div v-if="isLogging">
          Hi, User
    </div>

  </div>
</template>

<script>

  import common from "../common";

  export default {
      mixins: [common],
      data(){
          return {
              data : {
                  email : '', 
                  password: ''
              }, 
              isLogging: false, 
          }
      }, 
      methods : {
          async login(){
              // if(this.data.email.trim()=='') return this.e('Email is required')
              // if(this.data.password.trim()=='') return this.e('Password is required')
              // if(this.data.password.length < 6) return this.e('Incorrect login details')

              const res = await this.callApi('post', '/verify_user', this.data)
              if(res.status===200){
                  console.log(res.data.msg)    
                  this.isLogging = true  
              }else{
                  if(res.status===401){
                      consolg.log(res.data.msg)
                  }else if(res.status==422){
                      for(let i in res.data.errors){
                          console.log(res.data.errors[i][0])
                      }
                  }
                  else{
                      // this.swr()
                  }
              }
          }
      }
  }
</script>