<template>
    <div class="tab-content">
        <div class="header">{{tab.title}}</div>
        <div class="body">
            <component :is="tab.content"></component>
        </div>
    </div>
</template>

<script>
export default {
    props: ["tab"],
}
</script>