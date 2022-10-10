<template>
    <div class="container">
        <div class="wrap cont">
            <article class="body">
                <!-- **퀴즈내역** -->
                <div class="mypagequiz khmypage">
                    <h3 class="title">
                        퀴즈내역
                    </h3>
                    <form action="" @click.prevent="filter">
                        <div class="search_box">
                            <input type="text" placeholder="퀴즈 제목으로 검색하세요." v-model="form.word">
                            <button type="submit" class="search_btn">
                                <i class="xi-search"></i>
                            </button>
                        </div>
                    </form>

                    <div class="quizarea">
                        <ul class="quizmenu mypagetab">
                            <li :class="form.correct === '' ? 'active' : ''" @click="form.correct = ''; filter()">
                                전체 <span>{{ countTotal }}</span>
                                <i class="xi-angle-down"></i>
                            </li>
                            <li :class="form.correct === 1 || form.correct === '1' ? 'active' : ''" @click="form.correct = 1; filter()">
                                맞춘 퀴즈 <span>{{ countCorrect }}</span>
                                <i class="xi-angle-down"></i>
                            </li>
                            <li :class="form.correct === 0 || form.correct === '0' ? 'active' : ''" @click="form.correct = 0; filter()">
                                틀린 퀴즈 <span>{{ countIncorrect }}</span>
                                <i class="xi-angle-down"></i>
                            </li>
                        </ul>

                        <div class="quizlist_wrap tab_content active" id="quizmenu_1">
                            <div class="info_list_area" v-if="items.data.length === 0">
                                <p class="hl">
                                    아직 퀴즈 내역이 없습니다. <br>
                                    오늘의 퀴즈 페이지에서 퀴즈를 풀어보세요!
                                </p>
                            </div>

                            <ul class="quizlist">
                                <li v-for="item in items.data" :key="item.id">
                                    <div class="quiz_q">
                                        <p>
                                            Q.
                                            <span>{{ item.title }}</span>
                                        </p>
                                        <a href="" @click.prevent="active">해설보기</a>
                                    </div>
                                    <div class="quiz_a">
                                        <ul class="quiz_a_top">
                                            <li>
                                                <p>정답률 : <span>{{ item.ratio_correct }}</span>%</p>
                                            </li>
                                            <li>
                                                <p>총 획득 경험치 : <span>{{ item.answer.point }}</span></p>
                                            </li>
                                        </ul>
                                        <div class="quiz_a_main">
                                            <div class="quiz_state">
                                                <p class="wrong" v-if="item.answer.point === 0 || item.answer.point === '0'">오답입니다. 다음 문제에 도전해보세요.</p>
                                                <p class="correct" v-else>정답입니다!  경험치 +<span>{{item.answer.point}}</span> 를 획득하셨습니다!</p>
                                            </div>
                                            <ul class="quiz_obj">
                                                <li :class="optionClass(option)" v-for="option in item.options" :key="option.id">
                                                    <label for="quiz_obj_1">
                                                        <input type="radio" id="quiz_obj_1" name="quiz_obj_1" checked disabled>
                                                        <div class="col-group">
                                                            <p>
                                                                {{ option.title }}
                                                            </p>

                                                            <div class="check_icon">
                                                                <span class="correct">
                                                                    <i class="xi-check"></i>
                                                                </span>
                                                                <!-- <span class="wrong">
                                                                    <i class="xi-close"></i>
                                                                </span> -->
                                                            </div>
                                                        </div>
                                                    </label>
                                                </li>
                                            </ul>
                                            <div class="btn_wrap">
                                                <a href="">공유하기</a>
                                            </div>
                                            <div class="quiz_btm">
                                                <p>관련 기사 보러가기 <i class="xi-arrow-right"></i></p>
                                                <a :href="item.url" target="_blank">기사 제목</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <pagination :meta="items.meta" @paginate="(page) => {form.page = page; filter()}" />


                        </div>
                    </div>
                </div>
                <!--// **퀴즈내역** -->

            </article>
        </div>
        <!-- // wrap cont -->
    </div>
</template>
<script>
import {Link} from '@inertiajs/inertia-vue';
import Pagination from "../../Components/Pagination";

export default {
    components: {Link, Pagination},
    data(){
        return {
            items: this.$page.props.items,
            countTotal : this.$page.props.countTotal,
            countCorrect : this.$page.props.countCorrect,
            countIncorrect : this.$page.props.countIncorrect,
            countTotalPoint : this.$page.props.countTotalPoint,
            form: this.$inertia.form({
                page: 1,
                word: "",
                correct: this.$page.props.correct
            }),
        }
    },
    methods:{
        filter(){
            this.form.get("/questions", {
                preserveScroll: true,
                preseveState: true,
                onSuccess: (page) => {
                    this.items = page.props.items;
                }
            });
        },

        store(){
            this.form.post("/questions", {
                preserveScroll: true,
                preseveState: true,
                onSuccess: (page) => {
                    this.items = page.props.items;
                }
            });
        },
    },

    mounted() {

    }
}
</script>
