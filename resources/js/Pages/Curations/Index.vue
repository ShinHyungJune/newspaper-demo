<template>
    <div class="container">
        <div class="wrap cont">
            <article class="body">

                <!-- **큐레이션** -->
                <div class="mypagecuration khmypage">
                    <h3 class="title">
                        큐레이션
                    </h3>
                    <form action="" @submit.prevent="filter">
                        <div class="search_box">
                            <input type="text" placeholder="기사 제목으로 검색하세요." v-model="form.word">
                            <button type="submit" class="search_btn">
                                <i class="xi-search"></i>
                            </button>
                        </div>
                    </form>

                    <div class="curationarea">
                        <div class="curation_top">
                            <p class="curation_total">
                                총 <span>{{countTotal}}</span> 건의 기사 큐레이션 저장
                            </p>

                            <ul class="curation_menu">
                                <li class="curation_edit">
                                    <a href="#" @click.prevent="editMode = !editMode">
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
                            </ul>
                        </div>

                        <div class="info_list_area" v-if="items.data.length === 0">
                            <p class="hl">
                                아직 생성된 큐레이션이 없습니다. <br>
                                큐레이션을 만들고 기사를 저장해 보세요!
                            </p>
                        </div>

                        <ul class="curation_list" v-if="!editMode">
                            <li v-for="item in items.data" :key="item.id">
                                <a :href="`/curations/${item.id}`" class="curation_box">
                                    <div class="img_box">
                                        <img :src="item.img_url" class="thumb_g" alt="">
                                    </div>
                                    <p class="curation_title">{{item.title}}</p>
                                </a>
                            </li>

                            <li class="curation_add" @click="active = true;">
                                <p>
                                    <i class="xi-plus"></i>
                                    큐레이션 만들기
                                </p>
                            </li>
                        </ul>

                        <ul class="curation_list edit" v-else>
                            <li v-for="item in items.data" :key="item.id">
                                <div class="curation_select">
                                    <label :for="item.id">
                                        <input type="checkbox" :value="item.id" :id="item.id" name="curation_select" v-model="form.selected_ids">
                                        <span class="select_icon"><i class="xi-check"></i></span>
                                    </label>
                                </div>
                                <div class="curation_box">
                                    <div class="img_box">
                                        <img :src="item.img_url" class="thumb_g" alt="">
                                    </div>
                                    <p class="curation_title">{{item.title}}</p>
                                    <!--
                                    <input type="text" placeholder="문화 예술 모음">
                                    -->
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--// **큐레이션** -->

                <!-- 큐레이션 생성 -->
                <div class="kh_popup" v-if="active">
                    <div class="popup_box">
                        <p class="popup_title">
                            큐레이션 만들기
                        </p>
                        <div class="popup_con">
                            <input type="text" placeholder="제목을 입력해주세요." v-model="form.title">
                        </div>
                        <div class="btn_wrap">
                            <button type="button" class="popup_btn cancel" @click="active = false;">취소</button>
                            <button type="button" class="popup_btn" @click="store">만들기</button>
                        </div>
                    </div>
                </div>
                <!-- // 큐레이션 생성 -->
            </article>
        </div>
    </div>
</template>
<script>
import {Link} from '@inertiajs/inertia-vue';
import Pagination from "../../Components/Pagination";

export default {
    components: {Link, Pagination},
    data() {
        return {
            items: this.$page.props.items,
            countTotal: this.$page.props.countTotal,
            form: this.$inertia.form({
                page: 1,
                title: "",
                word: "",
                selected_ids: []
            }),
            active: false,
            editMode: false,
        }
    },
    methods: {
        filter() {
            this.form.get("/curations", {
                preserveState: true,
                preserveScroll: true,
                onSuccess: (page) => {
                    this.items = page.props.items;
                }
            });
        },
        store() {
            this.form.post("/curations", {
                preserveState: true,
                preserveScroll: true,

                onSuccess: (page) => {
                    this.items = page.props.items;

                    this.form.title = "";
                    this.form.selected_ids = [];
                }
            });

            this.active = false;
        },
        destroy(){
            if(this.form.selected_ids.length === 0)
                return alert('최소 1개 이상 선택해주세요.');

            this.form.delete("/curations", {
                preserveScroll: true,
                preserveState: true,
                onSuccess: (page) => {
                    this.items = page.props.items;

                    this.form.title = "";
                    this.form.selected_ids = [];
                }
            })
        }
    },

    mounted() {

    }
}
</script>
