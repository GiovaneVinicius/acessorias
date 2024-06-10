<template>
    <div class="cart-items">
      <h2>Itens no Carrinho:</h2>
      <ul>
        <li v-for="item in cartItems" :key="item.id">
          <strong>{{ item.product.name }}</strong> - Quantidade: {{ item.quantity }}
        </li>
      </ul>
      <button @click="sendOrder" class="btn btn-lg btn-success">Enviar Pedido</button>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    name: 'CartItems',
    data() {
      return {
        cartItems: []
      };
    },
    props: {
      userId: {
        type: String, 
        required: true
      }
    },
    methods: {
      async fetchCartItems() {
        try {
          const token = localStorage.getItem('token');
          if (!token) {
            throw new Error('Token not found');
          }
  
          const response = await axios.get(`/api/carts/${this.userId.toString()}`, {
            headers: {
              'Authorization': `Bearer ${token}`
            }
          });
          this.cartItems = response.data.products;
        } catch (error) {
          console.error('Error fetching cart items:', error.message);
        }
      },
      async sendOrder() {
        try {
          // Aqui você pode enviar o pedido para o backend
          console.log('Pedido enviado:', this.cartItems);
          // Limpa o carrinho local após o envio do pedido
          this.cartItems = [];
          alert('Pedido enviado com sucesso!');
        } catch (error) {
          console.error('Erro ao enviar o pedido:', error.message);
        }
      }
    },
    created() {
      this.fetchCartItems();
    }
  };
  </script>
  
  <style scoped>
  .cart-items {
    margin: 20px;
  }
  </style>
  