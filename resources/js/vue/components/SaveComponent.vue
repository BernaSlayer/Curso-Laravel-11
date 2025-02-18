<template>
  <div class="grid grid-cols-2 grap-3">
    
    <div class="col-span-2">
    <o-field label="Title" :variant="fieldError('title')">
      <o-input v-model="form.title"></o-input>
      <p v-if="errors.title" class="error-message">{{ errors.title }}</p>
    </o-field>
  </div>
    
  

    <o-field label="Content" :variant="fieldError('content')">
      <o-input v-model="form.content" type="textarea"></o-input>
      <p v-if="errors.content" class="error-message">{{ errors.content }}</p>
    </o-field>

    <o-field label="Description" :variant="fieldError('description')">
      <o-input v-model="form.description" type="textarea"></o-input>
      <p v-if="errors.description" class="error-message">{{ errors.description }}</p>
    </o-field>
    <o-field label="Slug" :variant="fieldError('slug')">
      <o-input v-model="form.slug"></o-input>
      <p v-if="errors.slug" class="error-message">{{ errors.slug }}</p>
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

    <o-notification v-if="generalError" type="danger" position="top-right">
      {{ generalError }}
    </o-notification>
  </div>
  <div class="mt-3">
  <o-button variant="primary" @click="send">{{ isEditing ? 'Update' : 'Send' }}</o-button>
  </div>

</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      post: null,
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
      isEditing: false,
    };
  },

  async mounted() {
    await this.getCategory();
    if (this.$route.params.slug) {
      await this.loadPost();
    }
  },

  methods: {
    async loadPost() {
      try {
        console.log("Cargando post con slug:", this.$route.params.slug);
        const response = await axios.get(`/api/post/slug/${this.$route.params.slug}`);
        this.post = response.data;
        console.log("Post recibido:", this.post);
        this.isEditing = true;
        this.fillForm();
      } catch (error) {
        console.error("Error al obtener el post:", error);
      }
    },

    fillForm() {
      if (this.post) {
        this.form.title = this.post.title || "";
        this.form.slug = this.post.slug || "";
        this.form.content = this.post.content || "";
        this.form.description = this.post.description || "";
        this.form.posted = this.post.posted || "";
        this.form.category_id = this.post.category_id || "";
        console.log("Formulario actualizado con:", this.form);
      }
    },
    
    async getCategory() {
      try {
        const response = await axios.get("/api/category/all");
        this.categories = response.data.data || response.data; // Ajusta según el formato de la API
        console.log("Categorías cargadas:", this.categories);
      } catch (error) {
        console.error("Error al obtener categorías:", error);
      }
    },

    fieldError(field) {
      return this.errors[field] ? "danger" : "";
    },

    async send() {
      this.errors = {}; // Limpiar errores previos
      this.generalError = ""; // Limpiar mensaje de error general

      try {
        if (this.isEditing) {
          const response = await axios.put(`/api/post/${this.post.id}`, this.form);
          console.log("Post actualizado:", response.data);
          alert("Post actualizado exitosamente");
        } else {
          const response = await axios.post("/api/post", this.form);
          console.log("Post creado:", response.data);
          alert("Post creado exitosamente");
        }
      } catch (error) {
        if (error.response && error.response.data.errors) {
          this.errors = error.response.data.errors;
        } else {
          this.generalError = "Ocurrió un error al guardar el post. Intenta de nuevo.";
        }
      }
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
