<template>
    <div class="help-tip">
        <span class="icon is-small">
            <i class="fa fa-info-circle"></i>
        </span>

        <span class="help-tip-text">
            <slot></slot>
        </span>
    </div>
</template>

<style lang="css">
    .help-tip {
        position: relative;
        display: inline-block;
    }

    .help-tip-text {
        visibility: hidden;
        width: 15em;
        background-color: #555;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;
        position: absolute;
        z-index: 1;
        bottom: 125%;
        left: 50%;
        margin-left: -60px;
        opacity: 0;
        transition: opacity 1s;
    }

    .help-tip .help-tip-text:after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: #555 transparent transparent transparent;
    }

    .help-tip:hover .help-tip-text {
        visibility: visible;
        opacity: 1;
    }
</style>