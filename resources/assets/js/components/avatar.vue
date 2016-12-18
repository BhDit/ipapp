<template>
    <div>
        <div class="avatar-circle-sm">
            <span class="initials">{{name.getInitials()}}</span>
        </div>
    </div>
</template>
<style lang="scss">
    $brand-primary: #3097D1;
    @mixin avatar($size) {
        width: $size;
        height: $size;
        background-color: $brand-primary;
        text-align: center;
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;

        .initials {
            position: relative;
            top: $size*0.25;
            font-size: $size*0.5;
            line-height: $size*0.5;
            color: #fff;
            font-family: "Courier New", monospace;
            font-weight: bold;
        }
    }

    .avatar-circle-sm {
        @include avatar(50px);
    }

    .avatar-circle {
        @include avatar(100px);
    }

    .avatar-circle-lg {
        @include avatar(250px);
    }
</style>
<script lang="javascript">
    export default{
        props: {
            name: {
                required: true,
                type: String
            }
        }
    }
</script>
