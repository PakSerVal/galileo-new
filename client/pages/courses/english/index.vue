<template>
  <div>
    <div class="english">
      <div class="course course_type_korean">
        <div class="course__description">
          &nbsp;&nbsp;&nbsp;&nbsp;С каждым годом повышается роль английского языка в современном мире. И чтобы лучше овладеть навыками в его обучении, лучше начать его изучение с младшего дошкольного возраста. <span class="dedicated-text">И наш центр даёт вам такую возможность!</span>
          <br>
          <br>
          &nbsp;&nbsp;&nbsp;&nbsp;<h3>План обучения:</h3>
          <ul>
            <li><span class="dedicated-text">1-я ступень</span> обучения английского для детей-дошкольников 3-4 лет, где дети учатся слышать и воспринимать английскую речь на слух. Целью занятий является восприятие английского языка на слух, понимание и использование в своей речи английских слов и фраз.</li>
            <li><span class="dedicated-text">2-я ступень</span> обучения английского для детей 5-7 лет. Дети полностью погружаются в языковую среду. Играют, поют и общаются на занятиях на английском языке.</li>
            <li><span class="dedicated-text">3-я ступень</span> обучения английского для детей 6-10 лет. Если ваш ребенок закончил 1-4 классы начальной школы, но имеет пробелы в обучении, мы поможем решить эту проблему.</li>
          </ul>
        </div>
        <div class="course__info">
          <div class="course__summary-info">
            <div class="course__additional-info">
              <img src="/img/group.png" alt="group img">
              <h3>Индивидуальные или групповые занятия</h3>
              <p>Занятия проводятся как в малых группах, так и индивидуально с каждым учеником.</p>
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
      title: 'Курсы английского языка г. Артём Учебный центр Галилео',
      meta: [
        {
          hid: 'description',
          name: 'description',
          content: 'Обучения английского для детей-дошкольников 3-4 лет, где дети учатся слышать и воспринимать английскую речь на слух. Целью занятий является восприятие английского языка на слух, понимание и использование в своей речи английских слов и фраз.'
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
