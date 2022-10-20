<template>
    <div class="container">
        <div class="wrap cont">
            <article class="body">
                <!-- **큐레이션** -->
                <div class="mypagecuration_detail khmypage">
                    <h3 class="title">
                        큐레이션
                    </h3>
                    <form action="" @submit.prevent="filter">

                        <div class="curationarea">
                            <div class="curation_top" v-if="auth && auth.id == user.id">
                                <ul class="curation_menu">
                                    <li class="curation_edit">
                                        <a href="#" @click.prevent="editMode = !editMode" :style="`color:${usingTemplate.color}; background-color:${usingTemplate.background_color}`">
                                            편집하기 <i class="xi-pen-o"></i>
                                        </a>
                                        <ul class="curation_edit_detail" v-if="editMode">
                                            <li class="curation_del">
                                                <a href="#" @click.prevent="destroy">삭제</a>
                                            </li>
                                            <li>
                                                <a href="#" @click.prevent="editMode = false">완료</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="curation_temp">
                                        <a href="#"  @click.prevent="activeTemplatePop = true" :style="`color:${usingTemplate.color}; background-color:${usingTemplate.background_color}`">
                                            템플릿 선택 <i class="xi-border-all"></i>
                                        </a>
                                    </li>
                                    <li class="curation_share box-socials-wrap">
                                        <a href="#" @click.prevent="activeSharePop = true;" :style="`color:${usingTemplate.color}; background-color:${usingTemplate.background_color}`">
                                            공유하기 <i class="xi-upload"></i>
                                        </a>
                                        <share v-if="activeSharePop" :path="`/mypage/more/my_curation.html?curation_id=${curation.id}`" @close="activeSharePop = false"/>
                                    </li>
                                </ul>
                            </div>

                            <ul class="curation_detail_list">
                                <li v-for="newspaper in newspapers.data" :key="newspaper.id">
                                    <a :href="newspaper.url" target="_blank" class="curation_box">
                                        <label :for="newspaper.id" v-if="editMode">
                                            <input type="checkbox" :id="newspaper.id" :value="newspaper.id" v-model="form.selected_ids">
                                            <span class="check_icon"><i class="xi-check"></i></span>
                                        </label>
                                        <div class="img_box">
                                            <img :src="newspaper.img_url" class="thumb_g" alt="">
                                        </div>
                                        <div class="txt">
                                            <div class="s-tit">{{ newspaper.created_at }}</div>
                                            <h2 class="tit">{{ newspaper.title }}</h2>
<!--                                            <span class="byline">5시간 전</span>-->
                                            <span class="lead">
                                                {{newspaper.description}}
                                            </span>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                        </div>

                        <div class="search_box">
                            <input type="text" placeholder="큐레이션 텍스트를 입력하세요." v-model="form.word">
                            <button type="submit" class="search_btn">
                                <i class="xi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <!--// **큐레이션** -->

                <div class="kh_popup" v-if="activeTemplatePop">
                    <div class="popup_box temp">
                        <p class="popup_title">
                            모든 템플릿
                        </p>
                        <div class="m-empty type01" v-if="templates.data.length === 0" style="padding:60px; text-align: center; border:1px solid #e1e1e1; margin-bottom:20px;">
                            등록된 템플릿이 없습니다.
                        </div>
                        <div class="popup_con" v-else>
                            <ul class="temp_list">
                                <li class="temp_grade_1" v-for="template in templates.data" :key="template.id">
                                    <label :for="'template' + template.id">
                                        <div class="temp_grade">
                                            <p>
                                                <span>{{template.level_required}}</span>Lv
                                            </p>
                                            <span class="badge">
                                                <img :src="template.img_badge ? template.img_badge.url : ''" alt="">
                                            </span>
                                        </div>
                                        <div class="temp_obj" :style="template.img_background ? `background:url('${template.img_background.url}'); background-size:cover; background-position:center;` : ''">
                                            <div class="temp_select">
                                                <input type="radio" :id="'template' + template.id" :value="template.id" name="temp_default" v-model="form.template_id" v-if="user.level < template.level_required" disabled>
                                                <input type="radio" :id="'template' + template.id" :value="template.id" name="temp_default" v-model="form.template_id" v-else>
                                                <span class="select_icon non_select" v-if="user.level < template.level_required"><i class="xi-lock"></i></span>
                                                <span class="select_icon" v-else><i class="xi-check"></i></span>
                                            </div>
                                            <p class="temp_txt" :style="`color:${template.color ? template.color : ''}; background-color:${template.background_color ? template.background_color : ''}; `">
                                                텍스트 컬러
                                            </p>
                                        </div>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <!--
                        <p class="popup_title">
                            모든 템플릿
                        </p>
                        <div class="popup_con">
                            <ul class="temp_list">

                                <li class="temp_grade_9">
                                    <label for="temp_9">
                                        <div class="temp_grade">
                                            <p>
                                                <span>9</span>Lv
                                            </p>
                                            <span class="badge"></span>
                                        </div>
                                        <div class="temp_obj">
                                            <div class="temp_select">
                                                <input type="radio" id="temp_9" name="temp_select" disabled>
                                                <span class="select_icon"><i class="xi-check"></i></span>
                                                <span class="select_icon non_select"><i class="xi-lock"></i>
                                        </span>
                                            </div>
                                            <p class="temp_txt">
                                                텍스트 컬러
                                            </p>
                                        </div>
                                    </label>
                                </li>
                                <li class="temp_grade_10">
                                    <label for="temp_10">
                                        <div class="temp_grade">
                                            <p>
                                                <span>10</span>Lv
                                            </p>
                                            <span class="badge"></span>
                                        </div>
                                        <div class="temp_obj">
                                            <div class="temp_select">
                                                <input type="radio" id="temp_10" name="temp_select" disabled>
                                                <span class="select_icon">
                                            <i class="xi-check"></i>
                                        </span>
                                                <span class="select_icon non_select"> &lt;!&ndash; 템플릿 잠금 &ndash;&gt;
                                            <i class="xi-lock"></i>
                                        </span>
                                            </div>
                                            <p class="temp_txt">
                                                텍스트 컬러
                                            </p>
                                        </div>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        -->
                        <div class="btn_wrap">
                            <button type="button" class="popup_btn cancel" @click="activeTemplatePop = false">취소</button>
                            <button type="button" class="popup_btn" @click="updateTemplate">저장하기</button>
                        </div>
                    </div>
                </div>

            </article>
        </div>

        <div class="template-base" :style="`background:url('${user.template.img_background ? user.template.img_background.url : ''}'); background-size:cover; background-position:center;`"></div>

        <!-- // wrap cont -->
    </div>
</template>
<script>
import {Link} from '@inertiajs/inertia-vue';
import Pagination from "../../Components/Pagination";
import Share from "../../Components/Share";

export default {
    components: {Share, Link, Pagination},
    data() {
        return {
            auth: this.$page.props.user ? this.$page.props.user.data : "",
            curation: this.$page.props.curation.data,
            templates: this.$page.props.templates,
            newspapers: this.$page.props.newspapers,
            usingTemplate: this.$page.props.curation.data.user.template,
            user: this.$page.props.curation.data.user,
            form: this.$inertia.form({
                page: 1,
                word: "",
                selected_ids: [],
                template_id: this.$page.props.curation.data.user.template.id
            }),
            editMode: false,
            activeTemplatePop: false,
            activeSharePop: false,
        }
    },
    methods: {
        filter() {
            this.form.get("/curations/" + this.curation.id, {
                preserveState: true,
                preserveScroll: true,
                onSuccess: (page) => {
                    this.newspapers = page.props.newspapers;
                }
            });
        },

        next(newspaper){
            this.form.patch(`/newspapers/${newspaper.id}/next`, {
                preserveScroll: true,
                preserveState: true,
                onSuccess: (page) => {
                    this.newspapers = page.props.newspapers;
                }
            })
        },

        prev(newspaper){
            this.form.patch(`/newspapers/${newspaper.id}/prev`, {
                preserveScroll: true,
                preserveState: true,
                onSuccess: (page) => {
                    this.newspapers = page.props.newspapers;
                }
            })
        },

        destroy(){
            if(this.form.selected_ids.length === 0)
                return alert('최소 1개 이상 선택해주세요.');

            this.form.delete("/newspapers", {
                preserveScroll: true,
                preserveState: true,
                onSuccess: (page) => {
                    this.newspapers = page.props.newspapers;
                    this.form.selected_ids = [];
                }
            })
        },

        updateTemplate(){
            this.form.patch("/users/template", {
                preserveScroll: true,
                preserveState: true,
                onSuccess: (page) => {
                    this.activeTemplatePop = false;

                    this.user = page.props.user.data;
                    this.usingTemplate = page.props.user.data.template;
                }
            })
        }
    },

    mounted() {

    }
}
</script>
