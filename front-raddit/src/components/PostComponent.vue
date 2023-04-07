<script>
import { propsToAttrMap } from '@vue/shared';

export default 
{
  props: 
  {
    SubRadditTitle: String,
    Author: Number,
    ProductionDate: Number,
    PostTitle: String,
    PostBody: String,
  }
}
</script>

<template>

    <div class="ctnr_main">
        <div class="ctnr_A">RATING</div>

        <div class ="ctnr_postData">

            <div class="ctnr_greenBar">
                <div><img src="https://res.cloudinary.com/dnzb3s4a0/image/upload/v1680856051/raddit/slicedRaddit_yiapyj.png"></div> 
                <div>{{ SubRadditTitle }}</div>
                <div>{{ Author }}</div>
                <div>{{ ProductionDate }}</div>
            </div>

            <div class="ctnr_postTitle">{{ PostTitle }}</div>
            <div class="ctnr_postBody">{{ PostBody }}</div>

            <div class="ctnr_postFootBar">
                <div class="ctnr_commentCounter">📜</div>
                <div class="ctnr_shareBtn">⤴️</div>
            </div>

        </div>
    </div>

</template>
<style scoped>
.ctnr_main
{
    display: flexbox;
    flex-direction: row;
}

.
</style>