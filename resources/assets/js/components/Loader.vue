<template>
    <div class="loader-container">
        <div class="loader">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'loader'
    }
</script>

<style scoped>
    .loader-container {
        text-align: center;
    }
    .loader {
        display: inline-block;
        position: relative;
        width: 64px;
        height: 64px;
    }
    .loader div {
        display: inline-block;
        position: absolute;
        left: 6px;
        width: 13px;
        background: #646B6F;
        animation: loading 1.2s cubic-bezier(0, 0.5, 0.5, 1) infinite;
    }
    .loader div:nth-child(1) {
        left: 6px;
        animation-delay: -0.24s;
    }
    .loader div:nth-child(2) {
        left: 26px;
        animation-delay: -0.12s;
    }
    .loader div:nth-child(3) {
        left: 45px;
        animation-delay: 0;
    }
    @keyframes loading {
        0% {
            top: 6px;
            height: 51px;
        }
        50%, 100% {
            top: 19px;
            height: 26px;
        }
    }
</style>