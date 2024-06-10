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
              <input 
                type="email" 
                id="login-email" 
                v-model="loginEmail" 
                :class="{'is-invalid': loginErrors.email}" 
                class="form-control" 
                required
              >
              <div class="invalid-feedback">{{ loginErrors.email }}</div>
            </div>
            <div class="mb-3">
              <label for="login-password" class="form-label">Senha:</label>
              <input 
                type="password" 
                id="login-password" 
                v-model="loginPassword" 
                :class="{'is-invalid': loginErrors.password}" 
                class="form-control" 
                required
              >
              <div class="invalid-feedback">{{ loginErrors.password }}</div>
            </div>
            <div v-if="loginErrors.general" class="text-danger mb-3">{{ loginErrors.general }}</div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
          </form>
        </div>
        <div v-else>
          <h2 class="text-center">Registro</h2>
          <form @submit.prevent="register">
            <div class="mb-3">
              <label for="register-name" class="form-label">Nome:</label>
              <input 
                type="text" 
                id="register-name" 
                v-model="registerName" 
                :class="{'is-invalid': registerErrors.name}" 
                class="form-control" 
                required
              >
              <div class="invalid-feedback">{{ registerErrors.name }}</div>
            </div>
            <div class="mb-3">
              <label for="register-email" class="form-label">Email:</label>
              <input 
                type="email" 
                id="register-email" 
                v-model="registerEmail" 
                :class="{'is-invalid': registerErrors.email}" 
                class="form-control" 
                required
              >
              <div class="invalid-feedback">{{ registerErrors.email }}</div>
            </div>
            <div class="mb-3">
              <label for="register-password" class="form-label">Senha:</label>
              <input 
                type="password" 
                id="register-password" 
                v-model="registerPassword" 
                :class="{'is-invalid': registerErrors.password}" 
                class="form-control" 
                required
              >
              <div class="invalid-feedback">{{ registerErrors.password }}</div>
            </div>
            <div class="mb-3">
              <label for="register-password-confirmation" class="form-label">Confirme a Senha:</label>
              <input 
                type="password" 
                id="register-password-confirmation" 
                v-model="registerPasswordConfirmation" 
                :class="{'is-invalid': registerErrors.password_confirmation}" 
                class="form-control" 
                required
              >
              <div class="invalid-feedback">{{ registerErrors.password_confirmation }}</div>
            </div>
            <div v-if="registerErrors.general" class="text-danger mb-3">{{ registerErrors.general }}</div>
            <button type="submit" class="btn btn-primary w-100">Registrar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
data() {
  return {
    showLogin: true,
    loginEmail: '',
    loginPassword: '',
    registerName: '',
    registerEmail: '',
    registerPassword: '',
    registerPasswordConfirmation: '',
    loginErrors: {},
    registerErrors: {}
  };
},
methods: {
  login() {
    this.clearErrors();
    axios.post('/login', {
      email: this.loginEmail,
      password: this.loginPassword
    })
    .then(response => {
      localStorage.setItem('token', response.data.access_token);
      window.location.href = '/produtos';
    })
    .catch(error => {
      this.handleErrors(error, 'login');
    });
  },
  register() {
    this.clearErrors();
    axios.post('/register', {
      name: this.registerName,
      email: this.registerEmail,
      password: this.registerPassword,
      password_confirmation: this.registerPasswordConfirmation
    })
    .then(response => {
      localStorage.setItem('token', response.data.access_token);
      window.location.href = '/produtos';
    })
    .catch(error => {
      this.handleErrors(error, 'register');
    });
  },
  clearErrors() {
    this.loginErrors = {};
    this.registerErrors = {};
  },
  handleErrors(error, formType) {
    if (error.response && error.response.data && error.response.data.errors) {
      const errors = error.response.data.errors;
      for (const [key, value] of Object.entries(errors)) {
        if (formType === 'login') {
          this.loginErrors[key] = value[0];
        } else if (formType === 'register') {
          this.registerErrors[key] = value[0];
        }
      }
    } else if (error.response && error.response.data && error.response.data.message) {
      if (formType === 'login') {
        this.loginErrors.general = error.response.data.message;
      } else if (formType === 'register') {
        this.registerErrors.general = error.response.data.message;
      }
    } else {
      if (formType === 'login') {
        this.loginErrors.general = 'Erro ao tentar fazer login. Tente novamente mais tarde.';
      } else if (formType === 'register') {
        this.registerErrors.general = 'Erro ao tentar registrar. Tente novamente mais tarde.';
      }
    }
  }
}
};
</script>

<style>
.w-30 {
width: 30%;
}

.is-invalid {
border-color: red;
}

.invalid-feedback {
color: red;
}
</style>