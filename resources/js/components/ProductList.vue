<template>
    <div class="product-list">
      <div class="row">
        <div v-for="product in products" :key="product.id" class="col-md-3">
          <div class="card mb-4 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">{{ product.name }}</h5>
              <p class="card-text">{{ product.description }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">R$ {{ product.price }}</small>
                <div>
                  <input type="number" v-model="product.quantity" min="1" max="100" style="width: 50px;" required placeholder="qtd.">
                  <button @click="addToCart(product)" class="btn btn-sm btn-primary">Adicionar ao Carrinho</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  
  <script>
  import axios from 'axios';
  
  export default {
    name: 'ProductList',
    data() {
      return {
        products: []
      };
    },
    methods: {
      async fetchProducts() {
        try {
          const token = localStorage.getItem('token');
          if (!token) {
            throw new Error('Token not found');
          }
  
          const response = await axios.get('/api/products', {
            headers: {
              'Authorization': `Bearer ${token}`
            }
          });
          this.products = response.data;
        } catch (error) {
          if (error.response && error.response.status === 401) {
            console.error('Unauthenticated:', error.response.data.message);
          } else {
            console.error('Error fetching products:', error.message);
          }
        }
      },
      async addToCart(product) {
        try {
            const token = localStorage.getItem('token');
            if (!token) {
            throw new Error('Token not found');
            }

            const userId = localStorage.getItem('user_id');
            if (!userId) {
                throw new Error('User ID not found');
            }

            const data = {
            user_id: userId,
            products: [
                {
                id: product.id,
                quantity: product.quantity
                }
            ]
            };

            const response = await axios.post('/api/carts', data, {
            headers: {
                'Authorization': `Bearer ${token}`
            }
            });
            alert('Produto adicionado ao carrinho!');
            window.location.reload();
        } catch (error) {
            if (error.response && error.response.status === 401) {
            console.error('Não autenticado:', error.response.data.message);
            } else {
            console.error('Erro ao adicionar o produto ao carrinho:', error.message);
            }
        }
        }

    },
    created() {
      this.fetchProducts();
    }
  };
  </script>
  
  <style scoped>
  .product-list {
    margin: 20px;
  }
  .card {
    width: 100%;
  }
  </style>
  