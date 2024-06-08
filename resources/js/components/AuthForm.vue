<template>
    <div class="d-flex justify-content-center align-items-center vh-100">
      <div class="card w-30">
        <div class="card-body">
          <div class="d-flex justify-content-center mb-4">
            <button 
              class="btn btn-outline-primary mx-2" 
              :class="{ 'active': showLogin }" 
              @click="showLogin = true"
            >
              Login
            </button>
            <button 
              class="btn btn-outline-primary mx-2" 
              :class="{ 'active': !showLogin }" 
              @click="showLogin = false"
            >
              Registro
            </button>
          </div>
          <div v-if="showLogin">
            <h2 class="text-center">Login</h2>
            <form @submit.prevent="login">
              <div class="mb-3">
                <label for="login-email" class="form-label">Email:</label>
                <input type="email" id="login-email" v-model="loginEmail" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="login-password" class="form-label">Senha:</label>
                <input type="password" id="login-password" v-model="loginPassword" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
          </div>
          <div v-else>
            <h2 class="text-center">Registro</h2>
            <form @submit.prevent="register">
              <div class="mb-3">
                <label for="register-name" class="form-label">Nome:</label>
                <input type="text" id="register-name" v-model="registerName" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="register-email" class="form-label">Email:</label>
                <input type="email" id="register-email" v-model="registerEmail" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="register-password" class="form-label">Senha:</label>
                <input type="password" id="register-password" v-model="registerPassword" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-primary w-100">Registrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        showLogin: true,
        loginEmail: '',
        loginPassword: '',
        registerName: '',
        registerEmail: '',
        registerPassword: ''
      };
    },
    methods: {
      login() {
        // Implementar lógica de login
        console.log("Login:", this.loginEmail, this.loginPassword);
      },
      register() {
        // Implementar lógica de registro
        console.log("Registro:", this.registerName, this.registerEmail, this.registerPassword);
      }
    }
  };
  </script>
  
  <style scoped>
    .w-30{
        width: 30%;
    }
  </style>
  