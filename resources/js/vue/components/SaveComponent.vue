<template>
  <div>
    <o-field label="Title" :variant="fieldError('title')">
      <o-input v-model="form.title"></o-input>
      <p v-if="errors.title" class="error-message">{{ errors.title }}</p>
    </o-field>

    <o-field label="Slug" :variant="fieldError('slug')">
      <o-input v-model="form.slug"></o-input>
      <p v-if="errors.slug" class="error-message">{{ errors.slug }}</p>
    </o-field>

    <o-field label="Content" :variant="fieldError('content')">
      <o-input v-model="form.content" type="textarea"></o-input>
      <p v-if="errors.content" class="error-message">{{ errors.content }}</p>
    </o-field>

    <o-field label="Description" :variant="fieldError('description')">
      <o-input v-model="form.description" type="textarea"></o-input>
      <p v-if="errors.description" class="error-message">{{ errors.description }}</p>
    </o-field>

    <o-field label="Posted" :variant="fieldError('posted')">
      <o-select v-model="form.posted" placeholder="Select an option">
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </o-select>
      <p v-if="errors.posted" class="error-message">{{ errors.posted }}</p>
    </o-field>

    <o-field label="Category" :variant="fieldError('category_id')">
      <o-select v-model="form.category_id" placeholder="Select an option">
        <option value="">Select a category</option>
        <option v-for="c in categories" :key="c.id" :value="c.id">
          {{ c.title }}
        </option>
      </o-select>
      <p v-if="errors.category_id" class="error-message">{{ errors.category_id }}</p>
    </o-field>

    <o-button variant="primary" @click="send">Send</o-button>

    <o-notification v-if="generalError" type="danger" position="top-right">
      {{ generalError }}
    </o-notification>
  </div>
</template>

<script>
import axios from "axios";

export default {
 async mounted() {
    if (this.$forceUpdate.parms.slug) {
      this.post = await this.axios.get("/api/post/slug"+this.$forceUpdate.parms.slug);
      this.post = this.post.data;
      this.iitPost();
    }
    this.getCategory();
  },
  data() {
    return {
      post:'',
      form: {
        title: "",
        slug: "",
        content: "",
        description: "",
        posted: "",
        category_id: "",
      },
      categories: [],
      errors: {},
      generalError: "", // Mensaje de error general
    };
  },

  methods: {
    getCategory() {
      axios.get("/api/category/all").then((response) => {
        this.categories = response.data;
      });
    },
    fieldError(field) {
      return this.errors[field] ? "danger" : "";
    },
    send() {
      this.errors = {}; // Limpiar errores previos
      this.generalError = ""; // Limpiar mensaje de error general

      axios
        .post("/api/post", this.form)
        .then((response) => {
          console.log("Post creado:", response.data);
          alert("Post creado exitosamente");
        })
        .catch((error) => {
          if (error.response && error.response.data.errors) {
            // Si hay errores de validación del backend, los mostramos
            this.errors = error.response.data.errors;
          } else {
            // Error general del servidor
            this.generalError = "Ocurrió un error al guardar el post. Intenta de nuevo.";
          }
        });
    },
  },
};
</script>

<style>
.error-message {
  color: red;
  font-size: 12px;
  margin-top: 5px;
}
</style>
