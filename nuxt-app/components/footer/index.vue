<template>
    <footer
        class="footer"
        data-scroll
        data-scroll-class="-show"
    >
        <div class="footer__wrapper">
            <div class="footer__content">
                <div class="footer__content-top container">
                    <div class="footer__content-top-left">
                        <img src="assets/icons/footer_logo.png" alt="">
                    </div>
                    <div class="footer__content-top-center">
                        <div class="footer__content-top-center-info col-5">
                            <p><b>T</b>02-8886-0169</p>
                            <p><b>F</b>02-8888-3338</p>
                        </div>
                        <div class="footer__content-top-center-info col-5">
                            <p><b>M</b>testssss@test.com</p>
                            <p><b>A</b>臺北市內湖區內盧路206號8樓</p>
                        </div>
                    </div>
                    <div class="footer__content-top-right">
                        <div><i class="icon-line_sml"></i></div>
                        <div><i class="icon-fb_sml"></i></div>
                        <div><i class="icon-phone_sml"></i></div>
                    </div>
                </div>
                <div class="footer__content-bottom">
                    <div class="footer__content-bottom-info container">
                        <div class="footer__content-bottom-info-left">
                            <p>
                            Copyright©2022 三地能源
                            </p>
                        </div>
                        <div class="footer__content-bottom-info-right">
                            <p>
                                <a href="">Cookie 使用政策</a>
                            </p>
                            <p>
                                <a href="">隱私權政策</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>
<script setup>

</script>
<style lang="scss">
    .footer {
        background-color: map-get($colors, white);
        &__wrapper{
            width: 100%;
        }
        &__content{
            &-top{
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding-top: 5rem;
                padding-bottom: 5rem;
                @include media-breakpoint-down(tablet){
                    flex-wrap: wrap;
                    padding-top: 3rem;
                    padding-bottom: 3rem;
                }
                &-left{
                    width: 25%;
                    @include media-breakpoint-down(tablet){
                        width: 50%;
                        order: 2;
                    }
                    img{
                        width: 15vw;
                        @include media-breakpoint-down(tablet){
                            width: 30vw;
                        }
                    }
                }
                &-center{
                    width: 50%;
                    display: flex;
                    justify-content: flex-start;
                    color: map-get($colors, gray-black);
                    white-space: nowrap;
                    @include media-breakpoint-down(tablet){
                        width: 100%;
                        flex-direction: column;
                        order: 1;
                        margin-bottom: 3rem;
                    }
                    p{
                        @include media-breakpoint-down(tablet){
                            padding: .5rem 0;
                        }
                    }
                    b{
                        font-weight: bold;
                        margin: 0 .5rem 0;
                    }
                }
                &-right{
                    width: 18%;
                    display: flex;
                    justify-content: space-between;
                    @include media-breakpoint-down(tablet){
                        width: 50%;
                        order: 3;
                    }
                    div{
                        border: 1px solid map-get($admin-colors, primary);
                        border-radius: 100%;
                        line-height: 1;
                        width: 3rem;
                        height: 3rem;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }
                }
            }
            &-bottom{
                background-color: map-get($colors, gray-black);
                padding-top: 2rem;
                padding-bottom: 2rem;
                &-info{
                    display: flex;
                    justify-content: space-between;
                    color: map-get($colors, white);
                    @include media-breakpoint-down(tablet){
                        flex-direction: column;
                    }
                    p{
                        @include media-breakpoint-down(tablet){
                            font-size: .8rem;
                            padding: .5rem 0;
                        }
                    }
                    a{
                        color: map-get($colors, white);
                    }
                    &-right{
                        display: flex;
                        justify-content: flex-end;
                        @include media-breakpoint-down(tablet){
                            justify-content: flex-start;
                        }
                        p{
                            &:first-child{
                                margin-right: 4rem;
                                @include media-breakpoint-down(tablet){
                                    margin-right: 2rem;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
</style>