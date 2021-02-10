<template>
    <div class="flex flex-col rounded-md shadow-sm transition space-y-4 bg-white p-4">

        <h2 class="m-0">
            {{data.title}}
        </h2>
        <p class="">
            {{data.description}}
        </p>
        <div class="">
            {{data.publication_date}}
        </div>
    </div>
</template>

<script>
export default {
    props: {
        data: {
            type: Object,
            require: true,
        }
    }
}
</script>

<style>

</style>