<template>
  <form id="contato" @submit="checkForm" action="/php/mail.php" method="post" v-if="!sended">
    
    <article class="message is-danger" v-if="errors.length">
      <div class="message-header">
        <p>Atenção</p>
        <button class="delete" aria-label="delete" @click="errors = !errors"></button>
      </div>
      <div class="message-body">
        <strong>Por favor, corrija o(s) seguinte(s) erro(s):</strong>
        <ul>
          <li :key="error.name" v-for="error in errors">{{ error }}</li>
        </ul>
      </div>
    </article>
  
    <div class="field">
      <label class="label has-text-light">Nome</label>
      <div class="control">
        <input class="input" id="nome" v-model="campos.nome" type="text" name="nome" placeholder="Ex.: Alex Smith">
      </div>
    </div>

    <div class="field">
      <label class="label has-text-light">E-mail</label>
      <div class="control">
        <input class="input" id="email" v-model="campos.email" type="text" name="email" placeholder="Ex.: alex@google.com">
      </div>
    </div>

    <div class="field">
      <label class="label has-text-light">Assunto</label>
      <div class="control">
        <input class="input" id="assunto" v-model="campos.assunto" type="text" name="assunto" placeholder="Ex.: Contato">
      </div>
    </div>

    <div class="field">
      <label class="label has-text-light">Seção</label>
      <div class="select">
        <select id="secao" v-model="campos.secao" name="secao">
          <option>Dúvidas</option>
          <option>Sugestões</option>
          <option>Serviços</option>
        </select>
      </div>
    </div>
  
    <div class="field">
      <label class="label has-text-light">Mensagem</label>
      <textarea class="textarea" id="mensagem" v-model="campos.mensagem" name="mensagem" placeholder="Ex.: Olá"></textarea>
    </div>
  
    <div class="field">
      <input class="button is-success" type="submit" value="Enviar">
    </div>
  </form>
  <article class="message is-success" v-else>
    <div class="message-header">
      <p>Sucesso</p>
    </div>
    <div class="message-body">
      E-mail enviado com sucesso!
    </div>
  </article>
</template>
<script>
import axios from 'axios'

export default {
  name: "Formulario",
  data() {
    return {
      sended: false,
      errors: [],
      campos: { nome: null, email: null, secao: null, assunto: null, mensagem: null }
    }
  },
  methods: {
    checkForm: function (e) {
      e.preventDefault()

      if (this.campos.nome && this.campos.email && this.campos.assunto && this.campos.mensagem) {
        axios.post('/php/mail.php', this.campos).then(response => {
          if (response.data.status === 0) {
            this.sended = true
          } else {
            this.errors.push(response.data.mensagem)
          }
        }).catch(error => {
          if (error.response.status === 422 || error.response.status === 404) {
            this.errors.push(error.response.statusText)
            //this.errors = error.response.statusText || {};
          }
        });
      }
      
      this.errors = [];

      if (!this.campos.nome)
        this.errors.push('O nome é obrigatório.')      

      if (!this.campos.email)
        this.errors.push('O email é obrigatório.')

      if (!this.campos.assunto)
        this.errors.push('O assunto é obrigatório.')

      if (!this.campos.mensagem)
        this.errors.push('A mensagem é obrigatória.')
    }
  }
}
</script>