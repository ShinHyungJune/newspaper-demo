<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/common.css">
    <link rel="stylesheet" type="text/css" href="/css/popup.css">
    <script src="/js/jquery.js"></script>
</head>
<style>
    * {font-size:28px !important;}
</style>
<body>

<div>
    <div class="fx_topbar">
        <div class="btn_all">
            <a href="javascript:menu_box_abtn()" title="전체 메뉴 열기">
                <span class="all_txt">전체</span>
            </a>
        </div>
        <div class="search">
                        <span class="search_btn open">
                            <a href="javascript:;" title="검색창 열기" onclick="return false;" id="main_top_search_open">검색창 열기</a>
                        </span>
            <span class="search_btn close" style="display:none;">
                            <a href="/" title="검색창 닫기" onclick="return false;" id="main_top_search_close">검색창 닫기</a>
                        </span>
        </div>
        <div class="logo">
            <a href="https://www.khan.co.kr" title="경향신문">경향신문</a>
        </div>
        <ul class="gnb">
            <li><a href="https://www.khan.co.kr/politics" title="정치">정치</a></li>
        </ul>

        <div id="head_right_issue" class="r-issue" style="display: block;">
        </div>

        <div id="head_right_menu" class="fn_wrap" style="display: none;">
            <div class="fn-btn">
                <ul>


                    <li class="share">
                        <a href="#" title="공유하기">공유하기</a>

                        <div class="slt_sns_menu"><!-- 공유하기 버튼 클릭 시 .open 클래스를 부여하여 레이어를 활성화 -->
                            <ul class="area_sns_menu">
                                <li><a class="facebook" href="javascript:;" onclick="getShortUrl('https%3A%2F%2Fwww.khan.co.kr%2Fpolitics%2Fnorth-korea%2Farticle%2F202210101515021%3Futm_source%3Dfacebook%26utm_medium%3Dsocial_share', snsShare, this);" data-sns="facebook" data-text="‘친일이냐, 죽창가냐’···한·미·일 연합훈련 여야 쟁점은?">페이스북 공유하기</a></li>
                                <li><a class="twitter" href="javascript:;" onclick="getShortUrl('https%3A%2F%2Fwww.khan.co.kr%2Fpolitics%2Fnorth-korea%2Farticle%2F202210101515021%3Futm_source%3Dtwitter%26utm_medium%3Dsocial_share', snsShare, this);" data-sns="twitter" data-text="‘친일이냐, 죽창가냐’···한·미·일 연합훈련 여야 쟁점은?">트위터 공유하기</a></li>
                                <li><a class="kakaotalk" href="javascript:;" onclick="getShortUrl('https%3A%2F%2Fwww.khan.co.kr%2Fpolitics%2Fnorth-korea%2Farticle%2F202210101515021%3Futm_source%3Dkakaostory%26utm_medium%3Dsocial_share', snsShare, this);" data-sns="kakaostory" data-text="‘친일이냐, 죽창가냐’···한·미·일 연합훈련 여야 쟁점은?">카카오스토리 공유하기</a></li>
                                <li><a class="band" href="javascript:;" onclick="getShortUrl('https%3A%2F%2Fwww.khan.co.kr%2Fpolitics%2Fnorth-korea%2Farticle%2F202210101515021%3Futm_source%3Dnaver_band%26utm_medium%3Dsocial_share', snsShare, this);" data-sns="band" data-text="‘친일이냐, 죽창가냐’···한·미·일 연합훈련 여야 쟁점은?">밴드 공유하기</a></li>
                                <li><a class="nhnblog" href="javascript:;" onclick="getShortUrl('https%3A%2F%2Fwww.khan.co.kr%2Fpolitics%2Fnorth-korea%2Farticle%2F202210101515021%3Futm_source%3Dnaver_blog%26utm_medium%3Dsocial_share', snsShare, this);" data-sns="nblog" data-text="">네이버블로그 공유하기</a></li>
                                <li><a class="email" href="javascript:;" onclick="send_mail('202210101515021', 'khan', 'khan', 'https://www.khan.co.kr/politics/north-korea/article/202210101515021');">이메일로 공유하기</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="bookmark">
                        <a href="javascript:;" onclick="setbookmark(this);" title="북마크" data-art_id="202210101515021" data-bookmark_name="bookmark_khan" data-med_id="khan">북마크</a>
                    </li>
                    <li class="reply replyBalloon">
                        <a href="javascript:;" onclick="goPosReply();" title="댓글">댓글</a>
                        <span class="count">6</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="title" id="top_title" style="display: none;">
            <p>‘친일이냐, 죽창가냐’···한·미·일 연합훈련 여야 쟁점은?</p>
        </div>
    </div>

    <div class="art_header borderless">
        <div class="subject">

            <h1 id="article_title" class="headline">‘친일이냐, 죽창가냐’···한·미·일 연합훈련 여야 쟁점은?</h1>
        </div>

        <div class="function_wrap">
            <div class="art_info">
                <div class="byline">
                    <em>입력 : 2022.10.10 15:15</em>
                    <em>수정 : 2022.10.10 16:08</em>
                </div>

                <span class="author"><a href="https://www.khan.co.kr/reporter_article.html?id=535"
                                        title="김윤나영 기자의 다른 기사 보기(새창)" target="_blank">김윤나영 기자</a></span>
            </div>

        </div>
    </div>

    <div class="art_body" id="articleBody" itemprop="articleBody">
        <div class="art_photo photo_center">
            <div class="art_photo_wrap">
                <picture>
                    <source type="image/webp"
                            srcset="https://img.khan.co.kr/news/2022/10/10/news-p.v1.20221007.c983e65152ba432aa67453cd3c7d1dff_P1.webp"
                            loading="lazy">
                    <img width="500"
                         src="https://img.khan.co.kr/news/2022/10/10/news-p.v1.20221007.c983e65152ba432aa67453cd3c7d1dff_P1.png"
                         alt="한·미·일 대잠수함전 훈련에 참여한 전력들이 지난달 30일 동해 공해상에서 기동훈련을 하고 있다.  일본방위성 제공·연합뉴스">
                </picture>
                <p class="caption">한·미·일 대잠수함전 훈련에 참여한 전력들이 지난달 30일 동해 공해상에서 기동훈련을 하고 있다. 일본방위성 제공·연합뉴스</p>
            </div>
        </div>
        <p class="content_text text-l">여야가 지난달 30일 동해 공해상에서 이뤄진 한·미·일 연합훈련을 두고 ‘친일·반일 공방’으로 팽팽히 맞서고 있다. 이재명 더불어민주당
            대표는 10일 즉석 유튜브 방송에서 “욱일기가 다시 한반도에 걸리는 일이 실제로 생길 수 있다”고 대정부 공세를 강화했다. 국민의힘은 ‘반일 죽창가 선동’이라고 반격했다. 여야는 이번
            훈련 지역이 독도 인근인지, 문재인 정부가 한·미·일 연합훈련의 토대를 닦았는지, 한·일 군사동맹과 과거사 문제 해결 중 어느 것을 우선시해야 하는지를 두고 첨예하게 대립했다.</p>
        <!-- middle_title_start -->
        <div class="editor-middle-title"><p class="title">독도 인근이다 VS 일본에 가깝다</p></div><!-- middle_title_end --><p
                class="content_text text-l">여야는 한·미·일 동해상 훈련이 독도 인근에서 이뤄졌는지를 두고 공방을 벌였다. 국민의힘은 훈련이 일본 쪽에 더 가까운 곳에서 이뤄졌다고
            주장했다. 성일종 국민의힘 정책위의장은 지난 7일 국회에서 열린 당 국정감사대책회의에서 “북한이 자주 출몰하는 곳이 동해이기 때문에 동해에서 3국의 훈련이 진행되는 것”이라며 “한·미·일
            연합훈련도 독도로부터 185㎞, 일본 근해에서 120㎞ 떨어진 곳으로 모든 국제적인 잠수함이나 함정들이 다닐 수 있는 구역”이라고 말했다.</p>
        <p class="content_text text-l">민주당은 일본군이 욱일기를 달고 독도 인근 해역에서 해상훈련을 하는 것은 부적절하다고 주장했다. 박홍근 원내대표는 지난달 29일 국회에서
            열린 상임위원회간사단 연석회의에서 “예정된 훈련장소가 한국작전구역(KTO) 바깥이라 해도, 독도에서 불과 150여㎞ 떨어진 곳”이라고 했다. 이 대표는 10일 즉석 유튜브에서 “일본
            자위대가 계속 연달아서 한·일 합동군사훈련을, 그것도 독도 근처에서 하고 있다”며 “일본 우익과 집권 자민당이 자위대를 군대로 격상시키고 전쟁을 할 수 있는 보통 국가로 만들자는 게
            목표인데, 우리 입장에서는 이에 동의할 수 없다”고 말했다.</p><!-- middle_title_start -->
        <div class="editor-middle-title"><p class="title">문재인 정부가 원조 VS 독도 인근 연합훈련은 처음</p></div>
        <!-- middle_title_end --><p class="content_text text-l">여야는 한·일 군사협력의 시초를 두고도 다퉜다. 정진석 국민의힘 비상대책위원장은 지난 9일
            사회관계망서비스(SNS)에 “친일 국방의 기획자는 문재인 전 대통령”이라며 “한·미·일 3국 연합훈련은 문재인 정권 때인 2017년 10월 한·미·일 3국 국방부 장관의 필리핀 합의에 따라
            이뤄졌다”고 지적했다. 당시 한·미·일 국방부 장관은 북한의 핵과 미사일 위협에 대응해 “미사일 경보훈련과 대잠수함전 훈련을 지속적으로 실시하기로 했다”고 합의한 바 있다.</p>
        <p class="content_text text-l">정 위원장은 “노무현 대통령 시절인 2007년 9월 욱일기를 단 해상자위대 전투함이 인천항에 들어와 우리 해군 인천해역방어사령부와
            친선행사를 가졌다”고 덧붙였다. 성일종 의장은 7일 국정감사대책회의에서 “노무현, 문재인 정부에서도 한·미·일 군사훈련은 여러 차례 있었다”고 했다.</p>
        <div data-iwmads-id="1665389527312" class="iwmads is-loaded"
             style="width: 640px; display: none; z-index: 99; margin: 0px auto !important; max-height: 360px !important;">
            <div id="movie_overlay" class="" style="width: 640px; height: 360px; display: none;"></div>

        </div>

        <div id="dcamp_ad_11838" style="width: 100%; display: none;"><img
                    src="https://idm.skplanet.com/pixel?nid=29&amp;uid=ODU1NmYzMzU3ZDBkNjM0MDZhYjdiNjY5OGNlMTJiNGU="
                    width="0" height="0" style="display:none;"></div>
        <p class="content_text text-l">민주당은 동해에서 벌어진 한·미·일 군사훈련은 전례가 없다고 반박했다. 김의겸 민주당 대변인은 10일 브리핑에서 “과거 군사훈련을 동해에서
            한 적이 한 번도 없었다. 멀리 하와이나 일본 요코스카 서남방이었고, 한반도 주변이라 하더라도 제주도 남쪽 먼 바다였다”고 밝혔다. 이번 훈련 전 박근혜 정부 시절이던 2017년 4월
            마지막으로 실시한 한·미·일 연합 해상훈련도 동해가 아닌 제주 인근에서 했다는 것이다. 김 대변인은 “2007년 참여정부 때 해경과의 훈련을 언급한 것은 무지에서 나오는 거짓”이라며
            “실종자 구조를 위한 경찰의 훈련을 군사훈련에 비교한 것”이라고 했다.</p><!-- middle_title_start -->
        <div class="editor-middle-title"><p class="title">북핵 위협 대응 VS 과거사 문제 해결</p></div><!-- middle_title_end --><p
                class="content_text text-l">국민의힘은 북핵 위협에 대비한 한·미·일 군사 공조를 강조하면서 ‘친북·반미’ 프레임으로 민주당을 공격했다. 정 위원장은 SNS에서 “북한
            김정은의 핵과 미사일 도발을 저지하기 위한 군사 훈련을 미국·일본과 하지, 그러면 중국·러시아랑 할까”라며 “친일 국방은 죽창가의 변주곡이자 반미투쟁으로 가는 전주곡”이라고 주장했다. 박정하
            수석대변인은 10일 논평에서 “지금은 한·미·일 굳건한 공조를 통해 북한을 압박하고, 북한이 협박을 통해선 그 무엇도 얻을 수 없음을 분명히 해야 한다”며 “그런데 민주당은 여전히 북한 대변인을
            자처하고 있다”고 비판했다.</p>
        <p class="content_text text-l">민주당은 과거사 문제 해결을 강조하며 ‘친일’ 프레임으로 맞섰다. 이 대표는 이날 “일본이 우리나라를 무력 지배했고 그 침략의 역사를
            진정으로 사과하지 않고, 심지어 독도를 자기 땅이라고 도발하고 최근에는 경제 침략까지 했는데, 이런 상황에서 일본 자위대와 한국군이 실전 합동훈련을 한다? 우리는 욱일기가 다시 한반도에
            걸리는 날을 상상할 수 없지만, 그런 일이 실제로 생길 수 있다”고 주장했다. 이 대표는 “한·미·일 군사동맹을 맺으면 우리나라가 완전히 한·미·일, 북·중·러 군사동맹체들의 전초기지가
            된다”며 “이러면 다시 한반도 냉전, 열전이 벌어질 수도 있다”며 한·미·일 군사동맹 강화에도 반대했다.</p><!-- AD. 기사면 본문 배너 (250x250) -->

    </div>

    <div class="share-fn-wrap">
        <div class="fn-btn">
            <ul>
                <li class="clapping">
                    <a href="javascript:;" onclick="set_like_article(this);" data-art_id="202210101527001" data-sec_id="910100" data-med_id="khan" data-uniqid="6343e1f3d3fae" data-function_name="set_like" title="박수치기">박수치기</a>
                    <span id="like_cnt" class="count">2</span>
                </li>
                <li class="reply replyBalloon">
                    <a href="javascript:;" onclick="goPosReply();">댓글</a>
                    <span class="count">54</span>
                </li>
                <li class="share">
                    <a href="javascript:;" title="공유하기">공유하기</a>

                    <div class="slt_sns_menu"><!-- 공유하기 버튼 클릭 시 .open 클래스를 부여하여 레이어를 활성화 -->
                        <ul class="area_sns_menu">
                            <li><a class="facebook" href="javascript:;" onclick="getShortUrl('https%3A%2F%2Fwww.khan.co.kr%2Fpolitics%2Fpolitics-general%2Farticle%2F202210101527001%3Futm_source%3Dfacebook%26utm_medium%3Dsocial_share', snsShare, this);" data-sns="facebook" data-text="윤 대통령 집무실 동측에 새 진입로 건설 중···야당 “도어스테핑 회피용”">페이스북 공유하기</a></li>
                            <li><a class="twitter" href="javascript:;" onclick="getShortUrl('https%3A%2F%2Fwww.khan.co.kr%2Fpolitics%2Fpolitics-general%2Farticle%2F202210101527001%3Futm_source%3Dtwitter%26utm_medium%3Dsocial_share', snsShare, this);" data-sns="twitter" data-text="윤 대통령 집무실 동측에 새 진입로 건설 중···야당 “도어스테핑 회피용”">트위터 공유하기</a></li>
                            <li><a class="kakaotalk" href="javascript:;" onclick="getShortUrl('https%3A%2F%2Fwww.khan.co.kr%2Fpolitics%2Fpolitics-general%2Farticle%2F202210101527001%3Futm_source%3Dkakaostory%26utm_medium%3Dsocial_share', snsShare, this);" data-sns="kakaostory" data-text="윤 대통령 집무실 동측에 새 진입로 건설 중···야당 “도어스테핑 회피용”">카카오스토리 공유하기</a></li>
                            <li><a class="band" href="javascript:;" onclick="getShortUrl('https%3A%2F%2Fwww.khan.co.kr%2Fpolitics%2Fpolitics-general%2Farticle%2F202210101527001%3Futm_source%3Dnaver_band%26utm_medium%3Dsocial_share', snsShare, this);" data-sns="band" data-text="윤 대통령 집무실 동측에 새 진입로 건설 중···야당 “도어스테핑 회피용”">밴드 공유하기</a></li>
                            <li><a class="nhnblog" href="javascript:;" onclick="getShortUrl('https%3A%2F%2Fwww.khan.co.kr%2Fpolitics%2Fpolitics-general%2Farticle%2F202210101527001%3Futm_source%3Dnaver_blog%26utm_medium%3Dsocial_share', snsShare, this);" data-sns="nblog" data-text="">네이버블로그 공유하기</a></li>
                            <li><a class="email" href="javascript:;" onclick="send_mail('202210101527001', 'khan', 'khan', 'https://www.khan.co.kr/politics/politics-general/article/202210101527001');">이메일로 공유하기</a></li>
                        </ul>
                    </div>
                </li>
                <li class="bookmark">
                    <a href="javascript:;" onclick="setbookmark(this);" title="북마크" data-art_id="202210101527001" data-bookmark_name="bookmark_khan" data-med_id="khan">북마크</a>
                </li>
            </ul>
        </div>
        <div class="khlink">
            <a class="text_link jebo" href="https://jebo.khan.co.kr/" title="기사 제보(새창)" target="_blank">
                <span>기사 제보</span>
            </a>
            <a class="text_link smile" href="http://smile.khan.co.kr/gudoc/gudoc_input_step3.html?media_cd=201" title="지면 구독신청(새창)" target="_blank">
                <span>지면 구독신청</span>
            </a>
            <a class="text_link smile" href="http://epaper.khan.co.kr/index.html" title="온라인 구독신청(새창)" target="_blank">
                <span>온라인 구독신청</span>
            </a>
        </div>
    </div>

    <footer style="width:100%; height:600px; background-color:black;"></footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="/js/newspaper.js"></script>
<script>
    // url encode된 khan_id 전달 필요
    setTimeout(function(){
        intersect("Z66W52d1gdL6I1K%2BVjSTBA%3D%3D");
    }, 500)
</script>
</body>
</html>