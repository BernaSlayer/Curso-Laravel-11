<template>
  <div>
    <o-field label="Title">
      <o-input v-model="form.title"></o-input>
    </o-field>
    <o-field label="Slug">
      <o-input v-model="form.slug"></o-input>
    </o-field>
    <o-field label="Content">
      <o-input v-model="form.content" type="textarea"></o-input>
    </o-field>
    <o-field label="Description">
      <o-input v-model="form.description" type="textarea"></o-input>
    </o-field>
        <o-field label="Posted">
      <o-select v-model="form.posted" placeholder="Select an option">
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </o-select>
    </o-field>
    <o-field label="Category">
      <o-select v-model="form.category_id" placeholder="Select an option">
        <option value=""></option>
        <option v-for="c in categories" v-bind:key="c.id" :value="c.id">{{ c.title }}</option>
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
        category_id: '',
      },
      categories: [],
    };
  },
  mounted() {
    this.getCategory();
  },
  methods: {
    getCategory() {
      axios.get('/api/category/all').then(response => {
        this.categories = response.data;
      });
    },
    send() {
  axios.post('/api/post', this.form).then(response => {
    console.log('Post creado:', response.data);
  }).catch(error => {
    console.log('Error en la petición:');
    if (error.response) {
      console.error('Código de estado:', error.response.status);
      console.error('Datos del error:', error.response.data);
      console.error('Cabeceras:', error.response.headers);
    } else if (error.request) {
      console.error('No hubo respuesta del servidor:', error.request);
    } else {
      console.error('Error al configurar la petición:', error.message);
    }
  });
}

  } 
};

</script>
