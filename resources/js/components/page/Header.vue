<template>
    <header class="header">
        <div class="container">
            <div class="header__wrap">
                <a href="/" class="header__logo">
                    <img src="images/logo.svg" alt="">
                </a>
                <div class="header__inner">
                    <nav class="header__nav">
                        <ul class="header__ul">
                            <li v-for="link in links"><a :href="link.href" class="header__link">{{link.title}}</a></li>
                        </ul>
                    </nav>
                    <a href="#" class="header__phone">
                        <img src="images/phone.svg" alt="">
                        +7 (777) 777-77-77
                    </a>
                    <a href="#" class="btn1">Получить Кассу</a>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    data() {
        return {
            links: [
                {
                    title: 'Главная',
                    href: '/',
                },
                {
                    title: 'Статьи',
                    href: '/article',
                },
                {
                    title: 'Блог',
                    href: '/blog',
                },
            ]
        }
    }
}
</script>

<style scoped>

</style>
