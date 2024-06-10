<template>
    <div class="product-list">
      <div class="row">
        <div v-for="product in products" :key="product.id" class="col-md-3">
          <div class="card mb-4 shadow-sm">
            <img :src="product.image" class="card-img-top" alt="Product Image">
            <div class="card-body">
              <h5 class="card-title">{{ product.name }}</h5>
              <p class="card-text">{{ product.description }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">${{ product.price }}</small>
                <button @click="addToCart(product)" class="btn btn-sm btn-primary">Add to Cart</button>
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
  
          const response = await axios.post('/api/carts', { product_id: product.id }, {
            headers: {
              'Authorization': `Bearer ${token}`
            }
          });
          alert('Product added to cart!');
        } catch (error) {
          if (error.response && error.response.status === 401) {
            console.error('Unauthenticated:', error.response.data.message);
          } else {
            console.error('Error adding product to cart:', error.message);
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
  