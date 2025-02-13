<template>
    <div>
      <o-field label="Title">
        <o-input v-model="form.title" required></o-input>
      </o-field>
      <o-field label="Slug">
        <o-input v-model="form.slug" required></o-input>
      </o-field>
      <o-field label="Content">
        <o-input v-model="form.content" type="textarea" required></o-input>
      </o-field>
      <o-field label="Description">
        <o-input v-model="form.description" type="textarea" required></o-input>
      </o-field>
      <o-field label="Posted">
        <o-select v-model="form.posted" placeholder="Select an option" required>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </o-select>
      </o-field>
      <o-field label="Category_id">
        <o-select v-model="form.category_id" placeholder="Select an option" required>
          <option disabled value="">Select a category</option>
          <option v-for="c in categories" :key="c.id" :value="c.id">{{ c.title }}</option>
        </o-select>
      </o-field>
      <o-button variant="primary" @click="send">Send</o-button>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        form: {
          title: '',
          slug: '',
          content: '',
          description: '',
          posted: '',
          category_id: null,
        },
        categories: [],
      };
    },
    mounted() {
      this.getCategories();
    },
    methods: {
      async getCategories() {
        try {
          const response = await axios.get('/api/category/all');
          this.categories = response.data;
        } catch (error) {
          console.error('Error al obtener categorías:', error);
        }
      },
      async send() {
        try {
          if (!this.form.category_id) {
            alert('Por favor, selecciona una categoría.');
            return;
          }
          const response = await axios.post('/api/post', this.form);
          console.log('Post creado:', response.data);
        } catch (error) {
          console.error('Error en la petición:', error);
          if (error.response) {
            console.error('Código de estado:', error.response.status);
            console.error('Datos del error:', error.response.data);
          } else if (error.request) {
            console.error('No hubo respuesta del servidor:', error.request);
          } else {
            console.error('Error al configurar la petición:', error.message);
          }
        }
      }
    }
  };
  </script>
  