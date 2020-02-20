<template>
  <div class="add-opinion-form">
    <v-alert style="font-weight: bold" v-model="isFormSent" type="success">
      Ваш отзыв был отправлен и вскоре будет опубликован
    </v-alert>

    <div v-if="false === isFormSent">
      <div v-if="false === showForm" class="text-xs-center">
        <v-btn class="green lighten-2 mt-5 add-opinion-form__button" dark large @click="onShowForm">
          Написать отзыв
        </v-btn>
      </div>

      <v-form class="add-opinion-form__form" v-else v-model="isValid">
        <v-container>
          <h1>Оставьте свой отзыв</h1>
          <v-layout>
            <v-flex xs12>
              <v-text-field v-model="name" label="Ваше имя" :rules="nameRules" required></v-text-field>
            </v-flex>
          </v-layout>
          <v-layout>
            <v-flex xs12>
              <v-textarea v-model="content" label="Отзыв" hint="Введите текст" :rules="contentRules"></v-textarea>
            </v-flex>
          </v-layout>
          <div class="text-xs-center">
            <v-btn :disabled="!isValid" class="enroll-button" color="success" v-on:click="onSubmitForm">
              Оставить отзыв
            </v-btn>
          </div>
        </v-container>
      </v-form>
    </div>
  </div>
</template>

<script>
  import {ApiService} from "../common/api-service";

  export default {
    name:    "AddOpinionForm",
    data() {
      return {
        showForm:     false,
        isValid:      false,
        name:         '',
        content:      '',
        nameRules:    [
          v => !!v || 'Введите ваше имя',
        ],
        contentRules: [
          v => !!v || 'Поле с отзывом не должно быть пустым',
        ],
        isFormSent:   false,
      }
    },
    methods: {
      onShowForm:   function() {
        this.showForm = true;
      },
      onSubmitForm: function() {
        ApiService.sendOpinion(this.name, this.content)
        .then(() => {
          this.isFormSent = true;
        })
        ;
      }
    },
  }
</script>

<style lang="scss" scoped>
  .add-opinion-form {
    width:       60%;
    margin:      auto;
    padding-top: 40px;

    &__form {
      background-color:   #FFF;
      border-radius:      8px;
      -webkit-box-shadow: 0 4px 31px -2px rgba(0, 0, 0, 0.66);
      -moz-box-shadow:    0 4px 31px -2px rgba(0, 0, 0, 0.66);
      box-shadow:         0 4px 31px -2px rgba(0, 0, 0, 0.66);
      transition:         box-shadow 0.3s ease-in-out;
    }

    &__button {
      color:       #FFF;
      font-weight: bold;
    }
  }
</style>
