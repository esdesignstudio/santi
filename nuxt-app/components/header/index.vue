<template>
    <header
        class="header"
        :class="{'-scrolled': isScrolled}"
    >
        <div class="header__wrapper container">
            <nav class="header__nav" v-show="isDesktop">
                <ul class="header__nav__ul">
                    <li>
                        <NuxtLink to="/">關於我們</NuxtLink>
                    </li>
                    <li>
                        <span>服務內容</span>
                        <ul>
                            <li>
                                <NuxtLink to="/">創能</NuxtLink>
                            </li>
                            <li>
                                <NuxtLink to="/">供能</NuxtLink>
                            </li>
                            <li>
                                <NuxtLink to="/">儲能</NuxtLink>
                            </li>
                            <li>
                                <NuxtLink to="/">售能</NuxtLink>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <span>新聞中心</span>
                        <!-- <ul>
                            <li>
                                <NuxtLink to="/">最新消息</NuxtLink>
                            </li>
                            <li>
                                <NuxtLink to="/">影音專區</NuxtLink>
                            </li>
                            <li>
                                <NuxtLink to="/">社會責任</NuxtLink>
                            </li>
                        </ul> -->
                    </li>
                </ul>

                <NuxtLink
                class="header__logo"
                to="/"
                >
                    <img class="bg" src="assets/icons/logo.png" alt="">
                    <img class="sm" src="assets/icons/logo_s.png" alt="">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 108.3 50.9" fill="currentColor" xml:space="preserve"><defs><path id="a" d="M0 0h108.3v50.9H0z"/></defs><clipPath id="b"><use xlink:href="#a" style="overflow:visible"/></clipPath><g style="clip-path:url(#b)"><path d="M64 11.3c0-2.8 1.1-5.4 3.1-7.3 2-2 4.7-3.1 7.4-3C77.4.9 80 2 82 4c2 1.9 3.1 4.6 3.1 7.4 0 2.8-1.1 5.4-3.1 7.3-4 3.9-10.3 4.1-14.5.3-2.3-1.9-3.6-4.7-3.5-7.7m3.8 0c-.1 1.9.7 3.7 2 5 2.6 2.6 6.9 2.6 9.5 0 1.3-1.3 2-3.1 2-4.9 0-1.8-.7-3.6-2-4.9-1.3-1.3-3-2-4.8-2-1.8 0-3.6.7-4.8 2-1.3 1.2-2 3-1.9 4.8M21.2 11.3c0-2.8 1.1-5.4 3.1-7.3 2-2 4.7-3.1 7.4-3 2.8 0 5.4 1.1 7.4 3.1 2 1.9 3.1 4.6 3.1 7.4 0 2.8-1.1 5.4-3.1 7.3-4 3.9-10.3 4.1-14.5.3-2.3-1.9-3.5-4.8-3.4-7.8m3.7.1c-.1 1.9.7 3.7 2 5 2.6 2.6 6.9 2.6 9.5 0 1.3-1.3 2-3.1 2-4.9 0-1.8-.7-3.6-2-4.9-2.7-2.6-7-2.6-9.6 0-1.2 1.2-1.9 2.9-1.9 4.8M52.9 1.3v16.5h6.8v3.6H49.1V1.3h3.8zM90.7 21.4V0l13.8 13.4V1.3h3.9v21.3l-14-14.1v12.8h-3.7zM14.2 12.6c-.4-.5-.8-1-1.4-1.4.3-.3.6-.6.8-.9.6-.9.9-2 .9-3.1 0-1.5-.6-2.9-1.7-4-.6-.6-1.4-1.1-2.2-1.4-1-.2-2.2-.4-3.3-.3H0v20.1h7.9c1.1 0 2.3-.1 3.4-.4.9-.3 1.6-.8 2.2-1.4 1.1-1 1.7-2.5 1.7-4 0-1.2-.3-2.3-1-3.2M7.4 4.8c.9-.1 1.8.2 2.5.7.5.5.9 1.1.8 1.8 0 .7-.3 1.4-.8 1.8-.5.5-1.4.6-2.8.6H3.7V4.8h3.7zm3.3 12.7c-.8.5-1.7.8-2.6.7H3.7v-5h4.1c1.4 0 2.3.1 2.9.6.5.5.8 1.1.8 1.9 0 .7-.3 1.4-.8 1.8M16.3 37.7c-1.3-1.1-1.8-1.5-2.7-2.2v1.6c.8.7 1.3 1.2 2.7 2.3v-1.7zM16.3 41.7c-1.3-1.1-1.8-1.5-2.7-2.2v1.6c.8.7 1.3 1.2 2.7 2.3v-1.7zM15.1 44.9c-.2 2.1-.9 4-2.1 5.7h1.5c1.1-1.7 1.7-3.7 1.9-5.7h-1.3zM24.5 47.8c1.7-1.6 2.7-3.7 2.9-6.1h-3.8v-3.3h3.1l-.8 2.7H27l1.2-3.9h-4.6v-1.9h-1.2v1.9h-4.7v5.6c0 3.3-.4 5.5-1.9 7.7h1.5c1.3-2.3 1.6-4.5 1.6-7.7h7.2c-.4 1.6-1.3 3.1-2.5 4.1l-.2.2-.2-.2c-1.1-1-1.9-2.2-2.4-3.7h-1.2c.5 1.7 1.4 3.2 2.6 4.5l.2.1c-1 .7-2.2 1.2-3.4 1.5v1.3c1.6-.4 3.1-1 4.4-2 1.3.9 2.8 1.6 4.4 2v-1.3c-1.2-.3-2.4-.8-3.4-1.5h.1zm-2.2-6h-3.5v-3.3h3.5v3.3zM39.7 35.3h-1.2c.1.4.2.9.3 1.3h-3.4v1.1h1.5l.4 2.3h-1.9v1.1h7.7V40h-1.8l.6-2.3h1.3v-1.1H40c-.1-.4-.2-.8-.3-1.3m.4 4.7h-1.7l-.4-2.3h2.6l-.5 2.3zM36.1 50.8h1.1v-2.7h4v1c0 .3-.2.5-.5.5h-1.5v1.2H41c.9 0 1.3-.5 1.3-1.4v-7.3H36v8.7zm1.1-7.6h4v1.4h-4v-1.4zm0 2.5h4v1.5h-4v-1.5zM50.3 37.7v-1.1H45v-1.3h-1.2v4.6h5.3v1.3h-5.3v7.9c-.1.8.4 1.5 1.2 1.6H48.7c1.1 0 1.6-.6 1.6-1.7v-.3h-1.1v.2c0 .5-.1.7-.7.7h-2.9c-.3 0-.6-.2-.6-.5V48h5.3v-1H45v-1h5.3v-1H45v-1h5.3v-.9H45V42h5.3v-3H45v-1.3h5.3zM57.4 45.5h15.3v.9H57.4v-.9zM72 42.3c-.3 1-.4 1.2-.5 1.2-.2 0-.4-.5-.4-1.5-.1-1 .1-2 .1-3h-3v-.9h.7v-1h3.8v-1h-3.8v-.8h-1.2v.8h-5.1v-.8h-1.2v.8h-4v1h4v.8h-.5v.7h-3.5v.7h3.5v.8h-3.5v.8h2c-.1.2-.3.4-.5.6-.4.3-.9.4-1.4.4v.8h.7v.6h2.6v.9h-3.5v.8c2.5 0 5-.1 7.5-.4v-.7c-.8 0-1.8.1-2.8.1v-.9h2.9v-.7H62v-.8h-1.2v.8h-2.2c.3-.1.6-.3.9-.5.3-.3.6-.7.8-1.1h2.3v.4c-.1.4.2.8.7.9H64.9v-.7h-1.2c-.2 0-.2-.1-.2-.2v-.4H65V40h-3v-.8h2.9v-.7H62V38h.6v-.9h5.1v.8h-.5V39h-1.8v1h1.8v.1c0 .5-.1 1-.2 1.5-.3-.2-1.6-.9-1.6-.9v1.1c.2.1.9.5 1.2.7-.3.4-.7.8-1.2 1.1V45c.8-.5 1.5-1.2 2.1-1.9.5.3 1 .7 2 1.4v-1.3c-.9-.6-1.2-.8-1.6-1 .2-.7.4-1.4.4-2.1V40h1.9c0 .9-.1 1.8 0 2.8.1 1.3.6 2 1.4 2 .6 0 1-.6 1.4-1.7.1-.3.1-.5.2-.8H72zM72.7 47.3H57.4v.9h3.4c-.2.1-.4.3-.7.4-.5.3-1 .5-1.6.7v1.1c3.5-.2 7.5-.3 11.8-.3.4.2.8.5 1.2.8v-1.3c-.9-.5-1.7-1-2.6-1.4h3.7l.1-.9zm-12 2c.7-.3 1.4-.7 2-1.1h4.6c.4.3 1.1.8 1.4 1-2.9 0-5.5 0-8 .1M90.4 36.5h5v1.2h-5v-1.2zM91.2 47.4H90c-.2 0-.2-.1-.2-.2v-5.9h-1v6.4c-.1.4.2.8.7.9h1.7v-1.2z"/><path d="M90.1 39h-2.3v-3.6h-1.2V39h-2.3v1.2h2.3v10.7h1.2V40.2h2.3V39zM83.9 35.4h-1.4c-.8 1.2-1.8 2.3-2.9 3.4v1.6c1.7-1.5 3.1-3.2 4.3-5M83.8 39h-1.4c-.8 1.2-1.8 2.3-2.9 3.4V44c.6-.5 1.2-1.1 1.8-1.7V51h1.2V41c.6-.8 1-1.4 1.3-2z"/><path d="m90.2 37.8-.8-2.4h-1l.8 2.4h1zM90.4 41.4h2.3v7.7c0 .2-.1.4-.3.5H90.7v1.2h2.1c.8 0 1.1-.4 1.1-1.3v-8.1h1.5v-1.2h-5v1.2zM84.4 44.6c0 1.7-.4 3.4-1 5h1.1c.6-1.6.9-3.3.9-5v-3.3h-1v3.3z"/></g></svg> -->
                </NuxtLink>
                
                <ul class="header__nav__ul">
                    <li>
                        <span>公開資訊</span>
                        <!-- <ul>
                            <li>
                                <NuxtLink to="/">投資人專區</NuxtLink>
                            </li>
                            <li>
                                <NuxtLink to="/">電業資訊</NuxtLink>
                            </li>
                        </ul> -->
                    </li>
                    <li>
                        <NuxtLink to="/">人才招募</NuxtLink>
                    </li>
                    <li>
                        <NuxtLink to="/">聯絡我們</NuxtLink>
                    </li>
                </ul>
            </nav>
            <!-- 手機版Header -->
            <nav class="header__nav__tablet" v-show="isTablet">
                <ul class="info">
                    <li><img src="assets/icons/footer_logo.png" alt=""></li>
                    <li><i class="icon-menu"></i></li>
                </ul>
            </nav>
        </div>
    </header>
</template>
<script>
    export default {
        data() {
            return {
                isScrolled: false,
                isDesktop: true,
                isTablet: false,
            }
        },
        setup() {
            const isScrolled = useScrolled(() => {
                // const { data: headData } = useAsyncData('headData', async () =>  {
                //     const res = await esFetch('/global_options');
                //     return res.data
                // })

                const mobileNavHeight = ref(0)

                onMounted(() => {
                    
                })
            })
            return {}
        },
        mounted() {
            var that = this;
            function isScroll() {
                const w = window.innerWidth
                let sY = window.scrollY
                if (sY > 200 && w > 768) {
                    that.isScrolled = true
                    // console.log('ture')
                    // console.log(that.isScrolled)
                } else {
                    that.isScrolled = false
                    // console.log('false')
                }
            }
            function reSize() {
                const w = window.innerWidth
                if (w > 768) {
                    that.isDesktop = true
                    that.isTablet = false
                } else {
                    that.isDesktop = false
                    that.isTablet = true
                }
            }
            window.addEventListener("scroll", isScroll)
            window.addEventListener("resize", reSize)
        },
        methods: {
            
        }
    };

</script>
<style lang="scss">
    .header {
        position: fixed;
        display: flex;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 99;
        height: 300px;
        align-items: center;
        background-color: map-get($colors, white);
        transition: height .3s;
        // padding: 3rem 0 0;
        @include media-breakpoint-down(tablet){
            height: 75px;
        }
        &.-scrolled{
            height: 70px;
            // &__wrapper{
            //     padding: 0 2vw;
            // }
            .header__logo{
                img{
                    width: 2rem;
                    &.bg{
                        display: none;
                    }
                    &.sm{
                        display: block;
                    }
                }
            }
        }
        &__nav{
            display: flex;
            justify-content: space-between;
            &__ul{
                display: flex;
                align-items: center;
                cursor: pointer;
                li{
                    margin: 0 .5rem;
                    ul{
                        display: none;
                    }
                }
            }
            &__tablet{
                width: 100%;
                .info{
                    display:flex;
                    align-items: center;
                    justify-content: space-between;
                    li{
                        i{
                            color: map-get($colors, gray-black);
                        }
                        img{
                            width: 20vw;
                        }
                    }
                }
            }
        }
        &__logo{
            display: block;
            z-index: 1;
            img{
                width: 5rem;
                &.sm{
                    display: none;
                }
            }
        }
    }
</style>