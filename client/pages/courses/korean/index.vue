<template>
  <div>
    <div class="korean">
      <div class="course course_type_korean">
        <p class="course__description">
          &nbsp;&nbsp;&nbsp;&nbsp;Корейский является 17-м наиболее распространенным языком в мире (около 80 миллионов носителей языка).
          Если вы хотите поехать в Корею или там учиться, работать или заниматься бизнесом, Вам следует изучить корейский язык.
          <br>
          &nbsp;&nbsp;&nbsp;&nbsp;<span class="dedicated-text">Наш центр предлагает курсы корейского языка</span> для любого возраста.
          Мы организуем обучение под Вас, что позволит Вам изучить язык с разным уклоном на грамматику, лексику, чтение, деловую лексику, разговорный.
          <br>&nbsp;&nbsp;&nbsp;&nbsp;Курс ведёт сертифицированный специалист, имеющий опыт работы в Южной Корее.
        </p>
        <div class="course__info">
          <div class="course__summary-info">
            <div class="course__additional-info">
              <img src="/img/group.png" alt="group img">
              <h3>Индивидуальные занятия</h3>
              <p>Занятия проводятся индивидуально с каждым учеником.</p>
            </div>
            <div class="course__price-info">
              <img src="/img/price.png" alt="price img">
              <h3>Стоимость</h3>
              <p>Стоимость <span class="dedicated-text">1-го занятия – 600 рублей</span></p>
            </div>
            <div class="course__duration-info">
              <img src="/img/clock.png" alt="clock img">
              <h3>Продолжительность</h3>
              <p>Продолжительность занятия <br> <span class="dedicated-text">1 час.</span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <EnrollButton/>
  </div>
</template>

<script>
  import EnrollButton from "../../../components/EnrollButton";

  export default {
    head: {
      title: 'Курсы корейского языка г. Артём. Учебный центр Галилео',
      meta: [
        {
          hid:     'description',
          name:    'description',
          content: 'Наш центр предлагает курсы корейского языкадля любого возраста. Мы организуем обучение под Вас, что позволит Вам изучить язык с разным уклоном на грамматику, лексику, чтение, деловую лексику, разговорный. Курс ведёт сертифицированный специалист, имеющий опыт работы в Южной Корее'
        }
      ],
    },
    name:       "Course",
    components: {EnrollButton},
  }
</script>

<style lang="scss">
  @import '~assets/scss/mixins';

  .dedicated-text {
    font-weight: bold;
    color:       red;
  }

  .course {
    &__bonuses {
      margin-top: -45px;
      text-align: center;

      @include respond-to(phone) {
        margin-top: 20px;
      }
    }

    &__bonuses-item {
      display:        inline-block;
      margin:         0 20px 20px;
      width:          200px;
      vertical-align: top;

      @include respond-to(phone) {
        font-size: 11px;
        width:     100px;
      }
    }

    &__bonuses-item-image {
      text-align: center;

      img {
        border:        2px solid black;
        border-radius: 40px;
      }
    }

    &__bonuses-item-title {
      font-weight: bold;
    }

    &__bonuses-line {
      margin: 20px 140px;

      @include respond-to(phone) {
        margin: 20px;
      }
    }

    &__description {
      max-width: 900px;
      padding:   20px;
      margin:    auto;
      font-size: 22px;
    }


    &__program-title {
      text-align:    center;
      font-size:     25px;
      margin-bottom: 15px;
    }

    &__program {
      display:     flex;
      min-height:  600px;
      color:       white;
      background:  linear-gradient(to right, #239B2C, #D26060);
      font-weight: bold;

      h1 {
        text-align:    center;
        font-size:     25px;
        margin-bottom: 40px;
      }

      @include respond-to(phone) {
        flex-wrap: wrap;
      }
    }

    &__program-arrow {
      display:     inline-block;
      width:       20%;
      padding-top: 200px;

      @include respond-to(phone) {
        display: none;
      }

      img {
        width: 100%;
      }
    }

    &__plan {
      margin-top: 20px;
    }

    &__plan-item {
      padding:          20px;
      background-color: white;
      color:            black;
      border-radius:    8px;
      font-weight:      bold;
      margin:           10px 0;
    }

    &__summary-info {
      padding:    50px;
      text-align: center;

      @include respond-to(phone) {
        padding: 10px;
      }

      > div {
        display:        inline-block;
        vertical-align: top;
        width:          300px;
        margin:         10px 15px;
      }
    }
  }
</style>
