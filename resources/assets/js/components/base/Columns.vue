<template>
    <div id="content" class="columns">
        <div class="column is-3 show-grid">
            <slot name="options"></slot>
        </div>

        <div class="column show-grid">
            <slot></slot>
        </div>
    </div>
</template>