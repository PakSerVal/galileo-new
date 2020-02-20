<template>
  <div class="courses">
    <h1 class="courses__title">Наши курсы</h1>
    <div class="courses__wrap">
      <div class="courses__item">
        <v-card v-on:click="() => onCourseSelect('podgotovka-k-ege')">
          <v-img src="/img/galileo/ege.jpg" height="auto"></v-img>
          <v-card-title primary-title class="courses__item-title">
            <div>
              <div class="headline">Подготовка к ЕГЭ и ОГЭ</div>
              <span class="grey--text">Комплексная подготовка к ЕГЭ и ОГЭ по всем предметам школьной программы</span>
            </div>
          </v-card-title>
          <v-card-actions class="courses__item-buttons">
            <v-btn flat color="purple" v-on:click="() => onCourseSelect('podgotovka-k-ege')">Подробнее</v-btn>
          </v-card-actions>
        </v-card>
      </div>
      <div class="courses__item">
        <v-card v-on:click="() => onCourseSelect('english')">
          <v-img src="/img/galileo/english.jpg" height="auto"></v-img>
          <v-card-title primary-title class="courses__item-title">
            <div>
              <div class="headline">Курсы английского языка</div>
              <span class="grey--text">Курсы английского языка для всех возрастов и уровней</span>
            </div>
          </v-card-title>
          <v-card-actions class="courses__item-buttons">
            <v-btn flat color="purple" v-on:click="() => onCourseSelect('english')">Подробнее</v-btn>
          </v-card-actions>
        </v-card>
      </div>
      <div class="courses__item">
        <v-card v-on:click="() => onCourseSelect('korean')">
          <v-img src="/img/galileo/korean.jpg" height="auto"></v-img>
          <v-card-title primary-title class="courses__item-title">
            <div>
              <div class="headline">Курсы корейского языка</div>
              <span class="grey--text">Курсы корейского языка от сертифицированного специалиста</span>
            </div>
          </v-card-title>
          <v-card-actions class="courses__item-buttons">
            <v-btn flat color="purple" v-on:click="() => onCourseSelect('korean')">Подробнее</v-btn>
          </v-card-actions>
        </v-card>
      </div>
    </div>
    <div class="courses__enroll-btn">
      <EnrollButton/>
    </div>
  </div>
</template>

<script>
  import EnrollButton from "./EnrollButton";

  export default {
    name:       "CoursesList",
    components: {EnrollButton},
    methods: {
      onCourseSelect: function(url) {
        this.$router.push({path: '/courses/' + url})
      }
    }
  }
</script>

<style lang="scss" scoped>
  .courses {
    &__title {
      width:      100%;
      text-align: center;
      margin:     15px 0;
    }

    &__wrap {
      width:           100%;
      display:         flex;
      flex-wrap:       wrap;
      justify-content: center;
    }

    &__item {
      width:  300px;
      margin: 10px 20px 0;
      cursor: pointer;
      height: auto;

      & > div {
        height: 100%;
      }

      &-title {
        padding-bottom: 52px;
      }

      &-buttons {
        position: absolute;
        top:      calc(100% - 52px);
      }

      &:hover {
        -webkit-box-shadow: 0 4px 31px -2px rgba(0, 0, 0, 0.66);
        -moz-box-shadow:    0 4px 31px -2px rgba(0, 0, 0, 0.66);
        box-shadow:         0 4px 31px -2px rgba(0, 0, 0, 0.66);
        transition:         box-shadow 0.3s ease-in-out;
      }
    }

    &__enroll-btn {
      margin-top: 20px;
    }
  }
</style>
