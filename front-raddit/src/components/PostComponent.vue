<script>
import { propsToAttrMap } from '@vue/shared';

export default 
{
  props: 
  {
    SubRadditTitle: String,
    Author: String,
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
                <div><img src="https://res.cloudinary.com/dnzb3s4a0/image/upload/v1680856051/raddit/slicedRaddit_yiapyj.png" width=40px height=40px>{{ SubRadditTitle }}</div>
                <div>{{ Author }}</div>
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
    display: flex;
    background-color: aquamarine;
    width: 78%;
    margin: auto;
    flex-direction: row;
}
.ctnr_A {
    background-color: red;
}
.ctnr_postData
{
    display: flex;
    flex-direction: column;
}
.ctnr_greenBar
{
    display: flex;
    flex-direction: row;
}
.ctnr_postFootBar

{
    display: flex;
    flex-direction: row;
}
</style>
